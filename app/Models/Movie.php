<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'imdb_id',
        'title',
        'year',
        'rated',
        'released',
        'runtime',
        'plot',
        'awards',
        'poster',
        'ratings',
        'meta_score',
        'imdb_rating',
        'imdb_votes',
        'type',
        'dvd_release_date',
        'box_office',
        'production',
        'website',
    ];

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }

    public function directors()
    {
        return $this->belongsToMany(Director::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    public function writers()
    {
        return $this->belongsToMany(Writer::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
