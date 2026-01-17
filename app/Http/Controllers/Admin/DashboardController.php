<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Solution;
use App\Models\Reference;
use App\Models\ContactMessage;
use App\Models\Visitor;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'sliders' => Slider::count(),
            'products' => Product::count(),
            'solutions' => Solution::count(),
            'references' => Reference::count(),
            'total_messages' => ContactMessage::count(),
            'unread_messages' => ContactMessage::where('read', false)->count(),
            'total_visitors' => Visitor::where('created_at', '>=', now()->subDays(15))->count(),
        ];

        $recentMessages = ContactMessage::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard.index', compact('stats', 'recentMessages'));
    }

    /**
     * Get visitor map data for the last 15 days
     */
    public function getVisitorMapData()
    {
        $countries = Visitor::getCountryStats(15);

        return response()->json($countries);
    }
}
