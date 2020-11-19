<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;

class EmployeeController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!auth()->guard('admin')->attempt($credentials)) {
            return redirect()->back()->withInput()
                ->withErrors(['message' => 'Your email or password is incorrect. Please try again.']);
        }

        // Authentication passed...
        return redirect()->intended('dashboard');
    }

    /**
     * @return RedirectResponse
     */
    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
