<!DOCTYPE html>
<html>
<head>
    <title>Нова компанія створена</title>
</head>
<body>
<h1>Нова компанія створена!</h1>
<p><strong>Назва:</strong> {{ $company->name }}</p>
<p><strong>Email:</strong> {{ $company->email ?? 'Не вказано' }}</p>
<p><strong>Веб-сайт:</strong> {{ $company->website ?? 'Не вказано' }}</p>
<p><strong>Лого:</strong>
    @if($company->logo)
        <img src="{{ asset('storage/' . $company->logo) }}" alt="Лого" style="max-height: 100px;">
    @else
        Не завантажено
    @endif
</p>
</body>
</html>
