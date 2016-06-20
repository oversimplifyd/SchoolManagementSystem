<?php namespace Elihans;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images';

    protected $fillable = ['title', 'image', 'created_at', 'updated_at'];

    /*
     * Some Validation rules for this model's new instance.
     */
    public static $validationRules = array(
        'title' => 'required|string',
        'image' => 'image'
    );
}
