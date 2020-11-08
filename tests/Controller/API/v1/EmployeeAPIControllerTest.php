<?php


namespace App\Tests\Controller\API\v1;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EmployeeAPIControllerTest extends WebTestCase
{

    public function testReadAllFromBranch(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/v1/employee/readAllFromBranch/1');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

}