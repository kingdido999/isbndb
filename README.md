# ISBNdb

PHP composer for isbndb.com API service.

## API (endpoints) Implemented

- [x] `/book`
- [ ] `/books`
- [ ] `/author`
- [ ] `/authors`
- [ ] `/publisher`
- [ ] `/publishers`
- [ ] `/subject`
- [ ] `/subjects`
- [ ] `/category`
- [ ] `/categories`
- [ ] `/prices`

## Usage

#### Book

```php
$api_key = 'YOUR_API_KEY';
$query_string = '084930315X';  // 10 or 13 digits ISBN or book id

$book = new ISBNdb\Book($api_key, $query_string);
$title = $book->getTitle();
```
