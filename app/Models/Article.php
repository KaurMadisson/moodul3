<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title', 
        'body', 
        'spiciness_level', 
        'meaty_burger', 
        'vegetarian_burger', 
        'vegan_burger',
        'image'
    ];

    protected function snippet(): Attribute {
        return Attribute::get(function (){
            return explode("\n\n", $this->body)[0];
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getSpicinessLevelAttribute()
    {
        return $this->attributes['spiciness_level'];
}

}