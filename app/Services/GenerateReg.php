<?php namespace Elihans\Services;

use Elihans\User;

class GenerateReg {

    /**
     * This generates a unique Registration Number for a student on Registration.
     * @return string
     */
    public function generateStudentReg()
    {
        do {
            $regNumber = $this->generateRegNum();
            $pin_exists = $this->testRegNumExists($regNumber);
        } while ($pin_exists);

        return $regNumber;

    }

    /**
     * This generates a unique number for a teacher on registration.
     * @return string
     */
    public function generateTeacherReg()
    {
        do {
            $regNumber = $this->generateRegNum("ELT", 3);
            $pin_exists = $this->testRegNumExists($regNumber);
        } while ($pin_exists);

        return $regNumber;
    }

    /**
     * This generates a pin for a user.
     * @param string $prefix
     * @param int $count
     * @return string
     */
    private function generateRegNum($prefix = "ELH", $count = 6)
    {
        $pin_array = array();

        for($i = 0; $i < $count; $i++) {
            $value = rand(0, 9);
            $pin_array[$i] = $value;
        }

        return $prefix.implode("", $pin_array);
    }

    /**
     * THis function tests if this registration number has been taken or not.
     * @param $uniqueRegNum
     * @return bool
     */
    private function testRegNumExists($uniqueRegNum)
    {
        $user = User::where('username', $uniqueRegNum)->get();
        return ! $user->isEmpty();
    }

}
