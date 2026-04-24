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
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>
    <br>
    <br>
    <div class="title">
        Calculadora do Mukirana
    </div>
    <form action="/" method="POST" id="meuForm">
        @csrf
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Valor do Iten R$</label>
                    <input class="form-control" name="valor1" style='background-color: gray' step="any"
                        placeholder="15,50" aria-label="default input example" value="{{ old('valor1') }}" required
                        oninput="formatarMoeda(this)" type="text" inputmode="decimal">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Quantidade em g/ml</label>
                    <input class="form-control" name="valor2" style='background-color: gray' type="number"
                        step="any" placeholder="290 ml" aria-label="default input example"
                        value="{{ old('valor2') }}" required inputmode="decimal">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Quantidade de itens da soma</label>
                    <input class="form-control" name="valor3" style='background-color: gray' type="number"
                        step="any" placeholder="5" aria-label="default input example" value="{{ old('valor3') }}"
                        inputmode="decimal">
                </div>
                <div class="col mt-5">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                            name="valor4">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Unidade</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="col mt-2 mr-6">
                        <button type="button" class="btn btn-secondary" onclick="forcarLimpeza('meuForm')">Limpar</button>
                        <button type="submit" class="btn btn-success">Calcular</button>
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
    <script>
        function formatarMoeda(input) {
            let valor = input.value;

            valor = valor.replace(/\D/g, "");

            // 2. Se o campo estiver vazio, não faz nada
            if (valor === "") {
                input.value = "";
                return;
            }

            // 3. Transforma em número e divide por 100 para fixar as duas casas decimais
            // Usamos 'pt-BR' para garantir que o separador seja a vírgula
            const resultado = (parseFloat(valor) / 100).toLocaleString('pt-BR', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            input.value = resultado;
        }

        function forcarLimpeza(idFormulario) {
            const form = document.getElementById(idFormulario);

            // 1. Limpa todos os Inputs (text, number, password, etc)
            const inputs = form.querySelectorAll('input');
            inputs.forEach(input => {
                input.value = '';
            });
        }
    </script>
</body>

</html>
