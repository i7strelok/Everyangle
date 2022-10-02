<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MediaItem;
class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['id', 'name', 'media_type'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    /*protected $casts = [ 
        'media_type' => \App\MediaTypes\MediaTypeEnum::class, 
    ];*/

    /**
     * A function that creates a relationship between resources
     *
     * @author Carlos Fernández <fernandez.carlos@outlook.es>
     */     
    public function mediaitems()
	{
        return $this->belongsToMany(
            MediaItem::class,
            'category_media_item',
            'category_id',
            'media_item_id');
	}

    /**
     * Function that is executed when deleting a category
     *
     * @author Carlos Fernández <fernandez.carlos@outlook.es>
     */ 
	public static function boot() 
    {
        parent::boot();
        static::deleting(function($category){
            $category->mediaItems()->get()->each(function($mediaItem){
                $mediaItem->delete(); //For each MediaItem of this category
            });
        });
    }

}
