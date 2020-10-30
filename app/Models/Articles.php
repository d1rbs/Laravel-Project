<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App
 */
class Articles extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'user_id', 'name', 'description', 'slug', 'image'
    ];


    /**
     * Get the comments for the articles post.
     */
    public function relations()
    {
        return $this->hasMany('App\Models\Relation');
    }

}
