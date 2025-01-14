@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Компании</h1>
        <table class="datatable table table-bordered">
            <thead>
            <tr>
                <th>Название</th>
                <th>Email</th>
                <th>Сайт</th>
                <th>Логотип</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->website }}</td>
                    <td><img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="100"></td>
                    <td>
                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Редактировать</a>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
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
