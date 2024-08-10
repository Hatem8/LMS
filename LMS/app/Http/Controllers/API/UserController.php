<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Traits\ApiResponseTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiResponseTrait;
    public function index()
    {
        $users = User::all();
        return $this->sendResponse('Retrieved Successfully',$users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $request ->validated();
        $request['password'] = Hash::make($request['password']);
        $user = User::create($request->all());
        return $this->sendResponse('Created Successfully',$user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $this->sendResponse('Retrieved Successfully',$user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|min:8',
            'role' => 'required|string',
            'remember_token' => 'nullable|boolean',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);
        $request['password'] = Hash::make($request['password']);
        $user->update($request->all());
        return $this->sendResponse('Updated Successfully',$user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return $this->sendResponse('Deleted Successfully');
    }
}
