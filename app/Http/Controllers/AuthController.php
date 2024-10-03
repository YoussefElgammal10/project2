<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Manager; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public $test = "TEST"; 

    public function login() {
        return view('auth.login'); 
    }

    public function loginAction(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email|exists:managers,email', 
            'password' => ['required', 'min:6', 'alpha_num'] 
        ]);

        $manager = Manager::where('email', $validated['email'])->first(); 
        if (Hash::check($validated['password'], $manager->password)) { 
            Auth::login($manager); 
            return redirect()->route('index'); 
        }
        return back()->withInput($validated) 
            ->withErrors(['password' => 'كلمة المرور خاطئة']); 
    }

    public function register() {
        return view('auth.register'); 
    }

    public function registerAction(RegisterRequest $request) {
        $validated = $request->validated(); 
        $validated['password'] = Hash::make($request->password); 
        $manager = Manager::create($validated); 
        auth()->login($manager); 
        return redirect()->route('index')->with('success', 'تم تسجيل المدير بنجاح'); 
    }

    public function logout() {
        auth()->logout(); 
        return redirect()->route('login'); 
    }
}
