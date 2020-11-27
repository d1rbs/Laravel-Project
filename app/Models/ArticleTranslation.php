<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ArticleTranslation extends Model
{
    protected $table = 'article_translation';

    protected $fillable = [
        'article_id', 'language',  'title', 'description'
    ];

}


