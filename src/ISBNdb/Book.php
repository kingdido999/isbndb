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
    private $book_id;
    private $edition_info;
    private $title;
    private $title_long;
    private $title_latin;
    private $author_id;
    private $author_name;
    private $language;
    private $publisher_id;
    private $publisher_text;
    private $publisher_name;
    private $summary;
    private $notes;
    private $isbn_10;
    private $isbn_13;
    private $awards_text;
    private $subject_ids;
    private $physical_description_text;
    private $lcc_number;                    // library of congress number
    private $dewey_decimal;                 // dewey decimal number
    private $dewey_normal;

    public function __construct($token, $query_string)
    {
        parent::__construct($token, $query_string);

        $this->endpoint = parent::book_url;
        $obj = $this->requestData($this->getUrl());

        if (isset($obj->data[0]))
        {
            $this->data = $obj->data[0];
        }

    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }

    public function getBookId()
    {
        if (isset($this->data->book_id))
        {
            return $this->data->book_id;
        }

        return "";
    }

    public function getEditionInfo()
    {
        if (isset($this->data->edition_info))
        {
            return $this->data->edition_info;
        }

        return "";
    }

    public function getTitle()
    {
        if (isset($this->data->title))
        {
            return $this->data->title;
        }

        return "";
    }

    public function getTitleLong()
    {
        if (isset($this->data->title_long))
        {
            return $this->data->title_long;
        }

        return "";
    }

    public function getTitleLatin()
    {
        if (isset($this->data->title_latin))
        {
            return $this->data->title_latin;
        }

        return "";
    }

    public function getAuthorId()
    {
        if (isset($this->data->author_data[0]->id))
        {
            return $this->data->author_data[0]->id;
        }

        return "";
    }

    public function getAuthorName()
    {
        if (isset($this->data->author_data[0]->name))
        {
            return $this->data->author_data[0]->name;
        }

        return "";
    }

    public function getNumPages()
    {
        if (isset($this->data->physical_description_text))
        {
            $subject = $this->data->physical_description_text;
            $pattern1 = '/([\d]+)( )(p\.)/';      // e.g., "1 online resource (169 p.)"
            $pattern2 = '/([\d]+)( )(pages)/';    // e.g., "8.3\"x10.8\"x0.2\"; 0.3 lb; 32 pages"

            if (preg_match($pattern1, $subject, $matches))
            {
                return $matches[1];
            }

            if (preg_match($pattern2, $subject, $matches))
            {
                return $matches[1];
            }
        }

        return "";
    }

    public function getLanguage()
    {
        if (isset($this->data->language))
        {
            return $this->data->language;
        }

        return "";
    }

    public function getPublisherId()
    {
        if (isset($this->data->publisher_id))
        {
            return $this->data->publisher_id;
        }

        return "";
    }

    public function getPublisherText()
    {
        if (isset($this->data->publisher_text))
        {
            return $this->data->publisher_text;
        }

        return "";
    }

    public function getPublisherName()
    {
        if (isset($this->data->publisher_name))
        {
            return $this->data->publisher_name;
        }

        return "";
    }

    public function getSummary()
    {
        if (isset($this->data->summary))
        {
            return $this->data->summary;
        }

        return "";
    }

    public function getNotes()
    {
        if (isset($this->data->notes))
        {
            return $this->data->notes;
        }

        return "";
    }

    public function getIsbn10()
    {
        if (isset($this->data->isbn10))
        {
            return $this->data->isbn10;
        }

        return "";
    }

    public function getIsbn13()
    {
        if (isset($this->data->isbn13))
        {
            return $this->data->isbn13;
        }

        return "";
    }

    public function getAwardsText()
    {
        if (isset($this->data->awards_text))
        {
            return $this->data->awards_text;
        }

        return "";
    }

    public function getSubjectIds()
    {
        if (isset($this->data->subject_ids))
        {
            return $this->data->subject_ids;
        }

        return "";
    }

    public function getPhysicalDescriptionText()
    {
        if (isset($this->data->physical_description_text))
        {
            return $this->data->physical_description_text;
        }

        return "";
    }

    public function getLccNumber()
    {
        if (isset($this->data->lcc_number))
        {
            return $this->data->lcc_number;
        }

        return "";
    }

    public function getDeweyDecimal()
    {
        if (isset($this->data->dewey_decimal))
        {
            return $this->data->dewey_decimal;
        }

        return "";
    }

    public function getDeweyNormal()
    {
        if (isset($this->data->dewey_normal))
        {
            return $this->data->dewey_normal;
        }

        return "";
    }
}
