<?php

namespace App\Interfaces;

interface IGenericRepository
{
    public function delete(string $id);
    function findById(string $id);
    function store(array $data);
    public function update(array $data);
    function findAll();
}
