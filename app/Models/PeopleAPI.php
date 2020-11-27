<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class PeopleAPI
 * @package App\Models
 */
class PeopleAPI extends Model
{
    /**
     * @var string
     */
    protected $table = 'people_api';
    /**
     * @var array
     */
    protected $fillable = [
       'user_id', 'name', 'height',  'gender', 'homeworld'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function planets()
    {
       return $this->hasOne('App\Models\Planets', 'id', 'homeworld');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function optionNameFilms()
    {
        return $this->hasManyThrough(
            'App\Models\Films',
            'App\Models\PeopleFilmsRelation',
             'people_id', // Foreign key on relation table...
            'film_id', // Foreign key on films table...
            'id', // Local key on api table...
            'film_id' // Local key on relation table...
        );
    }

}