<?php

require_once __DIR__ . '/../src/ISBNdb/Isbn.php';
require_once __DIR__ . '/../src/ISBNdb/Book.php';

use ISBNdb\Book;

class TestBook extends PHPUnit_Framework_TestCase
{
    private $token;
    private $isbn;
    private $book;

    public function setUp()
    {
        $this->token = 'YPKFSSUW';
        $this->isbn = '084930315X';
        $this->book = new Book($this->token, $this->isbn);
    }

    public function testGetUrl()
    {
        $expected = 'http://isbndb.com/api/v2/json/YPKFSSUW/book/084930315X';
        $result = $this->book->getUrl();

        $this->assertEquals($expected, $result);
    }

    public function testGetTitle()
    {
        $expected = 'Principles of solid mechanics';
        $result = $this->book->getTitle();

        $this->assertEquals($expected, $result);
    }

    public function testGetAuthorName()
    {
        $expected = 'Richards, Rowland';
        $result = $this->book->getAuthorName();

        $this->assertEquals($expected, $result);
    }

    public function testGetLanguage()
    {
        $expected = 'eng';
        $result = $this->book->getLanguage();

        $this->assertEquals($expected, $result);
    }

    public function testGetPublisherText()
    {
        $expected = 'Boca Raton, FL : CRC Press, 2000.';
        $result = $this->book->getPublisherText();

        $this->assertEquals($expected, $result);
    }

    public function testGetPublisherName()
    {
        $expected = 'CRC Press';
        $result = $this->book->getPublisherName();

        $this->assertEquals($expected, $result);
    }

    public function testGetIsbn10()
    {
        $expected = '084930315X';
        $result = $this->book->getIsbn10();

        $this->assertEquals($expected, $result);
    }

    public function testGetIsbn13()
    {
        $expected = '9780849303159';
        $result = $this->book->getIsbn13();

        $this->assertEquals($expected, $result);
    }
}
