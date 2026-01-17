<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;

class SlidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'title_tr' => 'Ses ve Titreşim Yalıtımında Lider Çözümler',
            'title_en' => 'Leading Solutions in Sound and Vibration Insulation',
            'subtitle_tr' => 'İtalyan Isolgomma\'nın Türkiye\'deki tek yetkili distribütörü olarak, en kaliteli akustik yalıtım malzemelerini sunuyoruz.',
            'subtitle_en' => 'As the exclusive distributor of Italian Isolgomma in Turkey, we offer the highest quality acoustic insulation materials.',
            'background_image' => 'images/hero1.jpg',
            'order' => 1,
            'is_active' => true,
        ]);

        Slider::create([
            'title_tr' => 'Zemin Yalıtımında Üstün Performans',
            'title_en' => 'Superior Performance in Floor Insulation',
            'subtitle_tr' => 'Yüzer döşeme sistemleri ile darbe sesi yalıtımında en etkili çözümler. Konforlu yaşam alanları için profesyonel uygulamalar.',
            'subtitle_en' => 'The most effective solutions for impact sound insulation with floating floor systems. Professional applications for comfortable living spaces.',
            'background_image' => 'images/hero2.jpg',
            'order' => 2,
            'is_active' => true,
        ]);

        Slider::create([
            'title_tr' => 'Duvar ve Bölme Yalıtımı',
            'title_en' => 'Wall and Partition Insulation',
            'subtitle_tr' => 'Hava sesi ve yapısal titreşim kontrolünde yenilikçi malzemeler. Sessiz ve konforlu iç mekanlar için tam çözüm.',
            'subtitle_en' => 'Innovative materials for airborne sound and structural vibration control. Complete solution for quiet and comfortable interiors.',
            'background_image' => 'images/hero3.jpg',
            'order' => 3,
            'is_active' => true,
        ]);

        Slider::create([
            'title_tr' => 'Tavan Akustik Sistemleri',
            'title_en' => 'Ceiling Acoustic Systems',
            'subtitle_tr' => 'Asma tavan uygulamalarında akustik konfor. Ticari ve konut projelerinde ses kontrolü için özel çözümler.',
            'subtitle_en' => 'Acoustic comfort in suspended ceiling applications. Special solutions for sound control in commercial and residential projects.',
            'background_image' => 'images/hero4.jpg',
            'order' => 4,
            'is_active' => true,
        ]);
    }
}
