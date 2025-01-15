@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Співробітники</h1>
        <a href="{{ route('employees.create') }}" class="nav-link">
            <p><strong>Додати співробітника</strong></p>
        </a>
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
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->company->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Редагування</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Видалити</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
