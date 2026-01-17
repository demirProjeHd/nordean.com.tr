<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
    public function index()
    {
        $pages = PageContent::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function edit($id)
    {
        $content = PageContent::findOrFail($id);
        return view('admin.pages.edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $content = PageContent::findOrFail($id);

        $request->validate([
            'title_tr' => 'nullable|string|max:500',
            'title_en' => 'nullable|string|max:500',
            'content_tr' => 'nullable|string',
            'content_en' => 'nullable|string',
        ]);

        $content->update([
            'title_tr' => $request->title_tr,
            'title_en' => $request->title_en,
            'content_tr' => $request->content_tr,
            'content_en' => $request->content_en,
        ]);

        return redirect()->route('admin.pages.index')->with('success', 'Sayfa içeriği başarıyla güncellendi!');
    }
}


