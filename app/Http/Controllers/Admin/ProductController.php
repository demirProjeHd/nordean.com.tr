<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderBy('order')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('order')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_tr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description_tr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'short_description_tr' => 'nullable|string',
            'short_description_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'applications_tr' => 'nullable|string',
            'applications_en' => 'nullable|string',
            'pdfs.*' => 'nullable|file|mimes:pdf|max:5120', // 5MB max per file
            'order' => 'nullable|integer',
        ]);

        $data = $request->only([
            'name_tr', 'name_en', 'category_id',
            'description_tr', 'description_en',
            'short_description_tr', 'short_description_en',
            'applications_tr', 'applications_en', 'order', 'is_active'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/uploads'), $filename);
            $data['image'] = 'images/uploads/' . $filename;
        }

        // Handle PDF uploads
        if ($request->hasFile('pdfs')) {
            $pdfs = [];
            $slug = Str::slug($request->name_en); // Use English name for slug

            foreach ($request->file('pdfs') as $index => $file) {
                $filename = $slug . '-' . ($index + 1) . '.pdf';
                $path = $file->storeAs('products/pdfs', $filename, 'public');
                $pdfs[] = $path;
            }

            $data['pdfs'] = $pdfs;
        }

        $data['is_active'] = $request->has('is_active');
        $data['order'] = $data['order'] ?? (Product::max('order') + 1);

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('order')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name_tr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description_tr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'short_description_tr' => 'nullable|string',
            'short_description_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'applications_tr' => 'nullable|string',
            'applications_en' => 'nullable|string',
            'pdfs.*' => 'nullable|file|mimes:pdf|max:5120', // 5MB max per file
            'order' => 'nullable|integer',
        ]);

        $data = $request->only([
            'name_tr', 'name_en', 'category_id',
            'description_tr', 'description_en',
            'short_description_tr', 'short_description_en',
            'applications_tr', 'applications_en', 'order'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/uploads'), $filename);
            $data['image'] = 'images/uploads/' . $filename;
        }

        // Handle PDF uploads (add to existing PDFs)
        if ($request->hasFile('pdfs')) {
            $existingPdfs = $product->pdfs ?? [];
            $slug = Str::slug($request->name_en); // Use English name for slug
            $currentCount = count($existingPdfs);

            foreach ($request->file('pdfs') as $index => $file) {
                $filename = $slug . '-' . ($currentCount + $index + 1) . '.pdf';
                $path = $file->storeAs('products/pdfs', $filename, 'public');
                $existingPdfs[] = $path;
            }

            $data['pdfs'] = $existingPdfs;
        }

        $data['is_active'] = $request->has('is_active');

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // Delete all PDF files
        if ($product->pdfs) {
            foreach ($product->pdfs as $pdf) {
                Storage::disk('public')->delete($pdf);
            }
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }

    public function deletePdf(Product $product, $index)
    {
        $pdfs = $product->pdfs ?? [];

        if (isset($pdfs[$index])) {
            // Delete file from storage
            Storage::disk('public')->delete($pdfs[$index]);

            // Remove from array
            unset($pdfs[$index]);

            // Re-index array
            $pdfs = array_values($pdfs);

            // Update product
            $product->update(['pdfs' => $pdfs]);

            return redirect()->back()->with('success', 'PDF deleted successfully!');
        }

        return redirect()->back()->with('error', 'PDF not found!');
    }

    public function deleteImage(Product $product)
    {
        if ($product->image) {
            // Delete file from public directory
            $imagePath = public_path($product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Update product - remove image
            $product->update(['image' => null]);

            return redirect()->back()->with('success', 'Image deleted successfully!');
        }

        return redirect()->back()->with('error', 'No image to delete!');
    }
}
