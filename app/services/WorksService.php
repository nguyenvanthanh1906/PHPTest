<?php

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
                    'title' => $row['name'],
                    'start' => $row['start_date'],
                    'end' => $row['end_date']
                ];
            }
        }

        return $result;
    }
}
