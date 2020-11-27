<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Planets extends Model
{
    protected $table = 'planets';

    protected $fillable = [
        'name'
    ];

    public function peopleApi()
    {
        return $this->belongsTo(PeopleAPI::class,'id', 'homeworld');
}
}