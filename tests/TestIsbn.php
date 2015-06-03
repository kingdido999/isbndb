<?php

require_once __DIR__ . '/../src/ISBNdb/Isbn.php';

use ISBNdb\Isbn;

class TestIsbn extends PHPUnit_Framework_TestCase
{
    public function testGetToken()
    {
        $expected = 'YPKFSSUW';

        $token = 'YPKFSSUW';
        $isbn_class = new Isbn($token);
        $result = $isbn_class->getToken();

        $this->assertEquals($expected, $result);
    }
}
