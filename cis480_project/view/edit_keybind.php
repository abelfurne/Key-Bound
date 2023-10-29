<?php
require_once('../model/keybind_db.php');
session_start();

$username = $_SESSION['id'];
$ability = $_POST['abilityName'];
$modifier = $_POST['modifier'];
$value = $_POST['value'];
$no = $_SESSION['no'];

KeybindDB::updateKeybind((int) $no, $ability, $value, $modifier, $username);
header('location:keybinds.php');
?>