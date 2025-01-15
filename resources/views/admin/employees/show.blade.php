@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Перегляд Співробітника</h1>
        <div class="mb-3">
            <label for="first_name" class="form-label">Ім'я</label>
            <input type="text" id="first_name" class="form-control" value="{{ $employee->first_name }}" readonly>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Прізвище</label>
            <input type="text" id="last_name" class="form-control" value="{{ $employee->last_name }}" readonly>
        </div>
        <div class="mb-3">
            <label for="company_id" class="form-label">Компанія</label>
            <input type="text" id="company_id" class="form-control" value="{{ $employee->company->name ?? 'Компанія не вказана' }}" readonly>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" value="{{ $employee->email }}" readonly>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Телефон</label>
            <input type="text" id="phone" class="form-control" value="{{ $employee->phone }}" readonly>
        </div>
        <div class="mt-3">
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Редагувати</a>
            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Ви впевнені, що хочете видалити цього співробітника?')">
                    <i class="fas fa-trash"></i> Видалити
                </button>
            </form>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Повернутись до списку</a>
        </div>
    </div>
@endsection
