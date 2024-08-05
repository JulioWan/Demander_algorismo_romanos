<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conversor para algorismo Romano</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body class="body">
    <div class="container mt-5">
        <div class="form-container">
            <h1 class="text-center">Conversor de Números para Algarismos Romanos</h1>
            <form action="/" method="POST" class="mt-4">
                @csrf <!-- o laravel exige esse token para requisições POST -->
        
                <div class="mb-3">
                    <label class="form-label">Número a ser convertido:</label>
                    <input type="number" name="numbers" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Algarismo Romano:</label>
                    @if (!$res)
                        <input type="text" class="form-control" value="" readonly>
                    @elseif ($res)
                        <input type="text" class="form-control" value="{{ $res }}" readonly>
                    @endif
                </div>
        
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Converter</button>
                </div>
            </form>
        </div>
        
</body>
</html>
