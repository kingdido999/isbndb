<?php namespace ISBNdb;

/**
 * ISBNdb API v2 url and token setup
 *
 * http://isbndb.com/api/v2/docs
 *
 * @author     Pengcheng Ding <kingdido999@gmail.com>
 * @copyright  Pengcheng Ding 2015
 */

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
