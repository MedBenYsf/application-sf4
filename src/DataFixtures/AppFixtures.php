<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\Project;
use Nelmio\Alice\Loader\NativeLoader;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $loader = new NativeLoader();
        $objectSet = $loader->loadFile(__DIR__.'/Fixtures/projects.yaml')->getObjects();

        foreach ($objectSet as $project) {
                    $manager->persist($project);
        }        
 
        $manager->flush();
    }
}
