<?php namespace ISBNdb;

/**
 * ISBNdb API v2 endpoint `/book`
 *
 * http://isbndb.com/api/v2/docs/books
 *
 * @author     Pengcheng Ding <kingdido999@gmail.com>
 * @copyright  Pengcheng Ding 2015
 */

class Book extends Isbn
{
    private $isbn;
    private $data;

    private $title;
    private $author_name;
    private $language;
    private $publisher_text;
    private $publisher_name;
    private $summary;
    private $notes;
    private $isbn_10;
    private $isbn_13;

    public function __construct($token, $isbn)
    {
        parent::__construct($token);

        $this->isbn = $isbn;
        $this->data = $this->requestData();
    }

    public function requestData()
    {
        $url = $this->getUrl($this->isbn);
        $json = file_get_contents($url);
        $obj = json_decode($json);

        return $obj->data[0];
    }

    public function getUrl()
    {
        return parent::base_url . $this->getToken() . Isbn::book_url . $this->isbn;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getTitle()
    {
        return $this->data->title;
    }

    public function getAuthorName()
    {
        return $this->data->author_data[0]->name;
    }

    public function getLanguage()
    {
        return $this->data->language;
    }

    public function getPublisherText()
    {
        return $this->data->publisher_text;
    }

    public function getPublisherName()
    {
        return $this->data->publisher_name;
    }

    public function getSummary()
    {
        return $this->data->summary;
    }

    public function getNotes()
    {
        return $this->data->notes;
    }

    public function getIsbn10()
    {
        return $this->data->isbn10;
    }

    public function getIsbn13()
    {
        return $this->data->isbn13;
    }
}
