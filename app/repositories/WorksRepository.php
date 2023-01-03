<?php

class WorksRepository
{
    function all()
    {
        $db = DB::getInstance();
        return $db->query('SELECT * FROM works');
    }
}
