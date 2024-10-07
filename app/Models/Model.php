<?php

namespace App\Models;

use App\Database\Connect;
use PDOException;
use stdClass;

abstract class Model
{
    protected ?object $data;
    protected ?\PDOException $fail;
    protected ?string $message;

    public function __set(string $name, $value): void
    {
        if (empty($this->data)) {
            $this->data = new stdClass();
        }

        $this->data->{$name} = $value;
    }

    public function __isset(string $name): bool
    {
       return isset($this->data->{$name});
    }

    public function __get(string $name)
    {
        return ($this->data->{$name} ?? null);
    }

    public function data(): ?object
    {
        return $this->data;
    }

    public function fail(): ?\PDOException
    {
        return $this->fail;
    }

    public function message(): ?string
    {
        return $this->message;
    }

    public function create()
    {

    }

    public function read(string $select, ?string $params): ?\PDOStatement
    {
        try {
            $stmt = Connect::getInstance()->prepare($select);
            parse_str($params, $item);
            if ($item) {
                foreach ($item AS $key => $value) {
                   $type = (is_numeric($key)) ? \PDO::PARAM_INT : \PDO::PARAM_STR;
                   $stmt->bindValue(":{$key}", $value, $type);
                }
            }
            $stmt->execute();
            return $stmt;
        }catch (PDOException $exception){
             $this->fail = $exception;
             return null;
        }
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    protected function safe(): ?array
    {
        return [] ?? null;
    }

    private function filter()
    {

    }
}