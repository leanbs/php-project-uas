<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
   	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'kegiatan';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'date',
        'info'
    ];
}
