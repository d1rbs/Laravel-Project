<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $table = 'category_translation';

    protected $fillable = [
        'category_id', 'language',  'title', 'description'
    ];

}