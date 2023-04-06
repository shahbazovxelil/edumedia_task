<?php

namespace App\Repositories;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{

    public function create(StoreUserRequest $request,array $data): User
    {
        return User::updateOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->name,
                'username' => $request->username,
                'phone' => $request->phone,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]
        );
    }
    public function find(int $id): ?User
    {
        return User::find($id);
    }
    public function update(int $id, array $data):bool
    {
        return User::where('id', $id)->update($data) > 0;

    }
    public function delete(int $id): bool
    {
        return User::destroy($id) > 0;
    }




}
