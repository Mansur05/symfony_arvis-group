<?php


namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CompanyControllerTest extends WebTestCase
{

    public function testIndex():void
    {
        $client = static::createClient();

        $client->request('GET', '/company/1');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

}