<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // CREATE THIS LINE OF CODE FOR SUBMITION OF FORM
    protected $fillable = ['title', 'description', 'is_completed'];
}
