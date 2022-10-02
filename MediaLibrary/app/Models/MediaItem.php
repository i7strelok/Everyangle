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
	}

    public function play(): string{
        $mediaTypes = \App\MediaTypes\MediaType::getMediaTypes();
        if(isset($mediaTypes[$this->media_type])){
            $view = $mediaTypes[$this->media_type]->play($this->filename);
            return $view;
        }        
    }

}
