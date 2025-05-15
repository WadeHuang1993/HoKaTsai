<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceFee;
use Illuminate\Http\Request;

class ServiceFeeController extends Controller
{
    public function index()
    {
        $fees = ServiceFee::orderBy('order')->get();
        return view('admin.service_fees.index', compact('fees'));
    }

    public function create()
    {
        return view('admin.service_fees.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);
        ServiceFee::create($data);
        return redirect()->route('admin.service-fees.index')->with('success', '收費標準已新增');
    }

    public function edit($id)
    {
        $fee = ServiceFee::findOrFail($id);
        return view('admin.service_fees.edit', compact('fee'));
    }

    public function update(Request $request, $id)
    {
        $fee = ServiceFee::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);
        $fee->update($data);
        return redirect()->route('admin.service-fees.index')->with('success', '收費標準已更新');
    }

    public function destroy($id)
    {
        $fee = ServiceFee::findOrFail($id);
        $fee->delete();
        return redirect()->route('admin.service-fees.index')->with('success', '收費標準已刪除');
    }

    public function updateOrder(Request $request)
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $id => $order) {
            ServiceFee::where('_id', $id)->update(['order' => (int)$order]);
        }
        return redirect()->route('admin.service-fees.index')->with('success', '排序已更新');
    }
} 