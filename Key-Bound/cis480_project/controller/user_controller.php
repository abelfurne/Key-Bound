<?php
include_once('user.php');
include_once('../model/user_db.php');

class UserController {
    private static function rowToUser($row) {
        $user = new User($row['Username'],
            $row['Password'],
            $row['UserLevelNo'],
            $row['UserNo']);

        return $user;
    }

    public static function validUser($username, $password) {
        $queryRes = UserDB::getUserByUsername($username);

        if ($queryRes) {
            $user = self::rowToUser($queryRes);
            if ($user->getPassword() === $password) {
                return $user->getUserLevelNo();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}