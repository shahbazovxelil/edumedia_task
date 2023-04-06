<?php

namespace App\Repositories\Interfaces;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;

interface UserRepositoryInterface
{
    public function create(StoreUserRequest $request,array $data):User;
    public function find(int $id): ?User;
    public function update(int $id, array $data):bool;
    public function delete(int $id): bool;
}
