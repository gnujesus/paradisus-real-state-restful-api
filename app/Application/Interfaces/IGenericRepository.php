<?php

namespace App\Application\Interfaces;

interface IGenericRepository
{
    function delete(string $id);
    function findById(string $id);
    function store(array $data);
    function update(array $data);
    function findAll();
}
