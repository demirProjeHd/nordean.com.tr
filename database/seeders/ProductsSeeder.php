<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name_tr' => 'Yüzer Döşeme - Şap Altı Yalıtımı',
            'name_en' => 'Floating Floor - Under-Screed Insulation',
            'description_tr' => 'Zemin uygulamalarında darbe sesi yalıtımı için özel olarak geliştirilmiş malzemeler. Yüzer şap sistemleri altında kullanılan Roll, Uproll, Grei, Point gibi ürünlerle maksimum ses yalıtımı performansı.',
            'description_en' => 'Specially developed materials for impact sound insulation in floor applications. Maximum sound insulation performance with products like Roll, Uproll, Grei, Point used under floating screed systems.',
            'short_description_tr' => 'Yüzer şap sistemleri için darbe sesi yalıtım malzemeleri',
            'short_description_en' => 'Impact sound insulation materials for floating screed systems',
            'icon' => 'floor',
            'image' => 'images/acoustic-floating-floor-installation-with-insulati.jpg',
            'applications_tr' => 'Konut, otel, ofis, hastane',
            'applications_en' => 'Residential, hotel, office, hospital',
            'products' => json_encode(['Roll', 'Uproll', 'Grei', 'Point', 'Bifloor', 'Syl AD']),
            'order' => 1,
            'is_active' => true,
        ]);

        Product::create([
            'name_tr' => 'Son Kat Kaplama Altı',
            'name_en' => 'Underlay Materials',
            'description_tr' => 'Parke, laminat, vinil gibi son kat zemin kaplamaları altına uygulanan ince yalıtım malzemeleri. Hem ses yalıtımı hem de konfor sağlar.',
            'description_en' => 'Thin insulation materials applied under final floor coverings such as parquet, laminate, vinyl. Provides both sound insulation and comfort.',
            'short_description_tr' => 'Parke ve laminat altı ince yalıtım malzemeleri',
            'short_description_en' => 'Thin insulation materials under parquet and laminate',
            'icon' => 'layers',
            'image' => 'images/modern-apartment-interior-with-sound-insulation.jpg',
            'applications_tr' => 'Konut, ticari mekanlar',
            'applications_en' => 'Residential, commercial spaces',
            'products' => json_encode(['Barrier Plus', 'Underfloor', 'Acoustic Plus']),
            'order' => 2,
            'is_active' => true,
        ]);

        Product::create([
            'name_tr' => 'Duvar ve Tavan Yalıtımı',
            'name_en' => 'Wall and Ceiling Insulation',
            'description_tr' => 'Hava sesi yalıtımı ve yapısal titreşim kontrolü için duvar ve tavan uygulamalarında kullanılan özel malzemeler. Asma tavan sistemleri ve bölme duvarlar için ideal çözümler.',
            'description_en' => 'Special materials used in wall and ceiling applications for airborne sound insulation and structural vibration control. Ideal solutions for suspended ceiling systems and partition walls.',
            'short_description_tr' => 'Duvar ve asma tavan için akustik yalıtım',
            'short_description_en' => 'Acoustic insulation for walls and suspended ceilings',
            'icon' => 'wall',
            'image' => 'images/soundproof-wall-with-acoustic-panels-installation.jpg',
            'applications_tr' => 'Stüdyo, sinema, konferans salonu',
            'applications_en' => 'Studio, cinema, conference hall',
            'products' => json_encode(['Wallsound', 'Ceiling Sound', 'Acoustic Panel']),
            'order' => 3,
            'is_active' => true,
        ]);

        Product::create([
            'name_tr' => 'Titreşim Kontrolü',
            'name_en' => 'Vibration Control',
            'description_tr' => 'Makine ve ekipman kaynaklı titreşimlerin izolasyonu için geliştirilmiş özel kauçuk ve elastomer malzemeler. Endüstriyel ve ticari uygulamalarda mükemmel performans.',
            'description_en' => 'Special rubber and elastomer materials developed for isolation of machine and equipment-induced vibrations. Excellent performance in industrial and commercial applications.',
            'short_description_tr' => 'Makine ve ekipman titreşim yalıtımı',
            'short_description_en' => 'Machine and equipment vibration insulation',
            'icon' => 'vibration',
            'image' => 'images/industrial-vibration-damping-system-with-rubber-ma.jpg',
            'applications_tr' => 'Fabrika, AVM, fitness merkezi',
            'applications_en' => 'Factory, shopping mall, fitness center',
            'products' => json_encode(['Vibro Pad', 'Machine Mount', 'Spring Isolator']),
            'order' => 4,
            'is_active' => true,
        ]);

        Product::create([
            'name_tr' => 'Raylı Sistemler',
            'name_en' => 'Rail Systems',
            'description_tr' => 'Metro, tramvay ve demiryolu hatları için özel geliştirilmiş titreşim ve gürültü yalıtım sistemleri. Kentsel altyapı projelerinde profesyonel çözümler.',
            'description_en' => 'Specially developed vibration and noise insulation systems for metro, tram and railway lines. Professional solutions in urban infrastructure projects.',
            'short_description_tr' => 'Metro ve demiryolu titreşim yalıtımı',
            'short_description_en' => 'Metro and railway vibration insulation',
            'icon' => 'rail',
            'image' => 'images/modern-recording-studio-with-acoustic-foam-panels-.jpg',
            'applications_tr' => 'Metro, tramvay, demiryolu',
            'applications_en' => 'Metro, tram, railway',
            'products' => json_encode(['Rail Pad', 'Track Mat', 'Sleeper Pad']),
            'order' => 5,
            'is_active' => true,
        ]);

        Product::create([
            'name_tr' => 'Yardımcı Malzemeler',
            'name_en' => 'Auxiliary Materials',
            'description_tr' => 'Yalıtım uygulamalarını tamamlayan bant, derz dolgu, yapıştırıcı gibi yardımcı malzemeler. Profesyonel uygulama için gerekli tüm detay ürünleri.',
            'description_en' => 'Auxiliary materials such as tape, joint filler, adhesive that complete insulation applications. All detail products necessary for professional application.',
            'short_description_tr' => 'Yalıtım için yardımcı ürünler',
            'short_description_en' => 'Auxiliary products for insulation',
            'icon' => 'tools',
            'image' => 'images/acoustic-ceiling-insulation-with-suspended-system.jpg',
            'applications_tr' => 'Tüm uygulamalar',
            'applications_en' => 'All applications',
            'products' => json_encode(['Acoustic Tape', 'Joint Filler', 'Adhesive']),
            'order' => 6,
            'is_active' => true,
        ]);
    }
}
