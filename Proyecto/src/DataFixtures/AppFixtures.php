<?php

namespace App\DataFixtures;

use App\Entity\Personal;
use App\Entity\Vacunas;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $personal = new Personal();
            $personal->setNombre('Roman');
            $personal->setEdad('21');
            $personal->setDepartamento('Rayos X');
            $personal->setCargo('Jefe');
            $personal->setSueldo('1500');
            $manager->persist($personal);


            $vacunas = new Vacunas();
            $vacunas->setDosis('1');
            $vacunas->setEstatus('vacunado');
            $vacunas->setObservaciones('ninguna');
            $vacunas->setPersonal($personal);
            $manager->persist($vacunas);
            

        $manager->flush();
    }
}
