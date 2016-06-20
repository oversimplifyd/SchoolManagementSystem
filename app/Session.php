<?php namespace Elihans;

use Illuminate\Database\Eloquent\Model;

use Elihans\Student;

class Session extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sessions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['current_session', 'created_at', 'updated_at'];

    /**
     * This function moves all students to a new class for every new session.
     * That is listen for an update in the sessions table.
     */
    protected static function boot()
    {
        parent::boot();

        static::updated(function($session) {
            $allStudents = Student::all();
            foreach ($allStudents as $student) {
                if ($student->class_id < 15) {
                    $student->class_id = $student->class_id + 1;
                    $student->save();
                }
            }
        });
    }

    /**
     * Gets the list of academic sessions for the next 50 years.
     * @return array
     */
    public static function academicSessions()
    {
        $current_session = static::find(1);
        $yearArray = preg_split('/\//', $current_session->current_session);

        $sessions = [];

        for ($i = $yearArray[0]; $i < $yearArray[0] +51; $i++) {
            $sessions[] = $i . '/'. ($i + 1);
        }

        return $sessions;
    }
}
