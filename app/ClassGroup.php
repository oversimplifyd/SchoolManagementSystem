<?php namespace Elihans;

use Illuminate\Database\Eloquent\Model;

class ClassGroup extends Model {

    protected $table = "classgroups";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

}
