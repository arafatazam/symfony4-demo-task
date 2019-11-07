<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    private $data = array(
        0 =>
            array(
                'id' => 1,
                'first_name' => 'John',
                'last_name' => 'Boe',
                'email' => 'john.boe@email.com',
                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00',
            ),
        1 =>
            array(
                'id' => 2,
                'first_name' => 'John',
                'last_name' => 'Toe',
                'email' => 'john.toe@email.com',
                'created_at' => '2020-02-01 00:00:00',
                'updated_at' => '2020-02-01 00:00:00',
            ),
        2 =>
            array(
                'id' => 3,
                'first_name' => 'John',
                'last_name' => 'Koe',
                'email' => 'john.koe@email.com',
                'created_at' => '2020-03-01 00:00:00',
                'updated_at' => '2020-03-01 00:00:00',
            ),
        3 =>
            array(
                'id' => 4,
                'first_name' => 'John',
                'last_name' => 'Soe',
                'email' => 'john.soe@email.com',
                'created_at' => '2020-04-01 00:00:00',
                'updated_at' => '2020-04-01 00:00:00',
            ),
        4 =>
            array(
                'id' => 5,
                'first_name' => 'John',
                'last_name' => 'Loe',
                'email' => 'john.loe@email.com',
                'created_at' => '2020-05-01 00:00:00',
                'updated_at' => '2020-05-01 00:00:00',
            ),
    );

    public function load(ObjectManager $manager)
    {
        foreach ($this->data as $datum){
            $user = new User();
            $user->setId($datum['id']);
            $user->setFirstName($datum['first_name']);
            $user->setLastName($datum['last_name']);
            $user->setEmail($datum['email']);
            $user->setCreatedAt(new \DateTime($datum['created_at']));
            $user->setUpdatedAt(new \DateTime($datum['updated_at']));
            $manager->persist($user);
        }

        $manager->flush();
    }
}
