<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_tr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'subtitle_tr' => 'nullable|string',
            'subtitle_en' => 'nullable|string',
            'background_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer',
        ]);

        $data = $request->only(['title_tr', 'title_en', 'subtitle_tr', 'subtitle_en', 'order', 'is_active']);

        if ($request->hasFile('background_image')) {
            $file = $request->file('background_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/uploads'), $filename);
            $data['background_image'] = 'images/uploads/' . $filename;
        }

        $data['is_active'] = $request->has('is_active');
        $data['order'] = $data['order'] ?? (Slider::max('order') + 1);

        Slider::create($data);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully!');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title_tr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'subtitle_tr' => 'nullable|string',
            'subtitle_en' => 'nullable|string',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer',
        ]);

        $data = $request->only(['title_tr', 'title_en', 'subtitle_tr', 'subtitle_en', 'order']);

        if ($request->hasFile('background_image')) {
            $file = $request->file('background_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/uploads'), $filename);
            $data['background_image'] = 'images/uploads/' . $filename;
        }

        $data['is_active'] = $request->has('is_active');

        $slider->update($data);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully!');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully!');
    }

    public function updateOrder(Request $request, Slider $slider)
    {
        $request->validate([
            'order' => 'required|integer|min:0'
        ]);

        // Only update the order field to prevent data corruption
        $slider->update(['order' => $request->order]);

        return response()->json(['success' => true]);
    }
}


