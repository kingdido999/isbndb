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
    private $data;                          // returned JSON data
    private $valid_token;
    private $found;

    private $index_searched;
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
        $this->data = $this->requestData();
    }

    public function requestData()
    {
        $url = $this->getUrl();
        $json = file_get_contents($url);
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

    public function getUrl()
    {
        return parent::base_url . $this->getToken() . Isbn::book_url . $this->getQueryString();
    }

    public function isValidToken()
    {
        return $this->valid_token;
    }

    public function isFound()
    {
        return $this->found;
    }

    public function getData()
    {
        if (isset($this->data))
        {
            return $this->data;
        }

        return "";
    }

    public function getIndexSearched()
    {
        if (isset($this->index_searched))
        {
            return $this->index_searched;
        }

        return "";
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
