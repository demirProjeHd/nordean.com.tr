<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductImagesSeeder extends Seeder
{
    private $productImages = [
        'UPGREI' => 'https://www.isolgomma.com/wp-content/uploads/2021/09/upgrei-cimosa-600-500x500.jpg',
        'GREI' => 'https://www.isolgomma.com/wp-content/uploads/2021/10/grei-cimosa-600-500x500.jpg',
        'UPROLL' => 'https://www.isolgomma.com/wp-content/uploads/2021/10/uproll-cimosa-600-500x500.jpg',
        'ROLL' => 'https://www.isolgomma.com/wp-content/uploads/2021/10/roll-cimosa-600-500x500.jpg',
        'HIGHMAT 20' => 'https://www.isolgomma.com/wp-content/uploads/2022/06/isolgomma-highmat-macro-500x500.jpg',
        'HIGHMAT 30' => 'https://www.isolgomma.com/wp-content/uploads/2022/06/isolgomma-highmat-macro-500x500.jpg',
        'HIGHMAT 50' => 'https://www.isolgomma.com/wp-content/uploads/2022/06/isolgomma-highmat-macro-500x500.jpg',
        'POINT' => 'https://www.isolgomma.com/wp-content/uploads/2022/06/isolgomma-point-macro-500x500.jpg',
        'BIFLOOR' => 'https://www.isolgomma.com/wp-content/uploads/2025/02/isolgomma-bifloor-01-500x500.jpg',
        'BASEWOOD EL' => 'https://www.isolgomma.com/wp-content/uploads/2024/01/isolgomma-basewood-EL-rotolo-500x500.jpg',
        'SYLCER' => 'https://www.isolgomma.com/wp-content/uploads/2022/06/isolgomma-sylcer-macro-500x500.jpg',
        'SYL AD' => 'https://www.isolgomma.com/wp-content/uploads/2022/06/isolgomma-sylad-macro-500x500.jpg',
    ];

    public function run()
    {
        $this->command->info('Downloading product images...');

        $destinationDir = public_path('images/products');
        if (!is_dir($destinationDir)) {
            mkdir($destinationDir, 0755, true);
        }

        foreach ($this->productImages as $productName => $imageUrl) {
            // Find product
            $product = Product::where('name_en', 'LIKE', '%' . $productName . '%')
                             ->orWhere('name_tr', 'LIKE', '%' . $productName . '%')
                             ->first();

            if (!$product) {
                $this->command->warn("Product not found: {$productName}");
                continue;
            }

            // Download image with curl
            try {
                $ch = curl_init($imageUrl);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36');

                $imageContent = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                $error = curl_error($ch);
                curl_close($ch);

                if ($imageContent === false || $httpCode !== 200) {
                    $this->command->warn("Failed to download image for: {$productName} (HTTP {$httpCode}, {$error})");
                    continue;
                }

                $extension = pathinfo($imageUrl, PATHINFO_EXTENSION);
                $extension = explode('?', $extension)[0]; // Remove query params
                if (!in_array($extension, ['jpg', 'jpeg', 'png', 'webp'])) {
                    $extension = 'jpg';
                }

                $slug = Str::slug($productName);
                $filename = $slug . '.' . $extension;
                $filePath = $destinationDir . '/' . $filename;

                file_put_contents($filePath, $imageContent);

                // Update product
                $product->update([
                    'image' => 'images/products/' . $filename
                ]);

                $this->command->info("Downloaded and updated: {$productName}");

            } catch (\Exception $e) {
                $this->command->error("Error downloading {$productName}: " . $e->getMessage());
            }
        }

        $this->command->info('Product images seeded successfully!');
    }
}
