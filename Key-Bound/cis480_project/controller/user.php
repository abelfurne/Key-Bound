<?php
class User {
    private $userNo;
    private $username;
    private $password;
    private $userLevelNo;

    public function __construct($username, 
        $password, $userLevelNo, $userNo = null)
        {
            $this->username = $username;
            $this->password = $password;
            $this->userLevelNo = $userLevelNo;
            $this->userNo = $userNo;
        }

    public function getUsername() {
        return $this->username;
    }
    public function setUsername($value) {
        $this->username = $value;
    }

    public function getPassword() {
        return $this->password;
    }
    public function setPassword($value) {
        $this->password = $value;
    }

    public function getUserLevelNo() {
        return $this->userLevelNo;
    }
    public function setUserLevelNo($value) {
        $this->userLevelNo = $value;
    }

    public function getUserNo() {
        return $this->userNo;
    }
    public function setUserNo($value) {
        $this->userNo = $value;
    }
}