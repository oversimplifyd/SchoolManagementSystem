<?php namespace Elihans;

use Illuminate\Database\Eloquent\Model;

class Result extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'results';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['student','subjects', 'class', 'score', 'session','term', 'type'];

    public function resultTerm()
    {
        return $this->belongsTo('Elihans\Term', 'term');
    }

    public function resultSubject()
    {
        return $this->belongsTo('Elihans\Subject', 'subjects');
    }

    public function resultStudent()
    {
        return $this->belongsTo('Elihans\Student', 'student');
    }

    public static function processResult($result)
    {
        $result = (int)$result;

        if ($result >= 60 && $result < 70)
            return "B";

        if ($result >= 50 && $result < 60)
            return "C";

        if ($result >= 40 && $result < 50)
            return "D";

        if ($result >= 30 && $result < 40)
            return "E";

        if ($result < 30)
            return "F";
        else
            return "A";
    }
}
