<?php namespace Elihans;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teachers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'gender','class_id', 'class_type_id', 'profile_pix', 'teacher_reg', 'address', 'phone','created_at', 'updated_at'];

    /*
     * Some Validation rules for this model's new instance.
     */
    public static $validationRules = array(
        'name' => 'required|string',
        'gender' => 'required',
        'class_id' => 'required|integer',
        'class_type_id' => 'required|integer',
        'address' => 'required|string',
        'phone' => 'required|digits_between:6,20',
        'profile_pix' => 'image',
    );

    /*
     * Some Validation rules for this model's new instance.
     */
    public static $updateRules = array(
        'address' => 'string',
        'phone' => 'digits_between:6,20',
        'profile_pix' => 'image',
    );

    public function teacherClass()
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
