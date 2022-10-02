<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
class MediaItem extends Model
{
    use HasFactory;
    protected $table = 'media_items';
    protected $fillable = ['id', 'name', 'description', 'media_type', 'filename', 'user_id'];
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    /*protected $casts = [ 
        'media_type' => \App\MediaTypes\MediaTypeEnum::class 
    ];*/

    /**
     * A function that creates a relationship between resources
     *
     * @author Carlos Fernández <fernandez.carlos@outlook.es>
     */ 
    public function categories()
	{
		return $this->belongsToMany(Category::class);
	}

    /**
     * A function that creates a relationship between resources
     *
     * @author Carlos Fernández <fernandez.carlos@outlook.es>
     */ 
    public function author()
	{
		return $this->belongsTo(User::class);
	}

    /**
     * This functionality executes the play() method of the correct class.
     *
     * @author Carlos Fernández <fernandez.carlos@outlook.es>
     * @return string
     */ 
    public function play(): string{
        $mediaTypes = \App\MediaTypes\MediaType::getMediaTypes();
        if(isset($mediaTypes[$this->media_type])){
            $view = $mediaTypes[$this->media_type]->play($this->filename);
            return $view;
        }        
    }

}
