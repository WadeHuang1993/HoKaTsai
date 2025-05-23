<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnvironmentImage;
use Illuminate\Support\Facades\Storage;
use MongoDB\BSON\ObjectId;

class EnvironmentImageController extends Controller
{
    public function index()
    {
        $images = EnvironmentImage::orderBy('order', 'asc')->paginate(30);
        return view('admin.environment_images.index', compact('images'));
    }

    public function create()
    {
        return view('admin.environment_images.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('environment_images', 'public');
        }

        EnvironmentImage::create($data);
        return redirect()->route('admin.environment-images.index')->with('success', '環境照片已新增');
    }

    public function edit($id)
    {
        $image = EnvironmentImage::findOrFail($id);
        return view('admin.environment_images.edit', compact('image'));
    }

    public function update(Request $request, $id)
    {
        $image = EnvironmentImage::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            // 刪除舊圖
            if ($image->image) {
                Storage::disk('public')->delete($image->image);
            }
            $data['image'] = $request->file('image')->store('environment_images', 'public');
        }

        $image->update($data);
        return redirect()->route('admin.environment-images.index')->with('success', '環境照片已更新');
    }

    public function destroy($id)
    {
        $image = EnvironmentImage::findOrFail($id);
        $image->delete();
        return redirect()->route('admin.environment-images.index')->with('success', '環境照片已刪除');
    }

    public function updateOrder(Request $request)
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $id => $order) {
            EnvironmentImage::where('_id', new ObjectId($id))->update(['order' => (int)$order]);
        }
        return redirect()->route('admin.environment-images.index')->with('success', '排序已更新');
    }
}
