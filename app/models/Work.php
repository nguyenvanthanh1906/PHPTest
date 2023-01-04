<?php

namespace models;

class Work
{
    private $id;
    private $name;
    private $startDate;
    private $endDate;
    private $status;

    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        
        return $this;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        
        return $this;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
