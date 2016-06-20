<?php namespace Elihans;

use Illuminate\Database\Eloquent\Model;

class NewsBoard extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'newsboards';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','news', 'publish', 'featured_image', 'created_at', 'updated_at'];

    /*
     * Some Validation rules for this model's new instance.
     */
    public static $validationRules = array(
        'title' => 'required',
        'news' => 'required',
        'featured_image' => 'image'
    );

    public static $months = array (
        "01" => "January",
        "02" => "February",
        "03" => "March",
        "04" => "April",
        "05" => "May",
        "06" => "June",
        "07" => "JUly",
        "08" => "August",
        "09" => "September",
        "10" => "October",
        "11" => "November",
        "12" => "December "
    );
}
