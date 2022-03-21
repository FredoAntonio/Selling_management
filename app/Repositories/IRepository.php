<?php

namespace App\Repositories;

interface IRepository
{
   
    public function all();
    

    public function find(int $id);
 
    public function findByColumn(string $column, $value);
    

    public function save(array $attributes);

    public function saveMany(array $attributes);

    public function update(int $id, array $attributes);


}