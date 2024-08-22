<!-- resources/views/lead/form.blade.php -->
@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="alert">
        {{ session('success') }}
    </div>
@endif
<div class="alert-error"></div>
<div class=" container max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Оставить заявку</h1>
    <form action="{{ route('lead.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="first_name" class="block text-sm font-medium text-gray-700">Имя</label>
            <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="first_name" name="first_name" required>
        </div>
        <div>
            <label for="last_name" class="block text-sm font-medium text-gray-700">Фамилия</label>
            <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="last_name" name="last_name" required>
        </div>
        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Номер телефона</label>
            <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="phone" name="phone" required>
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
            <input type="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="email" name="email" required>
        </div>
        <div>
            <label for="message" class="block text-sm font-medium text-gray-700">Текст обращения</label>
            <textarea class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="message" name="message" rows="5" required></textarea>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Отправить</button>
        </div>
    </form>
</div>
@endsection
