<?php

namespace App\Models;

class User extends Model
{
    protected static array $safe = ["id", "created_at", "updated_at"];
    protected static string $entity = "users";

    public function boostrap()
    {

    }

    public function load(int $id)
    {

    }

    public function find(string $email)
    {

    }

    public function all(int $limit = 10, int $offset = 0)
    {

    }

    public function save()
    {

    }

    public function destroy(int $id)
    {

    }

    private function required()
    {

    }
}