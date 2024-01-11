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
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
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

    public function edit(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $validated = $request->validate([
            'question' => 'required|text',
            'answer' => 'required|text',
        ]);
        if ($validated['question'] && $validated['answer']) {
            $faq = Faq::find($request->id)->first();
            if (!$faq) {
                return redirect()->route('faq.index')->withErrors(['error' => 'FAQ not found']);
            };
            $faq->question = $validated['question'];
            $faq->answer = $validated['answer'];
            $faq->save();
            return redirect()->route('faq.index');
        }
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $faq = Faq::find($request->id);
        $faq->delete();
        return redirect()->route('faq.index');
    }

    public function showCategory($category)
    {
        $categoryModel = FaqCategory::where('name', $category)->first();

        if (!$categoryModel) {
            return redirect()->route('faq.index')->withErrors(['error' => 'Category not found']);
        }

        $faqs = $categoryModel-> faqs;
        dd($faqs);

        return view('faq.category.show', [
            'category' => $categoryModel->name,
            'faqs' => $faqs,
        ]); //TODO: Fix this shit
    }


    public function createCategory(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
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

    public function editCategory(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'faq_category_id' => 'required|integer',
        ]);
        if (!$validated['name']) {
            return redirect()->route('faq.index')->withErrors(['error' => 'Category name is required']);
        }
        $category = FaqCategory::find($validated['faq_category_id'])->first();
        if (!$category) {
            return redirect()->route('faq.index')->withErrors(['error' => 'Category not found']);
        };
        $category->name = $validated['name'];
        $category->save();
        return redirect()->route('faq.index');
    }

    public function destroyCategory(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $category = FaqCategory::find($request->faq_category_id);
        $category->delete();
        return redirect()->route('faq.index');
    }
}
