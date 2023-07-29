<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TalkControllerTest extends WebTestCase
{
    public function testListingTalks(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorCount(2, '#accepted tbody tr');
        $this->assertSelectorCount(3, '#proposed tbody tr');
    }

    public function testAcceptingTalks(): void
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $crawler = $client->request('GET', '/');
        $proposal = $crawler->filter('#proposed tbody tr:first-child');

        $client->submit($proposal->selectButton('Accept')->form());

        $this->assertResponseIsSuccessful();
        $this->assertSelectorCount(3, '#accepted tbody tr');
        $this->assertSelectorCount(2, '#proposed tbody tr');
        $this->assertSelectorExists('#accepted td:contains('.$proposal->filter('td:first-child')->text().')');
    }
}
