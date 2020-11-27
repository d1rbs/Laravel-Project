<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Gender
 * @package App\Models
 */
class Gender extends Model
{
    protected $table = 'gender';

    protected $fillable = [
        'name'
    ];

}