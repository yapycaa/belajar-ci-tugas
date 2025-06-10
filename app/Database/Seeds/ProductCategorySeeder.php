<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        // data kategori
        $data = [
            [
                'nama' => 'Laptop',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Printer',
                'created_at' => date("Y-m-d H:i:s"),
            ],
        ];

        foreach ($data as $item) {
            // insert ke tabel product_category
            $this->db->table('product_category')->insert($item);
        }
    }
}