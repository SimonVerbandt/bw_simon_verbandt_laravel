<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{

    public function index()
    {
        return view('faq.index', [
            'faqs' => Faq::all(),
        ]);
    }


    public function create(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'question' => 'required|text',
            'answer' => 'required|text',
            'faq_category' => 'required|string|max:255',
        ]);
        if (!$validated['question'] || !$validated['answer'] || !$validated['faq_category']) {
            return redirect()->route('faq.index')->withErrors(['error' => 'Question, answer, and category are required']);
        } else {
            $faq = new Faq();
            $faq->question = $validated['question'];
            $faq->answer = $validated['answer'];
            $faq->faq_category = $validated['faq_category'];
            $faq->save();
            return redirect()->route('faq.index');
        }
    }

    public function edit(Request $request, $slug)
    {
        $validated = $request->validate([
            'question' => 'required|text',
            'answer' => 'required|text',
        ]);
        if ($validated['question'] && $validated['answer']) {
            $faq = Faq::where('slug', $slug)->first();
            if (!$faq) {
                return redirect()->route('faq.index')->withErrors(['error' => 'FAQ not found']);
            };
            $faq->question = $validated['question'];
            $faq->answer = $validated['answer'];
            $faq->save();
            return redirect()->route('faq.index');
        }
    }

    public function destroy(Request $request, $slug)
    {
        $validated = $request->validate([
            'question' => 'required|text',
            'answer' => 'required|text',
        ]);
        if (!$validated['question'] || !$validated['answer']) {
            return redirect()->route('faq.index')->withErrors(['error' => 'Question and answer are required']);
        }

        $faq = Faq::where('slug', $slug)->first();
        $faq->delete();
        return redirect()->route('faq.index');
    }

    public function showCategory(string $slug)
    {
        $category = FaqCategory::where('slug', $slug)->first();
        $faqs = $category->faqs;
        return view('faq.category.show', [
            'slug' => $slug,
            'faqs' => $faqs,
        ]);
    }


    public function createCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        if (!$validated['name']) {
            return redirect()->route('faq.index')->withErrors(['error' => 'Category name is required']);
        }
        $category = new FaqCategory();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('faq.index');
    }

    public function editCategory(Request $request, string $slug)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        if (!$validated['name']) {
            return redirect()->route('faq.index')->withErrors(['error' => 'Category name is required']);
        }

        $category = FaqCategory::where('slug', $slug)->first();
        if (!$category) {
            return redirect()->route('faq.index')->withErrors(['error' => 'Category not found']);
        };
        $category->name = $validated['name'];
        $category->save();
        return redirect()->route('faq.index');
    }

    public function destroyCategory(Request $request, string $slug)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        if (!$validated['name']) {
            return redirect()->route('faq.index')->withErrors(['error' => 'Category name is required']);
        }
        $category = FaqCategory::where('slug', $slug)->first();
        $category->delete();
        return redirect()->route('faq.index');
    }
}
