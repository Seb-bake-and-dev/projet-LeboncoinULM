<?php

namespace App\DataFixtures;

use App\Entity\Region;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class RegionFixtures extends Fixture
{


    public function load(ObjectManager $manager)
    {
        $region = new Region();
        $region->setName('Auvergne-Rhône-Alpes');

        $region2 = new Region();
        $region2->setName('Bourgogne-Franche-Comté');

        $region3 = new Region();
        $region3->setName('Bretagne');

        $region4 = new Region();
        $region4->setName('Centre-Val de Loire');

        $region5 = new Region();
        $region5->setName('Corse');

        $region6 = new Region();
        $region6->setName('Grand Est');
                
        $region7 = new Region();
        $region7->setName('Hauts-de-France');

        $region8 = new Region();
        $region8->setName('Île-de-France');

        $region9 = new Region();
        $region9->setName('Normandie');

        $region10 = new Region();
        $region10->setName('Nouvelle-Aquitaine');

        $region11 = new Region();
        $region11->setName('Occitanie');

        $region12 = new Region();
        $region12->setName('Pays de la Loire');
        
        $region13 = new Region();
        $region13->setName('Provence-Alpes-Côte d\'Azur');

        $manager->persist($region);
        $manager->persist($region2);
        $manager->persist($region3);
        $manager->persist($region4);
        $manager->persist($region5);
        $manager->persist($region6);
        $manager->persist($region7);
        $manager->persist($region8);
        $manager->persist($region9);
        $manager->persist($region10);
        $manager->persist($region11);
        $manager->persist($region12);
        $manager->persist($region13);

        $manager->flush();

        $this->addReference('Auvergne', $region);
        $this->addReference('Normandie', $region9);
        $this->addReference('Occitanie', $region11);
    }
}
