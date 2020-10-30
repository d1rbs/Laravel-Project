<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Relation
 * @package App\models
 */
class Relation extends Model
{
    protected $table = 'article_category_relation';

    protected $fillable = [
        'article_id', 'category_id'
    ];
}