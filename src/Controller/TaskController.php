<?php

namespace App\Controller;

use App\Dto\TaskDto;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    /** @var SerializerInterface  */
    protected $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @Route("/task", methods={"POST"})
     * @param TaskDto $taskDto
     * @return JsonResponse
     */
    public function createTask(TaskDto $taskDto){
        $result = $this->serializer->serialize($taskDto, 'json');
        return new JsonResponse($result, 200, [], true);
    }
}
