<!-- resources/views/lead/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Создать лид</h1>
    <form action="{{ route('leads.store') }}" method="POST">
        @csrf
        <!-- Поля формы аналогичны форме редактирования -->
        <div class="mb-3">
            <label for="first_name" class="form-label">Имя</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>
        <!-- Добавьте остальные поля аналогично -->
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
@endsection
