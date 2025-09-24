<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class User extends Authenticatable 
// implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;


    public function posts(){
        return $this->hasMany(Post::class);
    }

    
    public function following(){
        return $this->belongsToMany(User::class, 'followers',  'follower_id','user_id');
    }

    public function followers(){
        return $this->belongsToMany(User::class, 'followers',  'user_id','follower_id',);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'image',
        'bio',
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

    public function imageUrl(){
        if($this->image){
            return Storage::url($this->image);
        }
        return null;
    }

    public function isFollowedBy(User $user){
        return $this->followers()->where('follower_id', $user->id)->exists();
    }
}
