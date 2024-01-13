<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqCategoryRequest;
use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class FaqController extends Controller
{

    public function index()
    {
        return view('faq.index', [
            'faqs' => Faq::all(),
        ]);
    }

    public function showCategory($slug)
    {
        $category = FaqCategory::where('slug', $slug)->first();
        $faqs = $category->faqs;
        return view('faq.category.show', [
            'slug' => $slug,
            'faqs' => $faqs,
        ]);
    }


    //Admin routes
    public function showAdminFaq()
    {
        return view('admin.faq.index', [
            'faqs' => Faq::all(),
        ]);
    }
    public function showAdminCategory()
    {
        return view('admin.faq.category.index', [
            'categories' => FaqCategory::all(),
        ]);
    }

    //FAQ CRUD
    public function create(): View
    {
        return view('admin.faq.create', [
            'categories' => FaqCategory::all(),
        ]);
    }

    public function store(FaqRequest $request)
    {
        $validated = $request->validated();
        $faq = Faq::create($validated);
        $faq->fill($validated);
        $faq->slug = Str::slug($validated['question']);
        $faq->save();
        return redirect()->route('admin.faq')->with('success', 'FAQ created');
    }

    public function edit($slug)
    {
        return view('admin.faq.edit', [
            'faq' => Faq::where('slug', $slug)->firstOrFail(),
            'slug' => $slug,
        ]);
    }

    public function update(FaqRequest $request, $slug): RedirectResponse
    {
        $validated = $request->validated();
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
    public function createCategory(): View
    {
        return view('admin.faq.category.create');
    }

    public function storeCategory(FaqCategoryRequest $request)
    {
        $validated = $request->validated();
        $category = FaqCategory::create($validated);
        $category->name = $validated['name'];
        $category->slug = Str::slug($validated['name']);
        $category->save();
        return redirect()->route('admin.faq.category')->with('success', 'Category created');
    }

    public function editCategory($slug): View
    {
        return view('admin.faq.category.edit', [
            'category' => FaqCategory::where('slug', $slug)->firstOrFail(),
            'slug' => $slug,
        ]);
    }

    public function updateCategory(FaqCategoryRequest $request, $slug): RedirectResponse
    {
        $validated = $request->validated();
        $category = FaqCategory::where('slug', $slug)->firstOrFail();
        $category->update($validated);
        return redirect()->route('admin.faq.category')->with('success', 'Category updated');
    }

    public function destroyCategory($slug)
    {

        $category = FaqCategory::where('slug', $slug)->firstOrFail();
        $category->delete();
        return redirect()->route('admin.faq.category')->with('success', 'Category deleted');
    }

}
