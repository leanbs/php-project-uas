<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'slide';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [        
        'image_path',
        'image_name',
        'title',
        'info',
        'status'
    ];
}
