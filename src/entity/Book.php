<?php

namespace App\entity;
use DateTime;

class Book
{
    public int $id;
    public int $isbn;
    public string $name;
    public string $cover;
    public string $publication;
    public string $summary;
    protected int $category_id;
    protected int $author_id;

    
    


    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getIsbn(): int
    {
        return $this->isbn;
    }

    /**
     * @param int $isbn
     */
    public function setIsbn(int $isbn): void
    {
        $this->isbn = $isbn;
    }

    /**
     * @return string
     */
    public function getCover(): string
    {
        return $this->cover;
    }

    /**
     * @param string $cover
     */
    public function setCover(string $cover): void
    {
        $this->cover = $cover;
    }



    public function getName(): string
    {
       return $this->name;
    }

    public function setName($name)
    {
        $this->name =$name;
    }

    /**
     * @return string
     */
    public function getPublication(): string
    {
        return $this->publication;
    }

    /**
     * @param string $publication
     */
    public function setPublication(string $publication): void
    {
        $this->publication = $publication;
    }



    public function getSummary(): string 
    {
        return $this->summary;
    }

    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    public function getAuthorId(): int
    {
        return $this->author_id;
    }

    public function setAuthorId($author_id)
    {
        $this->author_id = $author_id;
    }

}
