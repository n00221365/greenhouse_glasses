<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// Designates the cardinality of the tables, meaning how they relate to and interact with each other
// So in this example, every album can have many songs
class Question extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'number',
        'question',
     
    ];


}