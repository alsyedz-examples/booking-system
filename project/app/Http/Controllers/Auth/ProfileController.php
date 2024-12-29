<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProfileRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show(): Factory|View
    {
        return view('profile');
    }

    /**
     * Display a listing of the resource.
     */
    public function update(ProfileRequest $request): Factory|View
    {
        /** @var User $user */
        $user = Auth::user();

        $user->update($request->validated());

        return view('profile');
    }
}
