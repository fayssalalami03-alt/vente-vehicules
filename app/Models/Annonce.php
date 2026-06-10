<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    /** @use HasFactory */
         use HasFactory;
     protected $fillable = ['title','description', 'marque','modele',
     'annee','prix','ville','category_id','user_id',
     ];
     
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
