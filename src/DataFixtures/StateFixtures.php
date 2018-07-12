<?php

namespace App\DataFixtures;

use App\Entity\State;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class StateFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $state = new State();
        $state->setState('En bon état');

        $state2 = new State();
        $state2->setState('Révisions nécessaire');

        $state3 = new State();
        $state3->setState('Pour pièces, ne peut plus voler');

        $manager->persist($state);
        $manager->persist($state2);
        $manager->persist($state3);

        $manager->flush();

        $this->addReference('Good', $state);
    }
}
