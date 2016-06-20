<?php namespace Elihans;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','gender', 'student_reg', 'class_id', 'class_type_id',
                            'dob', 'phone', 'profile_pix', 'created_at', 'updated_at'];

    /*
     * Some Validation rules for this model's new instance.
     */
    public static $validationRules = array(
        'name' => 'required|string',
        'gender' => 'required',
        'class_id' => 'required|integer',
        'class_type_id' => 'required|integer',
        'dob' => 'required|date',
        'phone' => 'digits_between:6,20',
        'profile_pix' => 'image',
    );

    public static $updateRules = array(
        'phone' => 'digits_between:6,20',
        'profile_pix' => 'image',
    );

    public function result()
    {
        return $this->hasMany('Elihans\Result');
    }

    public function studentClass()
    {
        return $this->belongsTo('Elihans\StudentClass', "class_id");
    }

    public function classType()
    {
        return $this->belongsTo('Elihans\ClassType', 'class_type_id');
    }

    public function user()
    {
        return $this->morphOne('Elihans\User', 'userable');
    }

}
