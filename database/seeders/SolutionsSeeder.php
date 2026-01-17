<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Solution;

class SolutionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Solution::create([
            'title_tr' => 'Zemin Yalıtımı',
            'title_en' => 'Floor Insulation',
            'description_tr' => 'Yüzer döşeme sistemleri ve darbe sesi yalıtımı',
            'description_en' => 'Floating floor systems and impact sound insulation',
            'icon' => 'floor',
            'image' => 'images/floor-solution.jpg',
            'order' => 1,
            'is_active' => true,
        ]);

        Solution::create([
            'title_tr' => 'Duvar Yalıtımı',
            'title_en' => 'Wall Insulation',
            'description_tr' => 'Hava sesi ve yapısal titreşim kontrolü',
            'description_en' => 'Airborne sound and structural vibration control',
            'icon' => 'wall',
            'image' => 'images/wall-solution.jpg',
            'order' => 2,
            'is_active' => true,
        ]);

        Solution::create([
            'title_tr' => 'Tavan Yalıtımı',
            'title_en' => 'Ceiling Insulation',
            'description_tr' => 'Asma tavan sistemleri ve akustik paneller',
            'description_en' => 'Suspended ceiling systems and acoustic panels',
            'icon' => 'ceiling',
            'image' => 'images/ceiling-solution.jpg',
            'order' => 3,
            'is_active' => true,
        ]);

        Solution::create([
            'title_tr' => 'Titreşim Kontrolü',
            'title_en' => 'Vibration Control',
            'description_tr' => 'Makine ve ekipman titreşim yalıtımı',
            'description_en' => 'Machine and equipment vibration insulation',
            'icon' => 'vibration',
            'image' => 'images/vibration-solution.jpg',
            'order' => 4,
            'is_active' => true,
        ]);
    }
}
