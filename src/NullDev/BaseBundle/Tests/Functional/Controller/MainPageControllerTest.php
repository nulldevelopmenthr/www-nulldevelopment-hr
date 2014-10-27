<?php

namespace NullDev\BaseBundle\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainPageControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("/dev/null")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("Work")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("Company")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("Community")')->count() > 0);
    }


    public function testImpressum()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/impressum');

        $this->assertTrue($crawler->filter('html:contains("Legal information")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("Pravni podaci")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("VAT ID")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("OIB")')->count() > 0);
    }


    public function testAboutHtmlRedirect()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/about.html');
        $crawler = $client->followRedirect();

        $this->assertTrue($crawler->filter('html:contains("Legal information")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("Pravni podaci")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("VAT ID")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("OIB")')->count() > 0);
    }


    public function testBasicSiteClicking()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        // Go to impressum
        $link    = $crawler->filter('a:contains("Impressum")')->eq(0)->link();
        $crawler = $client->click($link);

        // Check I'm on impressum.
        $this->assertEquals('http://localhost/impressum', $client->getRequest()->getUri());


        // Go to homepage.
        $link    = $crawler->filter('a:contains("Null Development")')->eq(0)->link();
        $crawler = $client->click($link);

        // Check I'm on homepage.
        $this->assertEquals('http://localhost/', $client->getRequest()->getUri());

        // Go to homepage (again).
        $link    = $crawler->filter('a:contains("Null Development")')->eq(0)->link();
        $crawler = $client->click($link);

        // Check I'm on homepage.
        $this->assertEquals('http://localhost/', $client->getRequest()->getUri());

    }
}
