<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class MediaItem extends Model
{
    use HasFactory;
    protected $table = 'media_items';
    protected $fillable = ['name', 'description', 'media_type', 'filename'];
    
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
		return $this->HasMany(Category::class);
	}

}
