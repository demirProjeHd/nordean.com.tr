<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Str;

class ExtractImagesFromPDFSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Extracting images from PDFs...');

        $parser = new Parser();
        $destinationDir = public_path('images/products');

        if (!is_dir($destinationDir)) {
            mkdir($destinationDir, 0755, true);
        }

        // Get products without images
        $products = Product::whereNull('image')
                          ->whereNotNull('pdfs')
                          ->get();

        $this->command->info("Found {$products->count()} products without images");

        foreach ($products as $product) {
            if (empty($product->pdfs) || !is_array($product->pdfs)) {
                continue;
            }

            $this->command->info("Processing: {$product->name_tr}");

            // Get first PDF
            $pdfPath = storage_path('app/public/' . $product->pdfs[0]);

            if (!file_exists($pdfPath)) {
                $this->command->warn("  PDF not found: {$pdfPath}");
                continue;
            }

            try {
                // Parse PDF
                $pdf = $parser->parseFile($pdfPath);
                $images = $this->extractImagesFromPdf($pdf);

                if (empty($images)) {
                    $this->command->warn("  No images found in PDF");
                    continue;
                }

                // Save first image
                $slug = Str::slug($product->name_tr);
                $filename = $slug . '.jpg';
                $filePath = $destinationDir . '/' . $filename;

                file_put_contents($filePath, $images[0]);

                // Update product
                $product->update([
                    'image' => 'images/products/' . $filename
                ]);

                $this->command->info("  ✓ Extracted and saved image");

            } catch (\Exception $e) {
                $this->command->error("  Error: " . $e->getMessage());
            }
        }

        $this->command->info('Image extraction completed!');
    }

    private function extractImagesFromPdf($pdf)
    {
        $images = [];

        try {
            $pages = $pdf->getPages();

            foreach ($pages as $page) {
                $xObjects = $page->getXObjects();

                foreach ($xObjects as $xObject) {
                    if ($xObject->getHeader()->get('Subtype')->getContent() === 'Image') {
                        $content = $xObject->getContent();

                        // Try to get raw image data
                        if (!empty($content)) {
                            $images[] = $content;
                        }
                    }
                }

                // Limit to first page and first few images
                if (!empty($images)) {
                    break;
                }
            }
        } catch (\Exception $e) {
            // Silent catch - some PDFs might not have extractable images
        }

        return $images;
    }
}
