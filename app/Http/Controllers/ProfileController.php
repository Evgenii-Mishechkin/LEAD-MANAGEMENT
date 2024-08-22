<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    // Показать профиль
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    // Обновить профиль
    public function update(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        // Проверяем, изменился ли email
        if ($validatedData['email'] !== $user->email) {
            // Сбрасываем верификацию
            $user->email_verified_at = null;
            // Обновляем email и отправляем письмо с подтверждением
            $user->update($validatedData);
            $user->sendEmailVerificationNotification();

            return redirect()->route('profile.edit')->with('status', 'Профиль обновлён. Пожалуйста, подтвердите ваш новый email.');
        }

        // Если email не изменился, просто обновляем профиль
        $user->update($validatedData);

        return redirect()->route('profile.edit')->with('status', 'Профиль обновлён');
    }

    // Обновить пароль
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->with('error', 'Текущий пароль неверен');
        }

        if (Hash::check($request->password, Auth::user()->password)) {
            return back()->with('error', 'Новый пароль не может совпадать с текущим');
        }

        Auth::user()->update(['password' => Hash::make($request->password)]);

        return back()->with('status', 'Пароль успешно обновлен.');
    }

    // Повторная отправка письма подтверждения
    public function resendVerification()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return back()->with('status', 'Ваш адрес электронной почты уже подтвержден.');
        }

        Auth::user()->sendEmailVerificationNotification();

        return back()->with('status', 'Письмо для подтверждения отправлено.');
    }
}
