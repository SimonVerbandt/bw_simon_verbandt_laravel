<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function validateNews(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateNews($request);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $imageUrl = Storage::url($imagePath);
        } else {
            $imageUrl = null;
        }
        $newsItem = NewsItem::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'slug' => Str::slug($validated['title']),
            'published_at' => now(),
            'image' => $imageUrl,
            'author_id' => Auth::id(),
        ]);
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

    public function update(Request $request, $slug): RedirectResponse
    {
        $validated = $this->validateNews($request);
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
