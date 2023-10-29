<?php
class User_Level {
    private $userLevelNo;
    private $userLevelName;

    public function __construct($userLevelNo,
        $userLevelName)
        {
            $this->userLevelNo = $userLevelNo;
            $this->userLevelName = $userLevelName;
        }

    public function getUserLevelNo() {
        return $this->userLevelNo;
    }
    public function setUserLevelNo($value) {
        $this->userLevelNo = $value;
    }

    public function getUserLevelName() {
        return $this->userLevelName;
    }
    public function setUserLevelName($value) {
        $this->userLevelName = $value;
    }
}