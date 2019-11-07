<?php


namespace App\Dto;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\AccessType;

/** @AccessType("public_method") */
class TaskDto
{
    /**
     * @Serializer\Type("int")
     */
    private $id;
    /**
     * @Serializer\Type("int")
     * @Accessor(getter="getParentId",setter="setParentId")
     */
    private $parent_id;
    /**
     * @Serializer\Type("int")
     * @Accessor(getter="getUserId",setter="setUserId")
     */
    private $user_id;
    /**
     * @Serializer\Type("string")
     */
    private $title;
    /**
     * @Serializer\Type("int")
     */
    private $points;
    /**
     * @Serializer\Type("int")
     * @Accessor(getter="getIsDone",setter="setIsDone")
     */
    private $is_done;
    /**
     * @Serializer\Type("string")
     */
    private $email;
    /**
     * @Serializer\ReadOnly()
     * @Serializer\Type("DateTime<'Y-m-d H:i:s'>")
     * @Accessor(getter="getCreatedAt", setter="setCreatedAt")
     */
    private $created_at;
    /**
     * @Serializer\ReadOnly()
     * @Serializer\Type("DateTime<'Y-m-d H:i:s'>")
     * @Accessor(getter="getUpdatedAt", setter="setUpdatedAt")
     */
    private $updated_at;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * @param mixed $parent_id
     */
    public function setParentId($parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param mixed $points
     */
    public function setPoints($points): void
    {
        $this->points = $points;
    }

    /**
     * @return mixed
     */
    public function getIsDone()
    {
        return $this->is_done;
    }

    /**
     * @param mixed $is_done
     */
    public function setIsDone($is_done): void
    {
        $this->is_done = $is_done;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at): void
    {
        $this->updated_at = $updated_at;
    }


}