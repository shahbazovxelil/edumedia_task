<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function index(): View
    {
        return view('backend.users.index');
    }

    public function create(): View
    {
        return view('backend.users.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $this->userRepository->create($request,$request->validated());
        return to_route('backend.users.index')->withSuccess('əlave etdiniz');
    }

    public function edit(string $id): View
    {
        $user = $this->userRepository->find($id);
        return view('backend.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, string $id): RedirectResponse
    {
        $this->userRepository->update($id, $request->validated());
        return redirect()->route('backend.users.index')->withSuccess('yeniləmə etdiniz');
    }

    public function destroy(string $id): JsonResponse
    {
        $this->userRepository->delete($id);
        return response()->json(['success'=>'1'],200);
    }


}
