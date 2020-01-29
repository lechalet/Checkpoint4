<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use DateTime;

class EventFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      
      $faker  =  Faker\Factory::create('fr_FR');
      for ($i = 1; $i <= 20; $i++) {
          $event = new Event();
          $event->setDate(new DateTime);
          $event->setCapacity(200);
          $event->setPlace($faker->city);
          $event->setName($faker->text(20));
          $event->seteventImage("https://www.ville-liffre.fr/wp-content/uploads/sites/2/2019/06/cirque-1.jpg");
          $event->setDescription($faker->text(120));
          $manager->persist($event);
      }
        $manager->flush();
    }
}
