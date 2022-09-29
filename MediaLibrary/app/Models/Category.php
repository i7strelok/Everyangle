<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MediaType;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name', 'media_type_id'];

    public function mediatype()
	{
		return $this->belongsTo(MediaType::class, 'media_type_id');
	}
}
