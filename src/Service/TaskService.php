<?php


namespace App\Service;


use App\Dto\TaskDto;

class TaskService
{
    public function create(TaskDto $taskDto)
    {
        //Todo
        $taskDto->setId(random_int(0,100));
        $taskDto->setCreatedAt(new \DateTime());
        $taskDto->setUpdatedAt($taskDto->getCreatedAt());
        return $taskDto;
    }

    public function replace($id, TaskDto $taskDto)
    {
        //Todo
        $taskDto->setId($id);
        $taskDto->setUpdatedAt(new \DateTime());
        return $taskDto;
    }

}