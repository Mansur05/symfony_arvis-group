<?php


namespace App\Tests\Controller\API\v1;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BranchAPIControllerTest extends WebTestCase
{

    public function testReadAllFromCompany(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/v1/branch/readAllFromCompany/1');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }


}