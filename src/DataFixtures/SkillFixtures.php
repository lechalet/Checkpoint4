<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class SkillFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      
      $faker  =  Faker\Factory::create('fr_FR');
      for ($i = 1; $i <= 20; $i++) {
          $skill = new Skill();
          $skill->setName($faker->jobTitle);
          $manager->persist($skill);
      }
        $manager->flush();
    }
}
