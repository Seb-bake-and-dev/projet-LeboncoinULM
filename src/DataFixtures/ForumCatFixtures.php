<?php

namespace App\DataFixtures;

use Yosimitso\WorkingForumBundle\Entity\Forum;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ForumCatFixtures extends Fixture
{


    public function load(ObjectManager $manager)
    {
        $name = new Forum();
        $name->setName('Présentation');
        $name->setSlug('presentation');
        $name2 = new Forum();
        $name2->setName('Photos / Vidéos');
        $name2->setSlug('photosvideos');
        $name3 = new Forum();
        $name3->setName('Actualités Ulmistes');
        $name3->setSlug('actu');

        $manager->persist($name);
        $manager->persist($name2);
        $manager->persist($name3);


        $manager->flush();

    }
}
