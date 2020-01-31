<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
/*         $faker  =  Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 10; $i++) {
      // Création d’un utilisateur de type “auteur”
      $subscriber = new User();
      $subscriber->setEmail('subscriber@monsite.com');
      $subscriber->setRoles(['ROLE_SUBSCRIBER']);
      $subscriber->setPassword($this->passwordEncoder
      ->encodePassword(
          $subscriber,
          'password'
      ));
    }

      $manager->persist($subscriber);
 */
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 10; $i++) {
        // Création d’un utilisateur de type “administrateur”
        $admin = new User();
        $admin->setEmail('admin@monsite.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'password'
      ));
    }

      $manager->persist($admin);

      // Sauvegarde des 2 nouveaux utilisateurs :
      $manager->flush();
    }
}
