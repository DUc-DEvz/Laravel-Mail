<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        try {
            $this->userRepository->create($request->validated());

            return redirect()->route('login.form')
                ->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Đã xảy ra lỗi trong quá trình xử lý. Vui lòng thử lại sau.' . $e->getMessage());
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated(), $request->has('remember'))) {
            return back()
                ->onlyInput('email')
                ->with('error', 'Thông tin đăng nhập không chính xác.');
        }

        $request->session()->regenerate();

        return redirect()->intended('home')
            ->with('success', 'Đăng nhập thành công!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')
            ->with('success', 'Đăng xuất thành công!');
    }
}
