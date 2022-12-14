<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\MediaItem;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Interact with the user's name (get and set).
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => strtolower($value),
        );
    }

    /**
     * Interact with the user's email (get and set).
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function email(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ($value),
            set: fn ($value) => strtolower($value),
        );
    }
    
    /**
     * A function that creates a relationship between resources
     *
     * @author Carlos Fernández <fernandez.carlos@outlook.es>
     */ 
    public function mediaItems()
	{
		return $this->belongsToMany(MediaItem::class);
	}
}
