<?php

namespace App\Models;

abstract class Model
{
    protected ?object $data;
    protected ?\PDOException $fail;
    protected ?string $message;

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

    public function read()
    {

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