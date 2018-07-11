<?php

namespace App\DataFixtures;

use App\Entity\TypeUlm;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class TypeFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

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
        $type5->setType('hélicoptères');


        $manager->persist($type);
        $manager->persist($type5);
        $manager->persist($type2);
        $manager->persist($type3);
        $manager->persist($type4);

        $manager->flush();
    }

}
