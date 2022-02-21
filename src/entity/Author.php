<?php

namespace App\entity;

class Author
{
    protected int $id;
    protected string $name;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


}