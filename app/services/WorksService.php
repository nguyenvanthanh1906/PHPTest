<?php

require_once('models/Work.php');

use models\Work;

class WorksService
{
    private $worksRepository;

    public function __construct(WorksRepository $worksRepository)
    {
        $this->worksRepository = $worksRepository;
    }

    function getAll()
    {
        $result = [];
        $req = $this->worksRepository->all();

        if ($req->num_rows > 0) {
            while($row = $req->fetch_assoc()) {
                $result[] = [
                    'id' => $row['id'],
                    'title' => $row['name'],
                    'start' => $row['start_date'],
                    'end' => $row['end_date']
                ];
            }
        }

        return $result;
    }

    function addWork($data)
    {
        $name = $data['name'] ?? null;
        $startDate = $data['startDate'] ?? null;
        $endDate = $data['endDate'] ?? null;
        $status = $data['status'] ?? null;

        if (empty($name) || empty($startDate) || empty($endDate) || empty($status)) {
            return false;
        }

        $work = new Work();
        $work->setName($name);
        $work->setStartDate($startDate);
        $work->setEndDate($endDate);
        $work->setStatus($status);

        return $this->worksRepository->add($work);
    }

    function findById($id) {
        $work = new Work;
        $req = $this->worksRepository->find($id);
        if ($req->num_rows > 0) {
            while($row = $req->fetch_assoc()) {
                $work->setId($row['id']);
                $work->setName($row['name']);
                $work->setStartDate($row['start_date']);
                $work->setEndDate($row['end_date']);
                $work->setStatus($row['status']);
            }
        }

        return $work->getId() ? $work : null;
    }

    function updateById($data) {
        $id = $data['id'] ?? null;
        $name = $data['name'] ?? null;
        $startDate = $data['startDate'] ?? null;
        $endDate = $data['endDate'] ?? null;
        $status = $data['status'] ?? null;

        if (empty($id) || empty($name) || empty($startDate) || empty($endDate) || empty($status)) {
            return false;
        }

        $work = $this->findById($id);
        $work->setName($name);
        $work->setStartDate($startDate);
        $work->setEndDate($endDate);
        $work->setStatus($status);
        
        return $this->worksRepository->update($work);
    }

    function deleteById($data) {
        $id = $data['id'] ?? null;

        if (empty($id)) {
            return false;
        }
        
        return $this->worksRepository->delete($id);
    }
}
