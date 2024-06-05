<?php

namespace App\Models;

// database/migrations/xxxx_xx_xx_create_suggestions_table.php

    
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Suggestion extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'suggestion'];

}
