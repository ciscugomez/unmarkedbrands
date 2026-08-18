<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Intervention;
use App\Models\Account;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $accounts = Account::all();
        return view('auth.register', compact('accounts'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'brand_name'    => 'required|string|max:255',
            'name'          => ['required', 'string', 'max:255'],
            'surname'       => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password'      => ['required', 'confirmed', Rules\Password::defaults()],
            'type'          => 'required|in:freelance,agency',
        ]);

        $nickname = $this->generateNickname($request->brand_name);

        $agency = Account::create([
            'nickname'      => $nickname,
            'type'          => $request->type,
            'name'          => $request->brand_name,
        ]);

        $user = User::create([
            'name'          => $request->name,
            'surname'       => $request->surname,
            'email'         => $request->email,
            'image'         => Intervention::generateRandomImage(),
            'password'      => Hash::make($request->password),
            'account_id'    => $agency->id,
        ]);


        Auth::login($user);
        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }

    public function generateNickname($brand_name)
    {
        // Limpiar el brand_name para asegurar que solo tenga caracteres válidos
        $cleanedBrandName   = preg_replace('/[^a-z0-9]/', '', strtolower($brand_name));
        $account            = Account::where('nickname', $cleanedBrandName)->first();
        $count              = 0;

        do {
            $nickname = $cleanedBrandName . rand(0, 1000);
            $account = Account::where('nickname', $nickname)->first();
            $count++;
        } while ($account && $count < 1000); // Evitar bucle infinito por precaución

        return $nickname;
    }

}
