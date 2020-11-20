<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Activite;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{

    private $passwordEncoder ;

         public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!


            for ($i = 0; $i < 20; $i++) {
                $user = new User();
                $user->setLogin('Internaute'.$i);
                $user->setPassword($this->passwordEncoder->encodePassword( $user,'motdepasse'));
                $user->setRoles(['Gerant']);
                $user->setNom("Michael");
                $user->setPrenom("Ange");
                $user->setAdresse('202 Rue Desaix');
                $user->setVille('Evry');
                $user->setCP('91000');
                $manager->persist($user);

            }


        

        $manager->flush();
    }
}
