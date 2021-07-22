<?php

namespace App\DataFixtures;

use App\Entity\Aliment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AlimentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 25; $i++) {
            $aliment = new Aliment();
            $aliment->setName('aliment_' . $i);
            $aliment->setCategory($this->getReference('category_' . rand(1,10)));
            $manager->persist($aliment);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          CategoryFixtures::class,
        ];
    }
}
