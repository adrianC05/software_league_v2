<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Teams PDF</title>
    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .img-proyecto {
            width: 400px;
        }

        .img-espe {
            width: 100px;
        }

        h3 {
            font-size: 30px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="text-center p-3">
            <!-- Logo de la ESPE -->
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Logo_ESPEOk.png/250px-Logo_ESPEOk.png"
                alt="Logo ESPE" class="mb-3 img-espe rounded float-left">
            <!-- Logo del proyecto -->
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-WeYvDLfMleMomRRM96IhTnLKyaHVpdlgbxIFAMFkQHXlo7dS72-Phikg4XuEKx3u2w&usqp=CAU"
                alt="Logo Proyecto" class="mb-3 img-proyecto rounded float-right">
        </div>
        <hr>
        <br>
        <br>
        <hr>

        <h3 class="text-center">{{ $titleRevenue }}</h3>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($revenues as $revenue)
                    <tr>
                        <td>{{ $revenue->description }}</td>
                        <td>$ {{ $revenue->value }}</td>
                        <td>{{ $revenue->date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3 class="text-center">{{ $titleExpense }}</h3>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expenses as $expense)
                    <tr>
                        <td>{{ $expense->description }}</td>
                        <td>$ {{ $expense->value }}</td>
                        <td>{{ $expense->date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total de gastos e ingresos -->
        <br>

        <p class="">Total de ingresos: ${{ $totalRevenues }}</p>
        <p class="">Total de gastos: ${{ $totalExpenses }}</p>
        <!-- Balance -->
        <p class="">Balance: ${{ $balance }}</p>
    </div>

    <footer class="fixed-bottom">
        <div class="container">
            <p class="text-center font-light small">Fecha de impresión: {{ $date }}</p>
        </div>
    </footer>
</body>

</html>
