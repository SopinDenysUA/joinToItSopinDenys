@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Сотрудники</h1>
        <table class="datatable table table-bordered">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Компания</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Действия</th>
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
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Редактировать</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
