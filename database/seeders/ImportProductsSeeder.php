<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory;

class ImportProductsSeeder extends Seeder
{
    private $sourceDir = 'C:\\Users\\DemirKahya\\Downloads\\Nordean web sayfası\\web sayfası\\ÜRÜNLER';

    private $categories = [
        [
            'folder' => '1 YÜZER DÖŞEME - ŞAP ALTI YALITIMI',
            'name_tr' => 'Yüzer Döşeme - Şap Altı Yalıtımı',
            'name_en' => 'Floating Floor - Under Screed Insulation',
            'order' => 1,
        ],
        [
            'folder' => '2 SON KAT KAPLAMA ALTI',
            'name_tr' => 'Son Kat Kaplama Altı',
            'name_en' => 'Under Final Layer Coating',
            'order' => 2,
        ],
        [
            'folder' => '3 DUVAR ve TAVAN',
            'name_tr' => 'Duvar ve Tavan',
            'name_en' => 'Wall and Ceiling',
            'order' => 3,
        ],
        [
            'folder' => '4 TİTREŞİM KONTROLÜ',
            'name_tr' => 'Titreşim Kontrolü',
            'name_en' => 'Vibration Control',
            'order' => 4,
        ],
        [
            'folder' => '6 YARDIMCI MALZEMELER',
            'name_tr' => 'Yardımcı Malzemeler',
            'name_en' => 'Auxiliary Materials',
            'order' => 5,
        ],
        [
            'folder' => '7 RAYLI SİSTEMLER',
            'name_tr' => 'Raylı Sistemler',
            'name_en' => 'Rail Systems',
            'order' => 6,
        ],
    ];

    public function run()
    {
        $this->command->info('Truncating products table...');
        Product::truncate();

        $this->command->info('Starting product import...');

        $productOrder = 1;

        foreach ($this->categories as $category) {
            $categoryPath = $this->sourceDir . '\\' . $category['folder'];

            if (!is_dir($categoryPath)) {
                $this->command->warn("Category folder not found: {$categoryPath}");
                continue;
            }

            $this->command->info("Processing category: {$category['name_en']}");

            // Get all product folders inside category
            $categoryDirs = scandir($categoryPath);

            foreach ($categoryDirs as $dir) {
                if ($dir === '.' || $dir === '..' || !is_dir($categoryPath . '\\' . $dir)) {
                    continue;
                }

                $productPath = $categoryPath . '\\' . $dir;

                // Extract product name (remove code prefix like "YZD1 ")
                $productName = preg_replace('/^[A-Z]+\s*\d+\s+/', '', $dir);
                $productName = trim($productName);

                $slug = Str::slug($productName);

                // Collect images from this product folder
                $images = array_merge(
                    glob($productPath . '\\*.jpg'),
                    glob($productPath . '\\*.jpeg'),
                    glob($productPath . '\\*.png'),
                    glob($productPath . '\\*.webp')
                );
                $imagePath = null;

                if (count($images) > 0) {
                    // Take first image found
                    $sourceImage = $images[0];
                    $extension = pathinfo($sourceImage, PATHINFO_EXTENSION);
                    $imageFilename = time() . '_' . $slug . '.' . $extension;
                    $destinationPath = public_path('images/uploads/' . $imageFilename);

                    // Ensure directory exists
                    $destDir = dirname($destinationPath);
                    if (!is_dir($destDir)) {
                        mkdir($destDir, 0755, true);
                    }

                    // Copy image
                    if (file_exists($sourceImage)) {
                        copy($sourceImage, $destinationPath);
                        $imagePath = 'images/uploads/' . $imageFilename;
                        $this->command->info("  Copied image: " . basename($sourceImage));
                    }
                }

                // Read description from Word document
                $description = $this->readWordDescription($productPath, $productName);

                // Collect PDFs from this product folder
                $pdfs = glob($productPath . '\\*.pdf');
                $pdfPaths = [];

                foreach ($pdfs as $index => $pdfPath) {
                    $filename = $slug . '-' . ($index + 1) . '.pdf';
                    $destinationPath = storage_path('app/public/products/pdfs/' . $filename);

                    // Ensure directory exists
                    $destDir = dirname($destinationPath);
                    if (!is_dir($destDir)) {
                        mkdir($destDir, 0755, true);
                    }

                    // Copy file
                    if (file_exists($pdfPath)) {
                        copy($pdfPath, $destinationPath);
                        $pdfPaths[] = 'products/pdfs/' . $filename;
                        $this->command->info("  Copied PDF: " . basename($pdfPath));
                    }
                }

                // Find category
                $categoryModel = Category::where('name_en', $category['name_en'])->first();

                if (!$categoryModel) {
                    $this->command->warn("  Category not found: {$category['name_en']}");
                    continue;
                }

                // Create product
                $product = Product::create([
                    'name_tr' => $productName,
                    'name_en' => $productName,
                    'category_id' => $categoryModel->id,
                    'description_tr' => $description,
                    'description_en' => $description,
                    'short_description_tr' => null,
                    'short_description_en' => null,
                    'image' => $imagePath,
                    'applications_tr' => null,
                    'applications_en' => null,
                    'pdfs' => $pdfPaths,
                    'order' => $productOrder++,
                    'is_active' => true,
                ]);

                $imageInfo = $imagePath ? 'with image' : 'no image';
                $descInfo = $description ? 'with description' : 'no description';
                $this->command->info("  Created product: {$productName} ({$imageInfo}, {$descInfo}, " . count($pdfPaths) . " PDFs)");
            }
        }

        $this->command->info('Product import completed!');
    }

    private function readWordDescription($productPath, $productName)
    {
        // Look for Word document with "GENEL AÇIKLAMA" in the name
        $wordFiles = array_merge(
            glob($productPath . '\\*GENEL AÇIKLAMA*.docx'),
            glob($productPath . '\\*GENEL AÇIKLAMA*.doc')
        );

        if (empty($wordFiles)) {
            return null;
        }

        try {
            $wordFile = $wordFiles[0];
            $phpWord = IOFactory::load($wordFile);

            $text = '';
            foreach ($phpWord->getSections() as $section) {
                $elements = $section->getElements();
                foreach ($elements as $element) {
                    if (method_exists($element, 'getText')) {
                        $text .= $element->getText() . "\n";
                    } elseif (method_exists($element, 'getElements')) {
                        // For tables and other complex elements
                        $this->extractTextFromElement($element, $text);
                    }
                }
            }

            $text = trim($text);

            if (!empty($text)) {
                $this->command->info("  Read description from Word document");
                return $text;
            }

            return null;
        } catch (\Exception $e) {
            $this->command->warn("  Error reading Word document: " . $e->getMessage());
            return null;
        }
    }

    private function extractTextFromElement($element, &$text)
    {
        if (method_exists($element, 'getText')) {
            $text .= $element->getText() . "\n";
        }

        if (method_exists($element, 'getElements')) {
            foreach ($element->getElements() as $childElement) {
                $this->extractTextFromElement($childElement, $text);
            }
        }
    }
}
