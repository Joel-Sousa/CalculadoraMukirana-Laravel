<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <title>Mukirana</title>
    <style>
        body {
            background-color: #444444;
            color: #fff
        }

        .title {
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 20px;
            padding:0;
            margin:0;
        }
    </style>
</head>

<body>
    <br>
    <br>
    <div class="title">
        Calculadora do Mukirana
    </div>
    <form action="/" method="POST">
        @csrf
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Valor do Iten R$</label>
                    <input class="form-control" name="valor1" style='background-color: gray' type="number"
                        step="any" placeholder="15,50" aria-label="default input example"
                        value="{{ old('valor1') }}" required>
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Quantidade em g/ml</label>
                    <input class="form-control" name="valor2" style='background-color: gray' type="number"
                        step="any" placeholder="290 ml" aria-label="default input example"
                        value="{{ old('valor2') }}" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Quantidade de itens da soma</label>
                    <input class="form-control" name="valor3" style='background-color: gray' type="number"
                        step="any" placeholder="5" aria-label="default input example" value="{{ old('valor3') }}">
                </div>
                <div class="col mt-5">
                        <button type="submit" class="btn btn-success">Calcular</button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="col mt-2 mr-6">
                        {{-- <button type="submit" class="btn btn-success">Calcular</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="/limpar" method="POST" class="mt-2">
        @csrf
        <button type="submit" class="btn btn-outline-danger btn-sm w-100">Limpar Histórico</button>
    </form>
    <br>
    <div class="col-md-12">
        <ul class="list-group">
            <h5 class="list-group-item text-muted">Histórico de Resultados</h5>
            @if (session('historico'))
                @foreach (array_reverse(session('historico')) as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {!! $item !!}
                    </li>
                @endforeach
            @else
                <li class="list-group-item text-muted">Nenhum cálculo realizado ainda.</li>
            @endif
        </ul>
    </div>
</body>

</html>
