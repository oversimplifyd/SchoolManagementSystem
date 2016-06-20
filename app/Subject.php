<?php namespace Elihans;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subjects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'group_id'];

    /*
     * Some Validation rules for this model's new instance.
     */
    public static $validationRules = array(
        'name' => 'required|string',
        'group_id' => 'required|integer',
    );

    public function classGroup()
    {
        return $this->belongsTo('Elihans\ClassGroup', 'group_id');
    }
}
