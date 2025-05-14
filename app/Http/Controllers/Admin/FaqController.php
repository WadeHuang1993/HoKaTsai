<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('order')->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
            'status' => 'boolean',
        ]);
        $validated['status'] = $request->has('status');
        Faq::create($validated);
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ 已新增');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
            'status' => 'boolean',
        ]);
        $validated['status'] = $request->has('status');
        $faq->update($validated);
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ 已更新');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ 已刪除');
    }

    public function order(Request $request)
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $id => $order) {
            \App\Models\Faq::where('_id', $id)->update(['order' => (int)$order]);
        }
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ 順序已更新');
    }
} 