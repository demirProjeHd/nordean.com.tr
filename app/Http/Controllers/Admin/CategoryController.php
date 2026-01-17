<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('order')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_tr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'icon' => 'nullable|string|max:2000',
            'order' => 'nullable|integer',
        ]);

        $data = $request->only(['name_tr', 'name_en', 'icon', 'order']);
        $data['is_active'] = $request->has('is_active');
        $data['order'] = $data['order'] ?? (Category::max('order') + 1);

        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori başarıyla oluşturuldu!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name_tr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'icon' => 'nullable|string|max:2000',
            'order' => 'nullable|integer',
        ]);

        $data = $request->only(['name_tr', 'name_en', 'icon', 'order']);
        $data['is_active'] = $request->has('is_active');

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori başarıyla güncellendi!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Kategori başarıyla silindi!');
    }
}
