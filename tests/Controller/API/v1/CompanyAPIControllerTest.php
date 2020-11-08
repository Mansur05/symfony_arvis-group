<?php


namespace App\Tests\Controller\API\v1;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CompanyAPIControllerTest extends WebTestCase
{

    public function testRead()
    {
        $client = static::createClient();

        $client->request('GET', '/api/v1/company/read/1');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

}