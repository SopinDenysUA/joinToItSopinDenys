@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ isset($company) ? 'Редагування Компанії' : 'Створення Компанії' }}</h1>
        <form action="{{ isset($company) ? route('companies.update', $company) : route('companies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($company))
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="name" class="form-label">Назва <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $company->name ?? '') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email', $company->email ?? '') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="logo" class="form-label">Лого (Мінімум: 100x100)</label>
                @if(isset($company) && $company->logo)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" style="max-height: 100px;">
                    </div>
                @endif
                    <input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror">
                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="website" class="form-label">Веб-сайт</label>
                <input type="url" name="website" id="website" class="form-control @error('website') is-invalid @enderror"
                       value="{{ old('website', $company->website ?? '') }}">
                @error('website')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">@if(isset($company))<i class="fas fa-refresh"></i>@else<i class="fas fa-plus"></i>@endif
                {{ isset($company) ? ' Оновити' : ' Створити' }}
            </button>
            <a href="{{ route('companies.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Відміна</a>
        </form>
    </div>
@endsection
