<?php

namespace App\entity;

class Category
{
    protected int $id;
    protected array $name;
    
        
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
     * @return array
     */
    public function getName(): array
    {
        return $this->name;
    }

    /**
     * @param array $name
     */
    public function setName(array $name): void
    {
        $this->name = $name;
    }


}