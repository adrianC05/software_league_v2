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

        h1 {
            font-size: 40px;
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

        <h1 class="text-center">{{ $title }}</h1>
        <!-- Total de equipos -->
        <br>
        <p class="">Total de equipos: {{ $totalTeams }}</p>
        <!-- Total de equipos habilitados -->
        <p class="">Total de equipos habilitados: {{ $totalTeamsEnabled }}</p>
        <!-- Total de equipos inhabilitados -->
        <p class="">Total de equipos inhabilitados: {{ $totalTeamsDisabled }}</p>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Enrollment</th>
                    <th scope="col">Status</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->enrollment }}</td>
                        <!-- Si el status es 1, se mostrará "Active", de lo contrario, "Inactive" -->
                        <td>{{ $team->status == 1 ? 'Habilitado' : 'Inhabilitado' }}</td>
                        <td>{{ $team->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <footer class="fixed-bottom">
        <div class="container">
            <p class="text-center font-light small">Fecha de impresión: {{ $date }}</p>
        </div>
    </footer>
</body>

</html>
