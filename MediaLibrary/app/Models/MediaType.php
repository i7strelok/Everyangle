<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class MediaType extends Model
{
    use HasFactory;
    protected $table = 'media_types';
    protected $fillable = ['name'];

    public function categories()
	{
		return $this->hasMany(Category::class);
	}

    public static function boot() 
    {
        parent::boot();
        static::deleting(function($mediatype){
            $mediatype->categories()->get()->each(function($category){
                $category->delete();
            });
        });
    }
}
