<?php
require_once('database.php');

class User_Level_DB {
    public static function getUserLevels() {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query = "SELECT * FROM user_level";

            return $dbConn->query($query);
        } else {
            return false;
        }
    }
}