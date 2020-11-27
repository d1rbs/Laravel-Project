<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class PeopleFilmsRelation
 * @package App\Models
 */
class PeopleFilmsRelation extends Pivot
{
    protected $table = 'people_films_relation';

    protected $fillable = [
        'people_id', 'film_id'
    ];
}