<?php

namespace App\Tests\Entity;

use App\Entity\Author;
use PHPUnit\Framework\TestCase;

/**
 * Bonus point for unit test?
 *
 * Class AuthorTest
 * @package App\Tests\Entity
 */
class AuthorTest extends TestCase
{
    public function testEntitySerializable()
    {
        $author = new Author();
        $author->setName('SM');
        $json = json_encode($author);
        $this->assertJsonStringEqualsJsonString(
            '{"id ": null,"name":"SM"}',
            $json,
            "Serialization problem"
        );
    }
}
