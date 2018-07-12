<?php

namespace App\DataFixtures;

use App\Entity\State;
use App\Entity\Announce;
use App\Entity\TypeUlm;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PendulaireFixtures extends Fixture implements DependentFixtureInterface
{


    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $announce = new Announce();
            $announce->setType($this->getReference('Pendulaires'));
            $announce->setDescription('IEPIZEPIZEPIZEPIZEPIHZEPIH');
            $announce->setMarque('Air Creation');
            $announce->setModel('Tanarg 380');
            $announce->setPrice('5380');
            $announce->setDatePost(new \DateTime('06-10-2018'));
            $announce->setState($this->getReference('Good'));
            $announce->setPicture('image_accueil.jpg');
            $manager->persist($announce);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            TypeFixtures::class,
            StateFixtures::class,
        ];
    }
}
