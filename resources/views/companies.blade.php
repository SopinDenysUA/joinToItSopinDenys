@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Компанії</h1>
        <a href="{{ route('companies.create') }}" class="nav-link">
            <p><strong>Додати компанію</strong></p>
        </a>
        <table class="datatable table table-bordered">
            <thead>
            <tr>
                <th>Назва</th>
                <th>Email</th>
                <th>Сайт</th>
                <th>Логотип</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->website }}</td>
                    <td>
                        @if($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Логотип" style="width: 100px; height: auto;">
                        @else
                            <span>Лого</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Редагувати</a>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
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
