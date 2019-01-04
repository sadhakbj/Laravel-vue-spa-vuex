<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Author
 * @package App
 */
class Author extends Model
{
    /**
     * The following fields are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'email', 'address', 'info', 'image'];
}
