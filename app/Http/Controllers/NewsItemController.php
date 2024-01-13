<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsItemRequest;
use Illuminate\Http\Request;
use App\Models\NewsItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class NewsItemController extends Controller
{
    //Visitor routes
    public function index()
    {
        return view('news.index', [
            'newsItems' => NewsItem::all(),
        ]);
    }

    //Admin routes
    public function showAdminNews()
    {
        return view('admin.news.show', [
            'newsItems' => NewsItem::all(),
        ]);
    }

    public function create(): View
    {
        return view('admin.news.create');
    }

    public function store(NewsItemRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $newsItem = NewsItem::create($validated);
        $newsItem->fill($validated);
        $newsItem->slug = Str::slug($validated['title']);
        $newsItem->published_at = now();
        $newsItem->image = $validated['image'] ?? null;
        $newsItem->save();
        return redirect()->route('admin.news')->with('success', 'News item created');
    }


    public function edit($slug): View
    {
        $newsItem = NewsItem::where('slug', $slug)->firstOrFail();
        return view('admin.news.edit', [
            'newsItem' => $newsItem,
            'slug' => $slug,
        ]);
    }

    public function update(NewsItemRequest $request, $slug): RedirectResponse
    {
        $validated = $request->validated();
        $newsItem = NewsItem::where('slug', $slug)->firstOrFail();
        $newsItem->update($validated);
        return redirect()->route('admin.news')->with('success', 'News item updated');
    }

    public function destroy($slug)
    {
        $newsItem = NewsItem::where('slug', $slug)->firstOrFail();
        $newsItem->delete();
        return redirect()->route('admin.news')->with('success', 'News item deleted');
    }
}
