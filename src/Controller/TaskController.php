<?php

namespace App\Controller;

use App\Dto\TaskDto;
use App\Service\TaskService;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    /** @var SerializerInterface  */
    protected $serializer;
    /**@var TaskService */
    protected $taskService;

    public function __construct(SerializerInterface $serializer, TaskService $taskService)
    {
        $this->serializer = $serializer;
        $this->taskService = $taskService;
    }

    /**
     * @Route("/task", methods={"POST"})
     * @param TaskDto $taskDto
     * @return JsonResponse
     */
    public function createTask(TaskDto $taskDto)
    {
        $resultDto = $this->taskService->create($taskDto);
        $result = $this->serializer->serialize($resultDto, 'json');
        return new JsonResponse($result, 200, [], true);
    }

    /**
     * @Route("/task/{id}", methods={"PUT"})
     * @param $id
     * @param TaskDto $taskDto
     * @return JsonResponse
     */
    public function replaceTask($id, TaskDto $taskDto)
    {
        $resultDto = $this->taskService->replace($id, $taskDto);
        $result = $this->serializer->serialize($resultDto, 'json');
        return new JsonResponse($result, 200, [], true);
    }

}
