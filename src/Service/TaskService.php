<?php


namespace App\Service;


use App\Dto\TaskDto;
use App\Entity\Task;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class TaskService
{
    /** @var EntityManagerInterface  */
    private $entityManager;
    private $taskRepository, $userRepository;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->entityManager = $manager;
        $this->taskRepository = $this->entityManager->getRepository(Task::class);
        $this->userRepository = $this->entityManager->getRepository(User::class);
    }

    public function create(TaskDto $taskDto)
    {
        $task = new Task();
        $this->dto2entity($taskDto, $task);
        $this->entityManager->persist($task);
        $this->entityManager->flush();
        $result = new TaskDto();
        $this->entity2dto($task, $result);
        return $result;
    }

    public function replace($id, TaskDto $taskDto)
    {
        //Todo
        $taskDto->setId($id);
        $taskDto->setUpdatedAt(new \DateTime());
        return $taskDto;
    }

    private function dto2entity(TaskDto $dto, Task $entity)
    {
        if($dto->getParentId()){
            $entity->setParent($this->taskRepository->find($dto->getParentId()));
        }
        $entity->setUser($this->userRepository->find($dto->getUserId()));
        $entity->setPoints($dto->getPoints());
        $entity->setTitle($dto->getTitle());
        $entity->setIsDone($dto->getIsDone());
    }

    private function entity2dto(Task $entity, TaskDto $dto)
    {
        $dto->setId($entity->getId());
        if($entity->hasParent()){
            $dto->setParentId($entity->getParent()->getId());
        }
        $dto->setUserId($entity->getUser()->getId());
        $dto->setPoints($entity->getPoints());
        $dto->setTitle($entity->getTitle());
        $dto->setIsDone($entity->getIsDone());
        $dto->setCreatedAt($entity->getCreatedAt());
        $dto->setUpdatedAt($entity->getUpdatedAt());
    }
}