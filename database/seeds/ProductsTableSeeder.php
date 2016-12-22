<?php

use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Store\Option;
use Store\Product;
use Store\ProductOption;
use Store\Repositories\ProductRepository;
use Store\Variant;
use Store\VariantValue;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = factory(Product::class, 20)->create()->each(function ($product) {
            $file_names = ['ECL000177.jpg', 'EPL000144.jpg'];
            $image_file_name = $file_names[array_rand($file_names)];
            $image_file_path = "private/seeds/images/$image_file_name";

            $product = ProductRepository::attachImage(
                $product,
                new UploadedFile(
                    storage_path('app') . DIRECTORY_SEPARATOR . $image_file_path,
                    $image_file_name,
                    'image/jpeg',
                    Storage::disk('local')->size($image_file_path)
                ));

            $option_color = Option::whereName('color')->first();
            $option_karat = Option::whereName('karat')->first();
            ProductOption::create([
                'product_id' => $product->id,
                'option_id' => $option_color->id
            ]);
            ProductOption::create([
                'product_id' => $product->id,
                'option_id' => $option_karat->id
            ]);
            foreach ($option_color->values()->get() as $color) {
                foreach ($option_karat->values()->get() as $karat) {
                    $variant = Variant::create([
                        'product_id' => $product->id,
                        'price' => 0
                    ]);
                    VariantValue::create([
                        'variant_id' => $variant->id,
                        'option_id' => $option_color->id,
                        'option_value_id' => $color->id
                    ]);
                    VariantValue::create([
                        'variant_id' => $variant->id,
                        'option_id' => $option_karat->id,
                        'option_value_id' => $karat->id
                    ]);
                }
            }
        });
    }
}