<?php

namespace App\Interfaces;

interface IAmenityService extends IGenericService
{

    function find(string $id);
    function update(string $id, array $data);
    function delete(string $id);
    function store($data);
    function findAll();
}
