<?php

namespace App\Contracts;

interface ComponentRepository
{
    public function store(Dto $dto);

    public function toEntity(ToEntity $user);
}
