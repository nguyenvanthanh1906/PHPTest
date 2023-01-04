<?php

use models\Work;

class WorksRepository
{
    function all()
    {
        $db = DB::getInstance();
        return $db->query('SELECT * FROM works');
    }

    function add(Work $work) {
        $name = $work->getName();
        $startDate = $work->getStartDate();
        $endDate = $work->getEndDate();
        $status = $work->getStatus();

        $db = DB::getInstance();
        return $db->query("INSERT INTO `works` (`id`, `name`, `start_date`, `end_date`, `status`)
        VALUES (NULL, '$name', '$startDate', '$endDate', '$status')");
    }

    function find($id)
    {
        $db = DB::getInstance();

        return $db->query("SELECT * FROM works WHERE id = '$id'");
    }

    function update(Work $work) {
        $id = $work->getId();
        $name = $work->getName();
        $startDate = $work->getStartDate();
        $endDate = $work->getEndDate();
        $status = $work->getStatus();

        $db = DB::getInstance();

        return $db->query("UPDATE works
        SET `name` = '$name', `start_date` = '$startDate', `end_date` = '$endDate', `status` = '$status'
        WHERE (`id` = '$id')");
    }

    function delete($id) {
        $db = DB::getInstance();

        return $db->query("DELETE FROM works WHERE (`id` = '$id')");
    }
}
