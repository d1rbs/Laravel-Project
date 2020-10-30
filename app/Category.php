<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App
 */
class Category extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'name','slug','description', 'publish'
    ];
}