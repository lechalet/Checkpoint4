<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      $ramdomImage = rand(1, 20);
      $lien = "https://randomuser.me/api/portraits/men/" . $ramdomImage . ".jpg";
      $faker  =  Faker\Factory::create('fr_FR');
      for ($i = 1; $i <= 20; $i++) {
          $actor = new Actor();
          $actor->setName($faker->name);
          $actor->setProfileImage($lien);
          $actor->setStory($faker->text(250));
          $actor->setOrigin($faker->country);
          $manager->persist($actor);
      }
        $manager->flush();
    }
}
