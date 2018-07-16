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

        $announce = new Announce();
        $announce->setType($this->getReference('Pendulaires'));
        $announce->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.');
        $announce->setMarque('Air Creation');
        $announce->setModel('Pixel');
        $announce->setPrice('15380');
        $announce->setDatePost(new \DateTime('10-12-2018'));
        $announce->setState($this->getReference('Good'));
        $announce->setPicture('fixture1.jpg');
        $announce->setPicture2('fixture8.jpg');
        $announce->setPicture3('fixture9.jpg');
        $announce->setUser($this->getReference('john_user'));
        $manager->persist($announce);

        $announce2 = new Announce();
        $announce2->setType($this->getReference('Pendulaires'));
        $announce2->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.');
        $announce2->setMarque('Air Creation');
        $announce2->setModel('Clipper');
        $announce2->setPrice('15000');
        $announce2->setDatePost(new \DateTime('06-05-2018'));
        $announce2->setState($this->getReference('Good'));
        $announce2->setPicture('fixture2.jpg');
        $announce2->setPicture2('fixture8.jpg');
        $announce2->setPicture3('fixture9.jpg');
        $announce2->setUser($this->getReference('john_user'));
        $manager->persist($announce2);

        $announce3 = new Announce();
        $announce3->setType($this->getReference('Pendulaires'));
        $announce3->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.');
        $announce3->setMarque('Air Creation');
        $announce3->setModel('Tanarg');
        $announce3->setPrice('15000');
        $announce3->setDatePost(new \DateTime('06-05-2018'));
        $announce3->setState($this->getReference('Good'));
        $announce3->setPicture('fixture3.jpg');
        $announce3->setPicture2('fixture8.jpg');
        $announce3->setPicture3('fixture9.jpg');
        $announce3->setUser($this->getReference('john_user'));

        $manager->persist($announce3);

        $announce4 = new Announce();
        $announce4->setType($this->getReference('Pendulaires'));
        $announce4->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.');
        $announce4->setMarque('Air Creation');
        $announce4->setModel('Tanarg');
        $announce4->setPrice('15000');
        $announce4->setDatePost(new \DateTime('06-05-2018'));
        $announce4->setState($this->getReference('Good'));
        $announce4->setPicture('fixture4.jpg');
        $announce4->setPicture2('fixture8.jpg');
        $announce4->setPicture3('fixture9.jpg');
        $announce4->setUser($this->getReference('john_user'));

        $manager->persist($announce4);

        $announce5 = new Announce();
        $announce5->setType($this->getReference('Pendulaires'));
        $announce5->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.');
        $announce5->setMarque('Air Creation');
        $announce5->setModel('GTE');
        $announce5->setPrice('15000');
        $announce5->setDatePost(new \DateTime('06-05-2018'));
        $announce5->setState($this->getReference('Good'));
        $announce5->setPicture('fixture5.jpg');
        $announce5->setPicture2('fixture8.jpg');
        $announce5->setPicture3('fixture9.jpg');
        $announce5->setUser($this->getReference('john_user'));

        $manager->persist($announce5);

        $announce6 = new Announce();
        $announce6->setType($this->getReference('Pendulaires'));
        $announce6->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.');
        $announce6->setMarque('Air Creation');
        $announce6->setModel('Tanarg');
        $announce6->setPrice('15000');
        $announce6->setDatePost(new \DateTime('06-05-2018'));
        $announce6->setState($this->getReference('Good'));
        $announce6->setPicture('fixture6.jpg');
        $announce6->setPicture2('fixture8.jpg');
        $announce6->setPicture3('fixture9.jpg');
        $announce6->setUser($this->getReference('john_user'));

        $manager->persist($announce6);

        $announce7 = new Announce();
        $announce7->setType($this->getReference('Pendulaires'));
        $announce7->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.');
        $announce7->setMarque('Air Creation');
        $announce7->setModel('Tanarg');
        $announce7->setPrice('8000');
        $announce7->setDatePost(new \DateTime('25-05-2018'));
        $announce7->setState($this->getReference('Good'));
        $announce7->setPicture('fixture7.jpg');
        $announce7->setPicture2('fixture8.jpg');
        $announce7->setPicture3('fixture9.jpg');
        $announce7->setUser($this->getReference('john_user'));

        $manager->persist($announce7);

        $announce8 = new Announce();
        $announce8->setType($this->getReference('Pendulaires'));
        $announce8->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.');
        $announce8->setMarque('Air Creation');
        $announce8->setModel('Tanarg');
        $announce8->setPrice('45000');
        $announce8->setDatePost(new \DateTime('16-12-2018'));
        $announce8->setState($this->getReference('Good'));
        $announce8->setPicture('fixture8.jpg');
        $announce8->setPicture2('fixture8.jpg');
        $announce8->setPicture3('fixture9.jpg');
        $announce8->setUser($this->getReference('john_user'));

        $manager->persist($announce8);

        $announce9 = new Announce();
        $announce9->setType($this->getReference('Pendulaires'));
        $announce9->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.');
        $announce9->setMarque('Air Creation');
        $announce9->setModel('Tanarg');
        $announce9->setPrice('25000');
        $announce9->setDatePost(new \DateTime('06-09-2018'));
        $announce9->setState($this->getReference('Good'));
        $announce9->setPicture('fixture9.jpg');
        $announce9->setPicture2('fixture8.jpg');
        $announce9->setPicture3('fixture9.jpg');
        $announce9->setUser($this->getReference('john_user'));

        $manager->persist($announce9);

        $announce10 = new Announce();
        $announce10->setType($this->getReference('Pendulaires'));
        $announce10->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.');
        $announce10->setMarque('Air Creation');
        $announce10->setModel('Tanarg');
        $announce10->setPrice('10000');
        $announce10->setDatePost(new \DateTime('06-01-2018'));
        $announce10->setState($this->getReference('Good'));
        $announce10->setPicture('fixture10.jpg');
        $announce10->setPicture2('fixture8.jpg');
        $announce10->setPicture3('fixture9.jpg');
        $announce10->setUser($this->getReference('john_user'));

        $manager->persist($announce10);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AppFixtures::class,
            TypeFixtures::class,
            StateFixtures::class,
        ];
    }
}
