<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
    ];

    /**
     * The atttributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
