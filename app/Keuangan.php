<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'keuangan';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [        
        'date',
        'info',
        'total'
    ];
}
