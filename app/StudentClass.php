<?php namespace Elihans;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'group_id'];

    public function student()
    {
        return $this->hasMany('Elihans\Student');
    }

    public function teacher()
    {
        return $this->hasOne('Elihans\Teacher');
    }

    public function classGroup()
    {
        return $this->belongsTo('Elihans\ClassGroup', 'group_id');
    }

}
