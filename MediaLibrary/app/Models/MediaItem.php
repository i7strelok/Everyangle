<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class MediaItem extends Model
{
    use HasFactory;
    protected $table = 'media_items';
    protected $fillable = ['id', 'name', 'description', 'media_type', 'filename'];
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    /*protected $casts = [ 
        'media_type' => \App\MediaTypes\MediaTypeEnum::class 
    ];*/

    public function categories()
	{
		return $this->belongsToMany(Category::class);
        return $this->belongsToMany(
            Category::class,
            'category_media_item',
            'media_item_id',
            'category_id');
	}

    public function play(): string{
        $mediaTypes = \App\MediaTypes\AbstractMediaType::getMediaTypes();
        if(isset($mediaTypes[$this->media_type])){
            $view = $mediaTypes[$this->media_type]->play($this->filename);
            return $view;
        }        
    }

}
