<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Video extends Model
{
    protected $id= [
        'id'
    ];

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'descripcion',
        'url',
        'id_user',
    ];
    public function user()
    {
        return $this->hasMany('App\Models\User');
    }





}

