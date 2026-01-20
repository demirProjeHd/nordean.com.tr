<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class UpdateProductEnglishContentSeeder extends Seeder
{
    /**
     * English content translations for products
     */
    private $englishContent = [
        // Roll product
        'ROLL' => [
            'description_en' => 'High-performance impact sound insulation material for floating screed systems. Provides excellent sound insulation with its special foam structure.',
            'short_description_en' => 'Impact sound insulation for floating floors',
            'applications_en' => 'Residential, hotels, offices, hospitals',
        ],
        // UpRoll product
        'UPROLL' => [
            'description_en' => 'Enhanced version of Roll with superior acoustic performance. Ideal for high-requirement projects.',
            'short_description_en' => 'Premium impact sound insulation',
            'applications_en' => 'Luxury residential, premium hotels, concert halls',
        ],
        // Grei product
        'GREI' => [
            'description_en' => 'Granular elastic insulation material for impact sound isolation. Perfect for irregular surfaces.',
            'short_description_en' => 'Granular sound insulation material',
            'applications_en' => 'All building types, irregular surfaces',
        ],
        // UpGrei product
        'UPGREI' => [
            'description_en' => 'Premium granular elastic insulation with enhanced performance characteristics.',
            'short_description_en' => 'Premium granular insulation',
            'applications_en' => 'High-end projects, luxury buildings',
        ],
        // Point product
        'POINT' => [
            'description_en' => 'Point-based elastic support system for floating floors. Easy installation and excellent performance.',
            'short_description_en' => 'Point support system for floating floors',
            'applications_en' => 'Residential, commercial buildings',
        ],
        // MegaPoint product
        'MEGAPOINT' => [
            'description_en' => 'Heavy-duty point support system for high-load applications.',
            'short_description_en' => 'Heavy-duty point support system',
            'applications_en' => 'Industrial buildings, heavy traffic areas',
        ],
        // BiFloor product
        'BIFLOOR' => [
            'description_en' => 'Two-layer impact sound insulation system combining elasticity and mass.',
            'short_description_en' => 'Dual-layer floor insulation system',
            'applications_en' => 'Multi-story buildings, apartments',
        ],
        // Syl AD product
        'SYL AD' => [
            'description_en' => 'Acoustic underlay for final floor coverings. Thin profile with high performance.',
            'short_description_en' => 'Acoustic underlay for floor coverings',
            'applications_en' => 'Under laminate, parquet, vinyl',
        ],
        // Profyl product
        'PROFYL' => [
            'description_en' => 'Professional grade underlay material for wooden and laminate floors.',
            'short_description_en' => 'Professional floor underlay',
            'applications_en' => 'Parquet, laminate, engineered wood',
        ],
        // Profyle Flat product
        'PROFYLE FLAT 5-15' => [
            'description_en' => 'Thin profile underlay with moisture barrier. Available in various thicknesses.',
            'short_description_en' => 'Thin underlay with moisture protection',
            'applications_en' => 'All floating floor applications',
        ],
        // Basewood EL product
        'BASEWOOD EL' => [
            'description_en' => 'Ecological wood fiber underlay material. Natural and sustainable.',
            'short_description_en' => 'Ecological wood fiber underlay',
            'applications_en' => 'Eco-friendly construction projects',
        ],
        // BiWall product
        'BIWALL 30/40/50' => [
            'description_en' => 'Sandwich panel system for wall and ceiling applications. Various thickness options.',
            'short_description_en' => 'Acoustic sandwich panel system',
            'applications_en' => 'Walls, ceilings, partition walls',
        ],
        // ReWall product
        'REWALL 40' => [
            'description_en' => 'Resilient wall system for superior airborne and structure-borne sound insulation.',
            'short_description_en' => 'Resilient wall insulation system',
            'applications_en' => 'Party walls, recording studios, cinemas',
        ],
        // MustWall product
        'MUSTWALL' => [
            'description_en' => 'Direct application wall insulation material. Easy installation without metal profiles.',
            'short_description_en' => 'Direct application wall insulation',
            'applications_en' => 'Existing walls, renovation projects',
        ],
        // MustWall B product
        'MUSTWALL B' => [
            'description_en' => 'Enhanced version of MustWall with improved acoustic performance.',
            'short_description_en' => 'Enhanced wall insulation',
            'applications_en' => 'High-performance wall insulation',
        ],
        // TryWall product
        'TRYWALL 48' => [
            'description_en' => 'Resilient channel system for wall and ceiling applications.',
            'short_description_en' => 'Resilient channel system',
            'applications_en' => 'Suspended ceilings, wall systems',
        ],
        // StyWall S product
        'STYWALL S' => [
            'description_en' => 'Polystyrene-based wall insulation system with acoustic properties.',
            'short_description_en' => 'Lightweight wall insulation',
            'applications_en' => 'Interior walls, lightweight construction',
        ],
        // StyWall AD PRO product
        'STYWALL AD PRO' => [
            'description_en' => 'Professional grade wall insulation with enhanced fire resistance.',
            'short_description_en' => 'Professional wall insulation system',
            'applications_en' => 'Commercial buildings, fire-rated applications',
        ],
        // HighMat product
        'HIGHMAT 20/30/50' => [
            'description_en' => 'High-density vibration isolation material. Available in multiple thicknesses.',
            'short_description_en' => 'Heavy-duty vibration isolation',
            'applications_en' => 'Machine foundations, industrial equipment',
        ],
        // MegaMat product
        'MEGAMAT 500/650/800/900' => [
            'description_en' => 'Premium vibration isolation system for heavy machinery and sensitive equipment.',
            'short_description_en' => 'Premium vibration isolation system',
            'applications_en' => 'HVAC equipment, industrial machinery, generators',
        ],
        // SylCer product
        'SYLCER' => [
            'description_en' => 'Ceramic composite vibration isolation material for extreme loads.',
            'short_description_en' => 'Ceramic vibration isolator',
            'applications_en' => 'Heavy industrial equipment, high-load applications',
        ],
        // SylPro product
        'SYLPRO' => [
            'description_en' => 'Professional vibration isolation pads for commercial equipment.',
            'short_description_en' => 'Professional isolation pads',
            'applications_en' => 'Elevators, HVAC, commercial equipment',
        ],
        // Stick Bant product
        'STICK BANT' => [
            'description_en' => 'Self-adhesive perimeter insulation tape for acoustic decoupling.',
            'short_description_en' => 'Perimeter insulation tape',
            'applications_en' => 'Floating floor edges, wall connections',
        ],
        // Travers Altı product
        'TRAVERS ALTI' => [
            'description_en' => 'Resilient pads for wooden joist and beam systems.',
            'short_description_en' => 'Joist isolation pads',
            'applications_en' => 'Wooden floor systems, timber construction',
        ],
        // MaTrack product
        'MATRACK' => [
            'description_en' => 'Complete rail system for acoustic floating floors. Professional installation solution.',
            'short_description_en' => 'Professional rail system',
            'applications_en' => 'Large-scale projects, commercial buildings',
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Starting to update product English content...');

        $updatedCount = 0;
        $skippedCount = 0;
        $notFoundCount = 0;

        foreach ($this->englishContent as $productKey => $content) {
            // Try to find product by name_en containing the key
            $product = Product::where('name_en', 'LIKE', "%{$productKey}%")->first();

            if (!$product) {
                $this->command->warn("Product not found: {$productKey}");
                $notFoundCount++;
                continue;
            }

            // Check if English content is already set and not empty
            if (!empty($product->description_en) &&
                !empty($product->short_description_en) &&
                !empty($product->applications_en) &&
                !$this->isTurkish($product->description_en)) {
                $this->command->info("Skipping {$product->name_en} - already has English content");
                $skippedCount++;
                continue;
            }

            // Update the product
            $product->update([
                'description_en' => $content['description_en'],
                'short_description_en' => $content['short_description_en'],
                'applications_en' => $content['applications_en'],
            ]);

            $this->command->info("Updated: {$product->name_en}");
            $updatedCount++;
        }

        $this->command->info("\n=== Update Summary ===");
        $this->command->info("Updated: {$updatedCount}");
        $this->command->info("Skipped: {$skippedCount}");
        $this->command->info("Not Found: {$notFoundCount}");
        $this->command->info("Total Processed: " . ($updatedCount + $skippedCount + $notFoundCount));
    }

    /**
     * Simple check if text contains Turkish characters
     */
    private function isTurkish(string $text): bool
    {
        // Check for Turkish-specific characters
        $turkishChars = ['ı', 'İ', 'ş', 'Ş', 'ğ', 'Ğ', 'ü', 'Ü', 'ö', 'Ö', 'ç', 'Ç'];

        foreach ($turkishChars as $char) {
            if (mb_strpos($text, $char) !== false) {
                return true;
            }
        }

        return false;
    }
}
