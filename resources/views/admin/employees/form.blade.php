@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ isset($employee) ? 'Редагування Співробітника' : 'Створення Співробітника' }}</h1>
        <form action="{{ isset($employee) ? route('employees.update', $employee->id) : route('employees.store') }}" method="POST">
            @csrf
            @if(isset($employee))
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="first_name" class="form-label">Ім'я</label>
                <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                       value="{{ old('first_name', $employee->first_name ?? '') }}" required>
                @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Прізвище</label>
                <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                       value="{{ old('last_name', $employee->last_name ?? '') }}" required>
                @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="company_id" class="form-label">Компанія</label>
                <select id="company_id" name="company_id" class="form-select @error('company_id') is-invalid @enderror">
                    <option value="">Вибір компанії</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" {{ isset($employee) && $employee->company_id == $company->id ? 'selected' : '' }}>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
                @error('company_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email', $employee->email ?? '') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Телефон</label>
                <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"
                       value="{{ old('phone', $employee->phone ?? '') }}">
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">@if(isset($employee))<i class="fas fa-refresh"></i>@else<i class="fas fa-plus"></i>@endif
                {{ isset($employee) ? ' Обновити' : ' Створити' }}
            </button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Відміна</a>
        </form>
    </div>
@endsection
