<?php
namespace App\Services\Object\Articles;

class FilterArticles
{
    public $language;
    public $author_id;
    public $category_id;
    public $description;
    public $source_id;
    public $tag_id;
    public $start_date;
    public $end_date;

    /**
     * Summary of __construct
     * @param string $language
     * @param int $author_id
     * @param int $category_id
     * @param string $description
     * @param int $source_id
     * @param int $tag_id
     * @param string $start_date
     * @param string $end_date
     */
    public function __construct(
        string $language,
        int $author_id,
        int $category_id,
        string $description,
        int $source_id,
        int $tag_id,
        string $start_date,
        string $end_date
    )
    {
        $this->language = $language;
        $this->author_id = $author_id;
        $this->category_id = $category_id;
        $this->description = $description;
        $this->source_id = $source_id;
        $this->tag_id = $tag_id;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

}