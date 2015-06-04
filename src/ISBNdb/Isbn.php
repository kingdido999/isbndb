<?php namespace ISBNdb;

class Isbn
{
    const base_url = 'http://isbndb.com/api/v2/json/';
    const book_url = '/book/';
    const books_url = '/books/';
    const author_url = '/author/';
    const authors_url = '/authors/';
    const publisher_url = '/publisher/';
    const publishers_url = '/publishers/';
    const subject_url = '/subject/';
    const subjects_url = '/subjects/';
    const category_url = '/category/';
    const categories_url = '/categories/';
    const prices_url = '/prices/';

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
