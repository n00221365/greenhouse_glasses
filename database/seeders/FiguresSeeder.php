<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Figures;


class FiguresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $figures1 = New Figures;
        $figures1->id = 1;
        $figures1->firstName = "Taylor";
        $figures1->lastName = "Swift";
        $figures1->image = "stock.img";
        $figures1->score = 25;

        
        $figures1->save();

        $figures2 = New Figures;
        $figures2->id = 2;
        $figures2->firstName = "Kanye";
        $figures2->lastName = "West";
        $figures2->image = "stock.img";
        $figures2->score = 19;
        
        $figures2->save();


        $figures3 = New Figures;
        $figures3->id = 3;
        $figures3->firstName = "James";
        $figures3->lastName = "Maynard-Keenan";
        $figures3->image = "stock.img";
        $figures3->score = 4;

        
        $figures3->save();

        $figures4 = New Figures;
        $figures4->id = 4;
        $figures4->firstName = "Andrew";
        $figures4->lastName = "Hozier-Byrne";
        $figures4->image = "stock.img";
        $figures4->score = 6;
        
        $figures4->save();

 
    }
}
