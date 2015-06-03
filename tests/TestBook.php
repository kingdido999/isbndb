<?php

require_once __DIR__ . '/../src/ISBNdb/Isbn.php';
require_once __DIR__ . '/../src/ISBNdb/Book.php';

use ISBNdb\Book;

class TestBook extends PHPUnit_Framework_TestCase
{
    public function testGetUrl()
    {
        $expected = 'http://isbndb.com/api/v2/json/YPKFSSUW/book/084930315X';

        $token = 'YPKFSSUW';
        $isbn = '084930315X';
        $book = new Book($token);
        $result = $book->getUrl($isbn);

        $this->assertEquals($expected, $result);
    }

    public function testRequestIndexSearched()
    {
        $expected = 'isbn';
        $token = 'YPKFSSUW';
        $isbn = '084930315X';
        $book = new Book($token);
        $result = $book->requestData($isbn)->index_searched;

        $this->assertEquals($expected, $result);
    }

    public function testGetLanguage()
    {
        $expected = 'eng';
        $token = 'YPKFSSUW';
        $isbn = '084930315X';
        $book = new Book($token);
        $book->requestData($isbn);
        $result = $book->getLanguage();

        $this->assertEquals($expected, $result);
    }
}
