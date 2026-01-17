<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->settings as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            
            if ($setting) {
                if ($setting->type === 'image' && $request->hasFile("settings.{$key}")) {
                    $file = $request->file("settings.{$key}");
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('images/uploads'), $filename);
                    $setting->value = 'images/uploads/' . $filename;
                } else {
                    $setting->value = $value;
                }
                $setting->save();
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully!');
    }
}


