<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class words extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'members', 'preacher_name', 'topic', 'date_preached', 'message', 'uploadFile', 'checkRadio'
    ];
}
