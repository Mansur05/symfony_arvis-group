<?php

namespace App\DataFixtures;

use App\Entity\Branch;
use App\Entity\Company;
use App\Entity\Employee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }


    public function load(ObjectManager $manager)
    {
        for ($m = 0; $m < 5; $m++) {
            $company = new Company();
            $company->setName($this->faker->word());

            for ($i = 0; $i < 5; $i++) {
                $branch = new Branch();
                $branch->setName($this->faker->word());
                $branch->setDescription($this->faker->paragraph(3));
                $branch->setCompany($company);

                for ($k = 0; $k < 5; $k++) {
                    $employee = new Employee();
                    $employee->setName($this->faker->name('male'));
                    $employee->setPosition($this->faker->randomElement([
                        'developer',
                        'manager',
                        'cleaner',
                    ]));
                    $employee->setBranch($branch);

                    $manager->persist($employee);
                }

                $manager->persist($branch);
            }

            $manager->persist($company);
        }

        $manager->flush();
    }
}
