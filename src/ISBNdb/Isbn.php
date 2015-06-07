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
    const books_url = '/books?q=';
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
    private $query_string;
    private $index_searched;
    private $valid_token;
    private $found;

    public function __construct($token, $query_string)
    {
        $this->token = $token;
        $this->query_string = $query_string;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getQueryString()
    {
        return $this->query_string;
    }

    public function getUrl()
    {
        return Isbn::base_url . $this->getToken() . $this->getEndpoint() . $this->getQueryString();
    }

    public function getIndexSearched()
    {
        if (isset($this->index_searched))
        {
            return $this->index_searched;
        }

        return "";
    }

    public function isValidToken()
    {
        return $this->valid_token;
    }

    public function isFound()
    {
        return $this->found;
    }

    public function requestData()
    {
        $json = file_get_contents($this->getUrl());
        $obj = json_decode($json);

        if (isset($obj->index_searched))
        {
            $this->index_searched = $obj->index_searched;
        }

        // success
        if (isset($obj->data[0]))
        {
            $this->valid_token = true;
            $this->found = true;
            return $obj->data[0];
        }
        // error
        else if (isset($obj->error))
        {
            // get the first three words of the error message
            $pieces = explode(" ", $obj->error);
            $error_msg = implode(" ", array_splice($pieces, 0, 3));

            // invalid api key
            if ($error_msg == "Invalid api key:")
            {
                $this->valid_token = false;
                $this->found = false;
                return $obj->error;
            }

            // the given isbn is not found
            if ($error_msg == "Unable to locate")
            {
                $this->valid_token = true;
                $this->found = false;
                return $obj->error;
            }
        }
        else
        {
            return null;
        }
    }
}
