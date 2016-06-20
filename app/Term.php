<?php namespace Elihans;

use Illuminate\Database\Eloquent\Model;

class Term extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'terms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

}
