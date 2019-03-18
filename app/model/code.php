<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class code extends Model
{
    use Notifiable;

    /**
     * The attribute that are mass assigned.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'status'
    ];
}
