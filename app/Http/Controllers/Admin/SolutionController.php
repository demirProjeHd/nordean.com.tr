<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = Solution::orderBy('order')->get();
        return view('admin.solutions.index', compact('solutions'));
    }

    public function create()
    {
        return view('admin.solutions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_tr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_tr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'icon' => 'nullable|string|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer',
        ]);

        $data = $request->only(['title_tr', 'title_en', 'description_tr', 'description_en', 'icon', 'order', 'is_active']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/uploads'), $filename);
            $data['image'] = 'images/uploads/' . $filename;
        }

        $data['is_active'] = $request->has('is_active');
        $data['order'] = $data['order'] ?? (Solution::max('order') + 1);

        Solution::create($data);

        return redirect()->route('admin.solutions.index')->with('success', 'Solution created successfully!');
    }

    public function edit(Solution $solution)
    {
        return view('admin.solutions.edit', compact('solution'));
    }

    public function update(Request $request, Solution $solution)
    {
        $request->validate([
            'title_tr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_tr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'icon' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer',
        ]);

        $data = $request->only(['title_tr', 'title_en', 'description_tr', 'description_en', 'icon', 'order']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/uploads'), $filename);
            $data['image'] = 'images/uploads/' . $filename;
        }

        $data['is_active'] = $request->has('is_active');

        $solution->update($data);

        return redirect()->route('admin.solutions.index')->with('success', 'Solution updated successfully!');
    }

    public function destroy(Solution $solution)
    {
        $solution->delete();
        return redirect()->route('admin.solutions.index')->with('success', 'Solution deleted successfully!');
    }
}
