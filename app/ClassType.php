<?php namespace Elihans;

use Illuminate\Database\Eloquent\Model;

class ClassType extends Model {

    protected $table = "classtypes";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
