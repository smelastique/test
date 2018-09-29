<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Bonus point for integration test?
 *
 * Class ApiControllerTest
 * @package App\Tests\Controller
 */
class ApiControllerTest extends WebTestCase
{
    /**
     * @param string $url
     * @dataProvider getPublicUrls
     */
    public function testPublicUrls(string $url)
    {
        $client = static::createClient();
        $client->request('GET', $url);

        $this->assertSame(
            Response::HTTP_OK,
            $client->getResponse()->getStatusCode(),
            sprintf('The %s public URL loads correctly.', $url)
        );
    }

    /**
     * List of URLs defined in task description.
     *
     * @return \Generator
     */
    public function getPublicUrls()
    {
        yield ['/publishers/list'];
        yield ['/publishers/3'];
        yield ['/authors/list'];
        yield ['/authors/7'];
        yield ['/books/highlighted'];
        yield ['/books/49'];
        yield ['/books/search/elastique'];
        yield ['/books/search/elastique/0/1'];
    }
}
