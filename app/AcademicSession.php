<?php namespace Elihans;

use Illuminate\Database\Eloquent\Model;

class AcademicSession extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sessions';

    protected $fillable = ['current_session'];

}
