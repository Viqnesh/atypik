<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        
            $user = new User();
            $user->setLogin('Gerant');
            $user->setPassword('gerant');
            $user->setNom('Tillai');
            $user->setPrenom('Vignesh');
            $user->setAdresse('202 rue desaix');
            $user->setVille('Evry');
            $user->setCP('91000');
            $user->setRoles(['Gerant']);

            
            $manager->persist($user);
        

        $manager->flush();
    }
}
