<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;


class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions1 = New Question;
        $questions1->id = 1;
        $questions1->number = 1;
        $questions1->question = "Typically, how far would you travel via car per week?";
        
        $questions1->save();

        $questions2 = New Question;
        $questions2->id = 2;
        $questions2->number = 2;
        $questions2->question = "What form of transport would you use most often on a weekly basis?";
        
        $questions2->save();

 
    }
}
