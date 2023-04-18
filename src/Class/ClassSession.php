<?php

namespace App\Class;

class ClassSession{
    public static function set($obj) {
        $_SESSION['user'] = [
            'id' => $obj[0],
            'username' => $obj[1],
            'name' => $obj[2],
            'surname' => $obj[3],
            'email' => $obj[4],
            'tel' => $obj[5],
            'admin' => $obj[6]
        ];
    }

    public static function destroy() {
        unset($_SESSION['user']);
    }

    public static function get() {
        return $_SESSION['user'];
    }
}

?>