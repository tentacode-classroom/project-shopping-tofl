<?php

namespace App\DataFixtures;

use App\Entity\Car;
use App\Entity\Category;
use App\Entity\Tags;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CarFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $tagBelle = new Tags();
        $tagBelle->setName('Belle');
        $tagMoche = new Tags();
        $tagMoche->setName('Moche');
        $manager->persist($tagBelle);
        $manager->persist($tagMoche);

        $category = new Category();
        $category->setName('Luxe');
        $manager->persist($category);

        $tagsList = [$tagBelle, $tagMoche];
        for ($i = 1; $i <= 10; $i++) {
            $car = new Car();
            $car->setType('Voiture #' . $i);
            $car->setNbSeats(mt_rand(0, 5));
            $car->setPrice(mt_rand(1, 10)*1000);
            $images = ['caravane.png', 'mercedes.png', 'mustang.jpeg', 'renault.jpg'];
            $car->setImage($images[mt_rand(0, 3)]);
            $car->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi scelerisque lacinia nunc id placerat. Vivamus diam lectus, tempus ut vestibulum eget, congue nec ipsum.');
            $car->setYear(mt_rand(1970, 2018));
            $car->setCategory($category);
            $car->setNbViews(0);
            $randomTagId = rand(0, 1);
            $car->addTag($tagsList[$randomTagId]);

            $manager->persist($car);
        }

        $manager->flush();

        $manager->flush();
    }
}
