@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ isset($employee) ? 'Edit Employee' : 'Create Employee' }}</h1>
        <form
            action="{{ isset($employee) ? route('employees.update', $employee->id) : route('employees.store') }}"
            method="POST"
        >
            @csrf
            @if(isset($employee))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="first_name" class="form-label">Ім'я</label>
                <input
                    type="text"
                    class="form-control"
                    id="first_name"
                    name="first_name"
                    value="{{ old('first_name', $employee->first_name ?? '') }}"
                    required
                >
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Прізвище</label>
                <input
                    type="text"
                    class="form-control"
                    id="last_name"
                    name="last_name"
                    value="{{ old('last_name', $employee->last_name ?? '') }}"
                    required
                >
            </div>
            <div class="mb-3">
                <label for="company_id" class="form-label">Компанія</label>
                <select
                    class="form-select"
                    id="company_id"
                    name="company_id"
                    required
                >
                    <option value="">Вибір компанії</option>
                    @foreach($companies as $company)
                        <option
                            value="{{ $company->id }}"
                            {{ isset($employee) && $employee->company_id == $company->id ? 'selected' : '' }}
                        >
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    value="{{ old('email', $employee->email ?? '') }}"
                >
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Телефон</label>
                <input
                    type="text"
                    class="form-control"
                    id="phone"
                    name="phone"
                    value="{{ old('phone', $employee->phone ?? '') }}"
                >
            </div>
            <button type="submit" class="btn btn-success">{{ isset($employee) ? 'Обновити' : 'Створити' }}</button>
        </form>
    </div>
@endsection
