<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PrintingSupply;

class PrintingSuppliesSeeder extends Seeder
{
    public function run()
    {
        PrintingSupply::create([
            'name' => 'Epson Printer Ink',
            'description' => 'High-quality Inks.',
            'price' => 350.00,
            'image' => 'images/epson-ink.png'
        ]);

        PrintingSupply::create([
            'name' => 'HP Printer',
            'description' => 'Multipurpose Printer',
            'price' => 12000.00,
            'image' => 'images/hp-printer.png'
        ]);

        PrintingSupply::create([
            'name' => 'Brother Printer',
            'description' => 'The Best Affordable Printer fo students',
            'price' => 3500.00,
            'image' => 'images/brother-printer.png'
        ]);
    }
}
