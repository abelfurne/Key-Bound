<?php
require_once('database.php');

class KeybindDB {
    public static function getKeybinds() {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query = 'SELECT * FROM keybinds
                INNER JOIN users
                    ON keybinds.Username = users.Username';
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    public static function deleteKeybind($keybind) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query = "DELETE FROM keybinds
                WHERE KeybindNo = '$keybind'";

            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    public static function addKeybind($keybindNo, $abilityName, 
        $value, $modifier, $username)
    {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query = 
            "INSERT INTO keybinds (KeybindNo, AbilityName,
                Value, Modifier, Username)
            VALUES ('$keybindNo', '$abilityName', '$value', '$modifier', '$username')";

            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    public static function updateKeybind($keybindNo, $abilityName,
        $value, $modifier, $username)
    {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query =
            "UPDATE keybinds SET
                AbilityName = '$abilityName',
                Value = '$value',
                Modifier = '$modifier',
                Username = '$username'
            WHERE KeybindNo = '$keybindNo'";

            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
