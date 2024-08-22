<!-- resources/views/lead/index.blade.php -->
@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="alert">
        {{ session('success') }}
    </div>
@endif
<div class="container max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Список лидов</h1>
    <div class="flex mb-6 gap-2 flex-wrap">
        <div class="w-[150px] bg-blue-100 text-blue-800 px-4 py-2 rounded-lg shadow-sm">
            <p class="text-lg font-semibold">Новые</p>
            <p id="new-leads-count" class="text-2xl font-bold">{{ $newLeadsCount }}</p>
        </div>
        <div class="w-[150px] bg-yellow-100 text-yellow-800 px-4 py-2 rounded-lg shadow-sm">
            <p class="text-lg font-semibold">В&nbsp;работе</p>
            <p id="in-progress-leads-count" class="text-2xl font-bold">{{ $inProgressLeadsCount }}</p>
        </div>
        <div class="w-[150px] bg-green-100 text-green-800 px-4 py-2 rounded-lg shadow-sm">
            <p class="text-lg font-semibold">Завершен</p>
            <p id="completed-leads-count" class="text-2xl font-bold">{{ $completedLeadsCount }}</p>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-4 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Имя</th>
                    <th class="px-4 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Фамилия</th>
                    <th class="px-4 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-4 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Номер телефона</th>
                    <th class="px-4 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Дата создания</th>
                    <th class="px-4 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Статус</th>
                    <th class="px-4 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Действия</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($leads as $lead)
                    <tr>
                        <td class="px-4 py-4 whitespace-nowrap border-b text-sm text-gray-900">{{ $lead->id }}</td>
                        <td class="px-4 py-4 whitespace-nowrap border-b text-sm text-gray-900">{{ $lead->first_name }}</td>
                        <td class="px-4 py-4 whitespace-nowrap border-b text-sm text-gray-900">{{ $lead->last_name }}</td>
                        <td class="px-4 py-4 whitespace-nowrap border-b text-sm text-gray-900">{{ $lead->email }}</td>
                        <td class="px-4 py-4 whitespace-nowrap border-b text-sm text-gray-900">{{ $lead->phone }}</td>
                        <td class="px-4 py-4 whitespace-nowrap border-b text-sm text-gray-900">{{ $lead->created_at->format('d.m.Y H:i') }}</td>
                        <td class="px-4 py-4 whitespace-nowrap border-b text-sm text-gray-900">
                            <form action="{{ route('lead.updateStatus', $lead->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="{{ $lead->id }}">
                                <select name="status_id" class="rounded-md" onchange="this.form.submit()">
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" {{ $lead->status_id == $status->id ? 'selected' : '' }}>
                                            {{ $status->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap border-b text-sm text-gray-900">
                            <a href="{{ route('leads.edit', $lead->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-xs font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400">Редактировать</a>
                            <form action="{{ route('leads.destroy', $lead->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-4 py-2 mt-2 border border-transparent text-xs font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
