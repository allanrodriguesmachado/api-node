<?php

namespace App\Models;

class User extends Model
{
    protected static array $safe = ["id", "created_at", "updated_at"];
    protected static string $entity = "users";

    public function boostrap()
    {

    }

    public function load(int $id, string $columns = "*")
    {
        $load = $this->read(
            "SELECT {$columns} FROM " . self::$entity . " WHERE id = :id", "id={$id}"
        );

//        if ($this->fail || !$load->rowCount()) {
//            $this->message = "Usuario nao encontrado para o id inforado";
//            return null;
//        }

        return $load->fetchObject(__CLASS__);
    }

    public function find(string $email, ?string $columns = "*")
    {
        $find = $this->read(
            "SELECT {$columns} FROM " . self::$entity . " WHERE id = :email", "email={$email}"
        );

//        if ($this->fail || !$load->rowCount()) {
//            $this->message = "Usuario nao encontrado para o id inforado";
//            return null;
//        }

        return $find->fetchObject(__CLASS__);
    }

    public function all(int $limit = 10, int $offset = 0, ?string $columns = "*")
    {
        $all = $this->read(
            "SELECT {$columns} FROM " . self::$entity . " LIMIT :l OFFESET :o", "l={$limit}&o={$offset}"
        );

//        if ($this->fail || !$load->rowCount()) {
//            $this->message = "Usuario nao encontrado para o id inforado";
//            return null;
//        }

        return $all->fetchObject(\PDO::FETCH_CLASS,__CLASS__);
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