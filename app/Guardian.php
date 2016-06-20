<?php namespace Elihans;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'parents';

    protected $fillable = ['name', 'username', 'child_reg', 'phone'];

    public function user()
    {
        return $this->morphOne('Elihans\User', 'userable');
    }
}
