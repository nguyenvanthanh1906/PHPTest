<?php

class DB
{
    private static $instance = NULl;
    public static function getInstance() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new mysqli('db', 'thanh', '123456', 'php_test');
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }

        return self::$instance;
    }
}
