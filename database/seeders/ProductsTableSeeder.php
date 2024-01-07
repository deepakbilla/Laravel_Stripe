<?php 

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class ProductsTableSeeder extends Seeder
{
    public function run()
    {
         $products = [
            [
                'name' => 'Samsung Mobile m31',
                'price' => '100',
                'description' => 'Samsung Mobile',
            ],
            [
                'name' => 'one plus nord ce',
                'price' => '150',
                'description' => 'one plus nord',
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }

    }
}
?>
