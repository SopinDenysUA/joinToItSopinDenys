@extends('layouts.admin')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4 class="m-0">{{ session('success') }}</h4>
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1><strong>Список Співробітників</strong></h1>
            <a href="{{ route('employees.create') }}" class="btn btn-success btn-ls shadow-sm">
                <i class="fas fa-user-plus"></i> Додати Співробітника
            </a>
        </div>
        <table class="datatable table table-bordered">
            <thead>
            <tr>
                <th>Ім'я</th>
                <th>Прізвище</th>
                <th>Компанія</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>
                        <a href="{{ route('employees.show', $employee->id) }}" class="text-decoration-none">
                            <strong>{{ $employee->first_name }}</strong>
                        </a>
                    </td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->company->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>
                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info"><i class="fas fa-eye"></i> Переглянути</a>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Редагування</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Видалити</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
