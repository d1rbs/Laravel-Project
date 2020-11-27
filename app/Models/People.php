<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class People
 * @package App\Models
 */
class People extends Model
{

    protected $table = 'people';

    protected $fillable = [
        'name', 'height',  'gender', 'homeworld', 'films'
    ];

}