<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AudioNote extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assigned.
     *
     * @var array
     */
    protected $fillable = [
        'members', 'minister', 'date_of_event', 'title', 'voiceNote'
    ];
}
