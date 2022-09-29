<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MediaType;

class MediaItem extends Model
{
    use HasFactory;
    protected $table = 'media_items';
    protected $fillable = ['name', 'description', 'media_type_id', 'filename'];

    public function mediatype()
	{
		return $this->belongsTo(MediaType::class);
	}
}
