<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;
use MongoDB\BSON\ObjectId;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('order', 'asc')->paginate(30);
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'required',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        }

        Partner::create($data);
        return redirect()->route('admin.partners.index')->with('success', '合作單位已新增');
    }

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('logo')) {
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        }

        $partner->update($data);
        return redirect()->route('admin.partners.index')->with('success', '合作單位已更新');
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', '合作單位已刪除');
    }

    public function updateOrder(Request $request)
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $id => $order) {
            Partner::where('_id', new ObjectId($id))->update(['order' => (int)$order]);
        }
        return redirect()->route('admin.partners.index')->with('success', '排序已更新');
    }
} 