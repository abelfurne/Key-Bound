<?php
require_once('../model/keybind_db.php');

$keybindNo = $_GET['no'];
KeybindDB::deleteKeybind($keybindNo);
header('location:keybinds.php');
?>