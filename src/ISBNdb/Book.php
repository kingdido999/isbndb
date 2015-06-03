<?php namespace ISBNdb;

class Book extends Isbn
{
    private $language;
    private $publisher_text;
    private $publisher_name;
    private $title_latin;
    private $isbn_10;
    private $isbn_13;
    private $notes;
    private $summary;
    private $title;
    private $edition_info;
    private $author_name;

    public function __construct($token)
    {
        parent::__construct($token);
    }

    public function getUrl($isbn)
    {
        return parent::base_url . $this->getToken() . Isbn::book_url . $isbn;
    }

    public function requestData($isbn)
    {
        $url = $this->getUrl($isbn);
        $json = file_get_contents($url);
        $obj = json_decode($json);
        $data = $obj->data[0];

        $this->language = $data->language;

        return $obj;
    }

    public function getLanguage()
    {
        return $this->language;
    }
}
