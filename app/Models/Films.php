<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Films
 * @package App\Models
 */
class Films extends Model
{
    protected $table = 'films';

    protected $fillable = [
        'name', 'urk'
    ];
}