<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Score;


class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scores1 = New Score;
        $scores1->id = 1;
        $scores1->user_id = 1;
        $scores1->score = 25;
        $scores1->emissions = 5;
        
        $scores1->save();

        $scores2 = New Score;
        $scores2->id = 2;
        $scores2->user_id = 2;
        $scores2->score = 25;
        $scores2->emissions = 5;
        
        $scores2->save();

        $scores3 = New Score;
        $scores3->id = 3;
        $scores3->user_id = 3;
        $scores3->score = 25;
        $scores3->emissions = 5;
        
        $scores3->save();

        $scores4 = New Score;
        $scores4->id = 4;
        $scores4->user_id = 4;
        $scores4->score = 25;
        $scores4->emissions = 5;
        
        $scores4->save();

        $scores5 = New Score;
        $scores5->id = 5;
        $scores5->user_id = 5;
        $scores5->score = 25;
        $scores5->emissions = 5;
        
        $scores5->save();
    }
}
