<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PageContent;

class PageContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PageContent::updateOrCreate(
            ['key' => 'about'],
            [
                'title_tr' => 'Nordean Mühendislik',
                'title_en' => 'Nordean Engineering',
                'content_tr' => 'Nordean Ltd., İtalyan Isolgomma Srl. firmasının tek yetkili ithalatçısı ve distribütörüdür. Ses ve titreşim yalıtım malzemeleri hususunda global ölçekte bir oyuncu olan Isolgomma Srl\'nin yarım asırı aşkın devam eden üretim gücü, teknolojik üstünlüğü ve her detaya uygun ürün çeşitliliği ile Nordean Ltd. firmasının yereldeki bilgi birikimi, teknik açıdan donanımı ve satış/pazarlama alanlarındaki uzmanlığı güçlü bir ticari birliktelik ortaya koymaktadır.',
                'content_en' => 'Nordean Ltd. is the exclusive importer and distributor of Italian Isolgomma Srl. The combination of Isolgomma Srl\'s half-century of production power, technological superiority, and comprehensive product range with Nordean Ltd.\'s local expertise, technical capabilities, and sales/marketing proficiency creates a strong commercial partnership.',
                'extra_data' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['key' => 'isolgomma'],
            [
                'title_tr' => 'Isolgomma - 50 Yılı Aşkın Tecrübe',
                'title_en' => 'Isolgomma - Over 50 Years of Experience',
                'content_tr' => 'Kurulduğu 1972 yılından günümüze, Isolgomma yaşam kalitemizi arttırmak amacı ile ürettiği ses yalıtım malzemelerini ve bu malzemeler ile oluşturduğu etkin yalıtım çözümlerini sürekli geliştirerek, İtalya ve Avrupa\'nın lider ses yalıtım malzemeleri üreticisi konumuna erişmiştir.',
                'content_en' => 'Since its establishment in 1972, Isolgomma has continuously developed sound insulation materials and effective insulation solutions to improve our quality of life, becoming the leading manufacturer of sound insulation materials in Italy and Europe.',
                'extra_data' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['key' => 'isolgomma_features'],
            [
                'title_tr' => 'Isolgomma Özellikleri',
                'title_en' => 'Isolgomma Features',
                'content_tr' => null,
                'content_en' => null,
                'extra_data' => [
                    [
                        'title_tr' => 'Avrupa Lideri',
                        'title_en' => 'European Leader',
                        'desc_tr' => '1972\'den beri ses yalıtımında öncü',
                        'desc_en' => 'Pioneer in sound insulation since 1972',
                    ],
                    [
                        'title_tr' => 'Çevre Dostu',
                        'title_en' => 'Eco-Friendly',
                        'desc_tr' => 'Geri dönüşümlü ham madde kullanımı',
                        'desc_en' => 'Using recycled raw materials',
                    ],
                    [
                        'title_tr' => 'Geniş Ürün Gamı',
                        'title_en' => 'Wide Product Range',
                        'desc_tr' => 'Her uygulama için özel çözümler',
                        'desc_en' => 'Special solutions for every application',
                    ],
                ],
            ]
        );

        PageContent::updateOrCreate(
            ['key' => 'mission'],
            [
                'title_tr' => 'Misyonumuz',
                'title_en' => 'Our Mission',
                'content_tr' => 'Global ölçekte yenilikleri takip ederek, ileri teknoloji ve yüksek standartlara sahip, nitelikli çözümlerde kullanılan yapı malzemelerinin satış ve pazarlama faaliyetlerini yürütmektedir. Ses yalıtımı ve titreşim kontrolü konularında bilgi ve tecrübelerini sektör oyuncularıyla profesyönel çerçevede paylaşmaktadır.',
                'content_en' => 'Following global innovations, conducting sales and marketing activities of building materials used in qualified solutions with advanced technology and high standards. Sharing knowledge and experience in sound insulation and vibration control with industry players in a professional framework.',
                'extra_data' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['key' => 'vision'],
            [
                'title_tr' => 'Vizyonumuz',
                'title_en' => 'Our Vision',
                'content_tr' => 'Çözüm ortaklarıyla birlikte mühendislik değerlerini odağa koyarak, insanların yaşam konforunu esas alan, yenilikçi çözümlerle sektöre yön veren lider bir marka olmayı hedefler.',
                'content_en' => 'Together with solution partners, focusing on engineering values, aiming to be a leading brand that directs the sector with innovative solutions that prioritize people\'s living comfort.',
                'extra_data' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['key' => 'cta'],
            [
                'title_tr' => 'Projeniz İçin Profesyonel Destek Alın',
                'title_en' => 'Get Professional Support for Your Project',
                'content_tr' => 'Ses ve titreşim yalıtımı konusunda uzman ekibimiz, projenize özel çözümler sunmak için hazır.',
                'content_en' => 'Our expert team in sound and vibration insulation is ready to offer customized solutions for your project.',
                'extra_data' => null,
            ]
        );
    }
}
