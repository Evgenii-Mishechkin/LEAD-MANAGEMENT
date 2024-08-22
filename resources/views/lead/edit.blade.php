<!-- resources/views/lead/edit.blade.php -->
@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="alert">
        {{ session('success') }}
    </div>
@endif
<div class=" container max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Редактировать пользователя</h1>
        <a href="{{ route('lead.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
            Назад
        </a>
    </div>
    <form id="edit-lead-form" action="{{ route('leads.update', $lead->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PATCH')
        <div>
            <label for="first_name" class="block text-sm font-medium text-gray-700">Имя</label>
            <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="first_name" name="first_name" value="{{ $lead->first_name }}" required>
        </div>
        <div>
            <label for="last_name" class="block text-sm font-medium text-gray-700">Фамилия</label>
            <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="last_name" name="last_name" value="{{ $lead->last_name }}" required>
        </div>
        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Номер телефона</label>
            <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="phone" name="phone" value="{{ $lead->phone }}" required>
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
            <input type="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="email" name="email" value="{{ $lead->email }}" required>
        </div>
        <div>
            <label for="message" class="block text-sm font-medium text-gray-700">Текст обращения</label>
            <textarea class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="message" name="message" rows="5" required>{{ $lead->message }}</textarea>
        </div>
        <div>
            <label for="status_id" class="block text-sm font-medium text-gray-700">Статус</label>
            <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="status_id" name="status_id">
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" {{ $lead->status_id == $status->id ? 'selected' : '' }}>
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-end">
            <button type="submit" id="save-button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" disabled>Сохранить</button>
        </div>
    </form>
</div>

@endsection
