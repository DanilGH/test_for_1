<?php


namespace App\Http\Controllers\User;

use App\Domains\User\UserEntity;
use App\Domains\User\UserService;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use RedirectsUsers;
    /**
     * @var UserService
     */
    private $userService;

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->middleware('guest');
        $this->userService = $userService;
    }

    /**
     * Регистрация пользователя
     *
     * @param RegisterRequest $registerRequest
     * @return RedirectResponse|Redirector
     */
    public function register(RegisterRequest $registerRequest)
    {
        $userEntity = new UserEntity();
        $userEntity
            ->setEmail($registerRequest->get('email'))
            ->setName($registerRequest->get('name'))
            ->setPassword($registerRequest->get('password'));

        $user = $this->userService->registration($userEntity);

        $this->guard()->login($user);

        return redirect($this->redirectPath());
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
