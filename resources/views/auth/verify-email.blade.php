@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="text-xl font-semibold mb-6">{{ __('Подтвердите ваш email адрес') }}</div>

                @if (session('resent'))
                    <div class="bg-green-500 text-white p-4 rounded-lg shadow-md mb-6">
                        {{ __('Новое письмо с подтверждением отправлено на ваш email адрес.') }}
                    </div>
                @endif

                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Прежде чем продолжить, пожалуйста, проверьте ваш email для подтверждения.') }}
                    {{ __('Если вы не получили письмо') }},
                </div>

                <form class="d-inline" method="POST" action="{{ route('profile.verification.resend') }}">
                    @csrf
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('нажмите здесь, чтобы запросить повторное письмо') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

