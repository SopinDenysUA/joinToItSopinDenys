@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Інформація про Компанію</h1>
        <div class="card">
            <div class="card-header">
                <strong>{{ $company->name }}</strong>
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> {{ $company->email ?? 'Не вказано' }}</p>
                <p><strong>Веб-сайт:</strong>
                    @if($company->website)
                        <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                    @else
                        Не вказано
                    @endif
                </p>
                <p><strong>Логотип:</strong></p>
                @if($company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" style="max-height: 150px;">
                @else
                    <p>Логотип не завантажено</p>
                @endif
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Редагувати</a>
            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Ви впевнені, що хочете видалити цю компанію?')">
                    <i class="fas fa-trash"></i> Видалити
                </button>
            </form>
            <a href="{{ route('companies.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Повернутись до списку</a>
        </div>
    </div>
@endsection
