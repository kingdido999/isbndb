<?php

require_once __DIR__ . '/../src/ISBNdb/Isbn.php';
require_once __DIR__ . '/../src/ISBNdb/Book.php';

use ISBNdb\Book;

class TestBook extends PHPUnit_Framework_TestCase
{
    public function testValidToken()
    {
        $token = 'YPKFSSUW';
        $isbn = '084930315X';
        $book = new Book($token, $isbn);

        $result = $book->isValidToken();

        $this->assertTrue($result);
    }

    public function testInValidToken()
    {
        $token = 'YPKFSS';
        $isbn = '084930315X';
        $book = new Book($token, $isbn);

        $result = $book->isValidToken();

        $this->assertFalse($result);
    }

    public function testFound()
    {
        $token = 'YPKFSSUW';
        $isbn = '084930315X';
        $book = new Book($token, $isbn);

        $result = $book->isFound();

        $this->assertTrue($result);
    }

    public function testNotFound()
    {
        $token = 'YPKFSSUW';
        $isbn = '084930325X';
        $book = new Book($token, $isbn);

        $result = $book->isFound();

        $this->assertFalse($result);
    }

    public function testGetUrl()
    {
        $token = 'YPKFSSUW';
        $isbn = '084930315X';
        $book = new Book($token, $isbn);

        $expected = 'http://isbndb.com/api/v2/json/YPKFSSUW/book/084930315X';
        $result = $book->getUrl();

        $this->assertEquals($expected, $result);
    }

    public function testGetTitle()
    {
        $token = 'YPKFSSUW';
        $isbn = '084930315X';
        $book = new Book($token, $isbn);

        $expected = 'Principles of solid mechanics';
        $result = $book->getTitle();

        $this->assertEquals($expected, $result);
    }

    public function testGetAuthorName()
    {
        $token = 'YPKFSSUW';
        $isbn = '084930315X';
        $book = new Book($token, $isbn);

        $expected = 'Richards, Rowland';
        $result = $book->getAuthorName();

        $this->assertEquals($expected, $result);
    }

    public function testGetAuthorNameNull()
    {
        $token = 'YPKFSSUW';
        $isbn = '9780471302995';
        $book = new Book($token, $isbn);

        $expected = '';
        $result = $book->getAuthorName();

        $this->assertEquals($expected, $result);
    }

    public function testGetNumPagesPattern1()
    {
        $token = 'YPKFSSUW';
        $isbn = '084930315X';
        $book = new Book($token, $isbn);

        $expected = '446';
        $result = $book->getNumPages();

        $this->assertEquals($expected, $result);
    }

    public function testGetNumPagesPattern2()
    {
        $token = 'YPKFSSUW';
        $isbn = '9788131906804';
        $book = new Book($token, $isbn);

        $expected = '32';
        $result = $book->getNumPages();

        $this->assertEquals($expected, $result);
    }

    public function testGetNumPagesEmpty()
    {
        $token = 'YPKFSSUW';
        $isbn = '9780471756934';
        $book = new Book($token, $isbn);

        $expected = '';
        $result = $book->getNumPages();

        $this->assertEquals($expected, $result);
    }

    public function testGetLanguage()
    {
        $token = 'YPKFSSUW';
        $isbn = '084930315X';
        $book = new Book($token, $isbn);

        $expected = 'eng';
        $result = $book->getLanguage();

        $this->assertEquals($expected, $result);
    }

    public function testGetPublisherText()
    {
        $token = 'YPKFSSUW';
        $isbn = '084930315X';
        $book = new Book($token, $isbn);

        $expected = 'Boca Raton, FL : CRC Press, 2000.';
        $result = $book->getPublisherText();

        $this->assertEquals($expected, $result);
    }

    public function testGetPublisherName()
    {
        $token = 'YPKFSSUW';
        $isbn = '084930315X';
        $book = new Book($token, $isbn);

        $expected = 'CRC Press';
        $result = $book->getPublisherName();

        $this->assertEquals($expected, $result);
    }

    public function testGetIsbn10()
    {
        $token = 'YPKFSSUW';
        $isbn = '084930315X';
        $book = new Book($token, $isbn);

        $expected = '084930315X';
        $result = $book->getIsbn10();

        $this->assertEquals($expected, $result);
    }

    public function testGetIsbn13()
    {
        $token = 'YPKFSSUW';
        $isbn = '084930315X';
        $book = new Book($token, $isbn);

        $expected = '9780849303159';
        $result = $book->getIsbn13();

        $this->assertEquals($expected, $result);
    }
}
