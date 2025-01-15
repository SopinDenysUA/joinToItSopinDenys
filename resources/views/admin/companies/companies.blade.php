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
            <h1><strong>Список Компаній</strong></h1>
            <a href="{{ route('companies.create') }}" class="btn btn-success btn-ls shadow-sm">
                <i class="fas fa-user-plus"></i> Додати Компанію
            </a>
        </div>
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
                    <td>
                        <a href="{{ route('companies.show', $company->id) }}" class="text-decoration-none">
                            <strong>{{ $company->name }}</strong>
                        </a>
                    </td>
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
                        <a href="{{ route('companies.show', $company->id) }}" class="btn btn-info"><i class="fas fa-eye"></i> Переглянути</a>
                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Редагувати</a>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
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
