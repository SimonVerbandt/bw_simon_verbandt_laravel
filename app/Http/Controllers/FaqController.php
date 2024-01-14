<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FaqController extends Controller
{

    public function index()
    {
        return view('faq.index', [
            'faqs' => Faq::all(),
            'categories' => FaqCategory::all(),
        ]);
    }

    public function showCategory($slug)
    {
        $category = FaqCategory::where('slug', $slug)->first();
        $faqs = $category->faqs;
        return view('faq.category.show', [
            'slug' => $slug,
            'faqs' => $faqs,
            'categories' => FaqCategory::all(),
        ]);
    }


    //Admin routes
    public function showAdminFaq()
    {
        return view('admin.faq.index', [
            'faqs' => Faq::all(),
            'categories' => FaqCategory::all(),
        ]);
    }

    public function create(): View
    {
        return view('admin.faq.create', [
            'categories' => FaqCategory::all(),
        ]);
    }
    public function validateFaq(Request $request)
    {
        return $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateFaq($request);
        $faq = Faq::create([
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'category_id' => $request->input('category'),
            'slug' => Str::slug($validated['question']),
            'category_name' => FaqCategory::where('id', $request->input('category'))->first()->name,
            'admin_id' => Auth::id(),
        ]);
        $faq->save();
        return redirect()->route('admin.faq')->with('success', 'FAQ created');
    }


    public function edit($slug)
    {
        return view('admin.faq.edit', [
            'faq' => Faq::where('slug', $slug)->firstOrFail(),
            'categories' => FaqCategory::all(),
            'slug' => $slug,
        ]);
    }

    public function update(Request $request, $slug): RedirectResponse
    {
        $validated = $this->validateFaq($request);
        $faq = Faq::where('slug', $slug)->firstOrFail();
        $faq->update($validated);
        return redirect()->route('admin.faq')->with('success', 'FAQ updated');
    }

    public function destroy($slug)
    {
        $faq = Faq::where('slug', $slug)->firstOrFail();
        $faq->delete();
        return redirect()->route('admin.faq')->with('success', 'FAQ deleted');
    }

    //FAQ Category CRUD

    public function validateCategory(Request $request)
    {
        return $request->validate([
            'name' => 'required|string',
        ]);
    }

    public function createCategory(): View
    {
        return view('admin.faq.createCategory');
    }

    public function storeCategory(Request $request)
    {
        $validated = $this->validateCategory($request);
        $category = FaqCategory::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'admin_id' => Auth::id(),
        ]);
        $category->save();
        return redirect()->route('admin.faq')->with('success', 'Category created');
    }

    public function editCategory($slug): View
    {
        return view('admin.faq.editCategory', [
            'category' => FaqCategory::where('slug', $slug)->firstOrFail(),
            'slug' => $slug,
        ]);
    }

    public function updateCategory(Request $request, $slug): RedirectResponse
    {
        $validated = $this->validateCategory($request);
        $category = FaqCategory::where('slug', $slug)->firstOrFail();
        $category->update($validated);
        return redirect()->route('admin.faq')->with('success', 'Category updated');
    }

    public function destroyCategory($slug)
    {
        $category = FaqCategory::where('slug', $slug)->firstOrFail();
        $category->delete();
        return redirect()->route('admin.faq')->with('success', 'Category deleted');
    }
}
