<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reference;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    public function index()
    {
        $references = Reference::orderBy('order')->get();
        return view('admin.references.index', compact('references'));
    }

    public function create()
    {
        return view('admin.references.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_tr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_tr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'category_tr' => 'required|string|max:255',
            'category_en' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer',
        ]);

        $data = $request->only([
            'name_tr', 'name_en', 'description_tr', 'description_en',
            'category_tr', 'category_en', 'order', 'is_active'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/uploads'), $filename);
            $data['image'] = 'images/uploads/' . $filename;
        }

        $data['is_active'] = $request->has('is_active');
        $data['order'] = $data['order'] ?? (Reference::max('order') + 1);

        Reference::create($data);

        return redirect()->route('admin.references.index')->with('success', 'Reference created successfully!');
    }

    public function edit(Reference $reference)
    {
        return view('admin.references.edit', compact('reference'));
    }

    public function update(Request $request, Reference $reference)
    {
        $request->validate([
            'name_tr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_tr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'category_tr' => 'required|string|max:255',
            'category_en' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer',
        ]);

        $data = $request->only([
            'name_tr', 'name_en', 'description_tr', 'description_en',
            'category_tr', 'category_en', 'order'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/uploads'), $filename);
            $data['image'] = 'images/uploads/' . $filename;
        }

        $data['is_active'] = $request->has('is_active');

        $reference->update($data);

        return redirect()->route('admin.references.index')->with('success', 'Reference updated successfully!');
    }

    public function destroy(Reference $reference)
    {
        $reference->delete();
        return redirect()->route('admin.references.index')->with('success', 'Reference deleted successfully!');
    }
}
