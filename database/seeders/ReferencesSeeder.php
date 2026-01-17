<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reference;

class ReferencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reference::create([
            'name_tr' => 'Doğuş Power Center - NTV & Kral TV',
            'name_en' => 'Doğuş Power Center - NTV & Kral TV',
            'description_tr' => 'Medya merkezi için profesyonel ses yalıtımı ve akustik uygulamalar',
            'description_en' => 'Professional sound insulation and acoustic applications for media center',
            'category_tr' => 'Ticari',
            'category_en' => 'Commercial',
            'image' => 'images/1 -doğuş power center ntv kral tv.jpg',
            'order' => 1,
            'is_active' => true,
        ]);

        Reference::create([
            'name_tr' => 'Astoria Residence',
            'name_en' => 'Astoria Residence',
            'description_tr' => 'Lüks konut projesi için zemin ve duvar yalıtım sistemleri',
            'description_en' => 'Floor and wall insulation systems for luxury residential project',
            'category_tr' => 'Konut',
            'category_en' => 'Residential',
            'image' => 'images/2 -astoria residence.jpg',
            'order' => 2,
            'is_active' => true,
        ]);

        Reference::create([
            'name_tr' => 'Swiss Hotel Bosphorus',
            'name_en' => 'Swiss Hotel Bosphorus',
            'description_tr' => '5 yıldızlı otel için kapsamlı akustik konfor çözümleri',
            'description_en' => 'Comprehensive acoustic comfort solutions for 5-star hotel',
            'category_tr' => 'Otel',
            'category_en' => 'Hotel',
            'image' => 'images/3 -swiss hotel bosphorus.jpg',
            'order' => 3,
            'is_active' => true,
        ]);

        Reference::create([
            'name_tr' => 'D-Gym Etiler',
            'name_en' => 'D-Gym Etiler',
            'description_tr' => 'Fitness merkezi için titreşim izolasyonu ve ses yalıtımı',
            'description_en' => 'Vibration isolation and sound insulation for fitness center',
            'category_tr' => 'Spor',
            'category_en' => 'Sports',
            'image' => 'images/4 -dgym etiler.jpg',
            'order' => 4,
            'is_active' => true,
        ]);

        Reference::create([
            'name_tr' => 'Regnum Carya',
            'name_en' => 'Regnum Carya',
            'description_tr' => 'Resort otel kompleksi için yalıtım uygulamaları',
            'description_en' => 'Insulation applications for resort hotel complex',
            'category_tr' => 'Otel',
            'category_en' => 'Hotel',
            'image' => 'images/5 -regnum carya.jpg',
            'order' => 5,
            'is_active' => true,
        ]);

        Reference::create([
            'name_tr' => 'Vodafone Arena',
            'name_en' => 'Vodafone Arena',
            'description_tr' => 'Stadyum için akustik performans ve titreşim kontrolü',
            'description_en' => 'Acoustic performance and vibration control for stadium',
            'category_tr' => 'Spor',
            'category_en' => 'Sports',
            'image' => 'images/6 -vodafone arena.jpg',
            'order' => 6,
            'is_active' => true,
        ]);

        Reference::create([
            'name_tr' => 'Eyüboğlu Eğitim Kurumları',
            'name_en' => 'Eyüboğlu Educational Institutions',
            'description_tr' => 'Eğitim tesisleri için ses yalıtımı ve akustik düzenleme',
            'description_en' => 'Sound insulation and acoustic arrangement for educational facilities',
            'category_tr' => 'Eğitim',
            'category_en' => 'Education',
            'image' => 'images/7 -eyüboğlu.webp',
            'order' => 7,
            'is_active' => true,
        ]);

        Reference::create([
            'name_tr' => 'Maçka Residence',
            'name_en' => 'Maçka Residence',
            'description_tr' => 'Prestijli konut projesi için özel yalıtım çözümleri',
            'description_en' => 'Special insulation solutions for prestigious residential project',
            'category_tr' => 'Konut',
            'category_en' => 'Residential',
            'image' => 'images/8 -maçka residence.jpg',
            'order' => 8,
            'is_active' => true,
        ]);

        Reference::create([
            'name_tr' => 'Acıbadem Fulya Hastanesi',
            'name_en' => 'Acıbadem Fulya Hospital',
            'description_tr' => 'Sağlık tesisi için titreşim kontrolü ve ses yalıtımı',
            'description_en' => 'Vibration control and sound insulation for healthcare facility',
            'category_tr' => 'Sağlık',
            'category_en' => 'Healthcare',
            'image' => 'images/9 -acıbadem fulya.jpg',
            'order' => 9,
            'is_active' => true,
        ]);

        Reference::create([
            'name_tr' => 'Fairmont Quasar',
            'name_en' => 'Fairmont Quasar',
            'description_tr' => 'Lüks otel için kapsamlı akustik konfor uygulamaları',
            'description_en' => 'Comprehensive acoustic comfort applications for luxury hotel',
            'category_tr' => 'Otel',
            'category_en' => 'Hotel',
            'image' => 'images/10 - fairmont quasar.jpg',
            'order' => 10,
            'is_active' => true,
        ]);

        Reference::create([
            'name_tr' => 'Zorlu Center',
            'name_en' => 'Zorlu Center',
            'description_tr' => 'AVM ve iş merkezi kompleksi için yalıtım sistemleri',
            'description_en' => 'Insulation systems for shopping mall and business center complex',
            'category_tr' => 'Ticari',
            'category_en' => 'Commercial',
            'image' => 'images/11 - zorlu center.jpg',
            'order' => 11,
            'is_active' => true,
        ]);

        Reference::create([
            'name_tr' => 'Diyarbakır Zekai Karakoç Kültür ve Kongre Merkezi',
            'name_en' => 'Diyarbakır Zekai Karakoç Culture and Congress Center',
            'description_tr' => 'Kültür ve kongre merkezi için özel akustik çözümler',
            'description_en' => 'Special acoustic solutions for culture and congress center',
            'category_tr' => 'Kültür',
            'category_en' => 'Culture',
            'image' => 'images/12 -diyarbakır zekai karakoç kültür ve kongre merkezi.jpg',
            'order' => 12,
            'is_active' => true,
        ]);

        Reference::create([
            'name_tr' => 'DoubleTree Hilton Antalya City Center',
            'name_en' => 'DoubleTree Hilton Antalya City Center',
            'description_tr' => 'Şehir oteli için ses yalıtımı ve konfor uygulamaları',
            'description_en' => 'Sound insulation and comfort applications for city hotel',
            'category_tr' => 'Otel',
            'category_en' => 'Hotel',
            'image' => 'images/13 -Double Tree Hilton Antalya City center.jpg',
            'order' => 13,
            'is_active' => true,
        ]);

        Reference::create([
            'name_tr' => 'Etlik Şehir Hastanesi',
            'name_en' => 'Etlik City Hospital',
            'description_tr' => 'Büyük hastane kompleksi için titreşim ve ses kontrolü',
            'description_en' => 'Vibration and sound control for large hospital complex',
            'category_tr' => 'Sağlık',
            'category_en' => 'Healthcare',
            'image' => 'images/14 -etlik şehir hastanesi.jpg',
            'order' => 14,
            'is_active' => true,
        ]);

        Reference::create([
            'name_tr' => 'Regnum Crown Hotel',
            'name_en' => 'Regnum Crown Hotel',
            'description_tr' => 'Resort otel için kapsamlı yalıtım çözümleri',
            'description_en' => 'Comprehensive insulation solutions for resort hotel',
            'category_tr' => 'Otel',
            'category_en' => 'Hotel',
            'image' => 'images/15 -regnum crown hotel.webp',
            'order' => 15,
            'is_active' => true,
        ]);

        Reference::create([
            'name_tr' => 'MacFit Maltepe Ofispark',
            'name_en' => 'MacFit Maltepe Ofispark',
            'description_tr' => 'Fitness merkezi için titreşim izolasyonu sistemleri',
            'description_en' => 'Vibration isolation systems for fitness center',
            'category_tr' => 'Spor',
            'category_en' => 'Sports',
            'image' => 'images/16- macfit maltepe ofispark.png',
            'order' => 16,
            'is_active' => true,
        ]);
    }
}
