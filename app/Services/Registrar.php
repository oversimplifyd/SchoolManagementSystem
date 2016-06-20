<?php namespace Elihans\Services;

use Elihans\User;
use Elihans\Guardian;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

    protected $studentRegValRules = [
        'username' => 'required|size:9',
        'password' => 'required|confirmed|min:6'];

    protected $adminRegValRules = [
        'username' => 'required|',
        'password' => 'required|confirmed|min:6'];

    protected $teacherRegValRules = [
        'username' => 'required|size:6',
        'password' => 'required|confirmed|min:6'];

    protected $guardianRegValRules = [
        'username' => 'required|max:255|unique:users',
        'name' => 'required|string',
        'phone' => 'required|alpha_num|max:50',
        'child_reg' => 'required|alpha_num|max:9',
        'profile_pix' => 'image',
        'password' => 'required|confirmed|min:6'];

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
        switch ($data[0]) {
            case "student":
                $validator = $this->studentRegValRules;
                break;
            case "teacher":
                $validator = $this->teacherRegValRules;
                break;
            case "guardian":
                $validator = $this->guardianRegValRules;
                break;
            default:
                $validator = $this->adminRegValRules;
        }

		return Validator::make($data[1], $validator);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
        //IF the current registration request is from a Parent, create a new Parent.
        if ($data[1]) {

            $newParent = Guardian::create(array(
                'name'=>$data[0]['name'],
                'phone'=>$data[0]['phone'],
                'child-reg'=>$data[0]['child_reg']));

            return User::create(array(
                'username'=>$data[0]['username'],
                'userable_id'=> $newParent->id,
                'userable_type'=> "Elihans\\Guardian",
                'password'=> bcrypt($data[0]['password'])));
        }

        //If the request is rom an admin, teacher or students. Get the Admin and return the Admin.
        //This is because all of the aforementioned users already have a data in the table.
        $user = User::where('username', $data[0]['username'])->first();

        //Returns nul if a password is already associated with this students/teacher.
        if ( ! is_null($user->password))
            return null;

        $user->password = bcrypt($data[0]['password']);
        $user->save();

        return $user->userable;

	}

}
