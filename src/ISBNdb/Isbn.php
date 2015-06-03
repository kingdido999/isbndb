<?php namespace ISBNdb;

class Isbn
{
    const base_url = 'http://isbndb.com/api/v2/json/';
    const book_url = '/book/';

    private $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function getToken()
    {
        return $this->token;
    }
}
