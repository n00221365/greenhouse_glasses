<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// Designates the cardinality of the tables, meaning how they relate to and interact with each other
// So in this example, every album can have many songs
class Answer extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'question_id',
        'cal1answer',
        'cal2answer',
        'cal3answer',
        'cal4answer',

        'value',
     
    ];


}