<?php

namespace App\DataFixtures;

use App\Entity\TestEntity;
use App\Enum\TestEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $entity = new TestEntity();
         $entity->setState(TestEnum::IN_PROGRESS);
         $manager->persist($entity);

         $entity = new TestEntity();
         $entity->setState(TestEnum::NEW);
         $manager->persist($entity);

        $manager->flush();
    }
}
