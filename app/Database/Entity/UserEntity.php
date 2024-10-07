<?php

namespace App\Database\Entity;

class UserEntity
{
    private int $id;
    private string $first_name;

    public function setFirstName(): string
    {
        return $this->first_name;
    }
}