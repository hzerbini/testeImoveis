<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8FGH9K9807"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-8FGH9K9807');
    </script>
</head>
<body>
    <div class="container mx-auto">
        <div class="bg-gray-200 rounded-md my-2 p-2">
            <h3><strong>Titulo:</strong> {{ $property->title }}</h3>
            <div>
                <span><strong>Estado:</strong> {{ $property->state }} </span>
                <span><strong>Cidade:</strong> {{ $property->city }} </span>
                <span> Bairro: {{ $property->neighborhood }}</span>
            </div>
            <div>
                <span class="rounded bg-blue-300 rounded-full"> {{ $property->transaction_type }}</span>
                <span class="rounded bg-red-300 rounded-full"> {{ $property->type }}</span>
            </div>
            <span><strong>Preço:</strong> {{ number_format($property->price, 2, ',', '.') }}R$</span>
        </div>
    </div>
</body>
</html>