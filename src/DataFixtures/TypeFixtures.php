<?php

namespace App\DataFixtures;

use App\Entity\TypeUlm;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{


    public function load(ObjectManager $manager)
    {
        $type = new TypeUlm();
        $type->setType('Pendulaires');

        $type2 = new TypeUlm();
        $type2->setType('MultiAxes');

        $type3 = new TypeUlm();
        $type3->setType('Paramoteurs');

        $type4 = new TypeUlm();
        $type4->setType('Aérostats');

        $type5 = new TypeUlm();
        $type5->setType('Hélicoptères');

        $type6 = new TypeUlm();
        $type6->setType('Autogire');


        $manager->persist($type);
        $manager->persist($type2);
        $manager->persist($type3);
        $manager->persist($type4);
        $manager->persist($type5);
        $manager->persist($type6);

        $manager->flush();

        $this->addReference('Pendulaires', $type);
    }
}
