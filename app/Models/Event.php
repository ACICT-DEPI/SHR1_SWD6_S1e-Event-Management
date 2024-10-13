<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'start_date',
        'end_date',
        'start_time',
        'image',
        'address',
        'num_tickets',
        'user_id',
        'city_id',
        'country_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function city() {
        return $this->belongsTo(City::class);
    }
    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
    public function attendings() {
        return $this->hasMany(Attending::class);
    }

    public function savedEvents()
    {
        return $this->hasMany(SavedEvent::class);
    }

    public function hasTag($tag){
        return $this->tags->contains($tag);
    }
}
