<?php

namespace App\DataFixtures;

use App\Entity\Position ;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PostitionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $position = new Position();
        $position->setName('React');
        $manager->persist($position);

        $position = new Position();
        $position->setName('PHP');
        $manager->persist($position);

        $position = new Position();
        $position->setName('SRE');
        $manager->persist($position);

        $manager->flush();
    }
}
