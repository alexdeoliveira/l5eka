<?php
namespace App\Course\Repositories;

interface IProjectRepository
{
    public function projects($search);
    public function store($input);
    public function show($id);
    public function update($input, $id);
    public function destroy($id);
}
