<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class NewsItemController extends Controller
{
    //CRUD operations for news items
    public function index()
    {
        return view('news.index', [
            'newsItems' => NewsItem::all(),
        ]);
    }

    public function show($slug)
    {
        return view('news.show', [
            'newsitem' => NewsItem::where('slug', $slug)->firstOrFail(),
        ]);
    }

    public function create(Request $request): RedirectResponse
    {
        $user = Auth::user();
        if(!$user){
            return redirect()->route('login');
        }
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|text',
            'content' => 'required|text',
            'published_at' => 'required|date',
            'author_id' => 'required|integer',
        ]);
        if(!$validated['title'] || !$validated['image'] || !$validated['content'] || !$validated['published_at'] || !$validated['author_id']){
            return redirect()->route('news.index')->withErrors(['error' => 'Title, image, content, published_at, and author_id are required']);
        } else {
            $newsItem = new NewsItem();
            $newsItem->title = $validated['title'];
            $newsItem->image = $validated['image'];
            $newsItem->content = $validated['content'];
            $newsItem->published_at = $validated['published_at'];
            $newsItem->author_id = $validated['author_id'];
            $newsItem->save();
            return redirect()->route('news.index');
        }
      }

    public function edit(Request $request, $slug)
    {
        $user = Auth::user();
        if(!$user){
            return redirect()->route('login');
        }
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|text',
            'content' => 'required|text',
            'published_at' => 'required|date',
            'author_id' => 'required|integer',
            'slug' => 'required|integer',
        ]);
        if(!$validated['title'] || !$validated['image'] || !$validated['content'] || !$validated['published_at'] || !$validated['author_id'] || !$validated['slug']){
            return redirect()->route('news.index')->withErrors(['error' => 'Title, image, content, published_at, and author_id are required']);
        } else {
            $newsItem = NewsItem::where('slug', $slug)->firstOrFail();
            $newsItem->title = $validated['title'];
            $newsItem->image = $validated['image'];
            $newsItem->content = $validated['content'];
            $newsItem->published_at = $validated['published_at'];
            $newsItem->author_id = $validated['author_id'];
            $newsItem->save();
            return redirect()->route('news.show', ['slug' => $newsItem->slug]);
        }

    }

    public function destroy(Request $request, $slug)
    {
        $user = Auth::user();
        if(!$user){
            return redirect()->route('login');
        }
        $validated = $request->validate([
           'slug' => 'required|integer',
        ]);
        if(!$validated['slug']){
            return redirect()->route('news.index')->withErrors(['error' => 'Slug is required']);
        }else{
            $newsItem = NewsItem::where('slug', $slug)->firstOrFail();
            $newsItem->delete();
            return redirect()->route('news.index');
        }
    }


}
