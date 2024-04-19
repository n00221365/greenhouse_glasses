<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Answer;


class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $answers1 = New Answer;
        $answers1->id = 1;
        $answers1->question_id = 1;
        $answers1->col1answer = "0-10";
        $answers1->col2answer = "11-20";
        $answers1->col3answer = "21-30";
        $answers1->col4answer = "31+";

        $answers1->value = 1;
        
        $answers1->save();

        $answers2 = New Answer;
        $answers2->id = 2;
        $answers2->question_id = 1;
        $answers2->col1answer = "Walk";
        $answers2->col2answer = "Cycle";
        $answers2->col3answer = "Public Transport";
        $answers2->col4answer = "Private Transport ";
        $answers2->value = 2;
        
        $answers2->save();

        $answers3 = New Answer;
        $answers3->id = 3;
        $answers3->question_id = 1;
        $answers3->col1answer = "Always";
        $answers3->col2answer = "Sometimes";
        $answers3->col3answer = "Rarely";
        $answers3->col4answer = "Never";
        $answers3->value = 3;
        
        $answers3->save();

        $answers4 = New Answer;
        $answers4->id = 4;
        $answers4->question_id = 1;
        $answers4->col1answer = "Diesel";
        $answers4->col2answer = "Unleaded";
        $answers4->col3answer = "Hybrid";
        $answers4->col4answer = "Electric";
        $answers4->value = 4;
        
        $answers4->save();

      
    }
}
