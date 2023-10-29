<?php
require_once('database.php');

class UserDB {
    public static function getUsers() {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query = 'SELECT * FROM users
                INNER JOIN user_level
                    ON users.UserLevelNo = user_level.UserLevelNo';

            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    public static function getUserByUsername($username) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query = "SELECT * FROM users
                WHERE Username = '$username'";

            $result = $dbConn->query($query);
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public static function deleteUser($userNo) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query = "DELETE FROM users
                WHERE UserNo = '$userNo'";

            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    public static function addUser($userNo, $username, 
        $password, $userLevelNo)
    {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query = 
            "INSERT INTO users (UserNo, Username,
                Password, UserLevelNo)
            VALUES ('$userNo', '$username', '$password', '$userLevelNo')";

            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    public static function updateUser($userNo, $username,
        $password, $userLevelNo)
    {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query =
            "UPDATE users SET
                Username = '$username',
                Password = '$password',
                UserLevelNo = '$userLevelNo'
            WHERE UserNo = '$userNo'";

            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    public static function updatePassword($username,
        $password)
    {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query =
            "UPDATE users SET
                Username = '$username',
                Password = '$password'
            WHERE Username = '$username'";

            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
