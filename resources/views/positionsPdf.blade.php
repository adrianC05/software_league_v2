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
    <div class="">

        <div class="text-center p-3">
            <!-- Logo de la ESPE -->
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Logo_ESPEOk.png/250px-Logo_ESPEOk.png"
                alt="Logo ESPE" class="mb-3 img-espe rounded float-left">
            <!-- Logo del proyecto -->
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-WeYvDLfMleMomRRM96IhTnLKyaHVpdlgbxIFAMFkQHXlo7dS72-Phikg4XuEKx3u2w&usqp=CAU"
                alt="Logo Proyecto" class="mb-3 img-proyecto rounded float-right">
        </div>
        <br>
        <br>
        <br>
        <hr>

        <h1 class="text-center">{{ $title }}</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Equipo</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">PJ</th>
                    <th scope="col">PG</th>
                    <th scope="col">PE</th>
                    <th scope="col">PP</th>
                    <th scope="col">GF</th>
                    <th scope="col">GC</th>
                    <th scope="col">GD</th>
                    <th scope="col">PTS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($league_tables as $league_table)
                    <tr>
                        <td>{{ $league_table->team->name }}</td>
                        <td>{{ $league_table->team->groups->first()->name }}</td>
                        <td>{{ $league_table->matches_played }}</td>
                        <td>{{ $league_table->won }}</td>
                        <td>{{ $league_table->drawn }}</td>
                        <td>{{ $league_table->lost }}</td>
                        <td>{{ $league_table->goals_for }}</td>
                        <td>{{ $league_table->goals_against }}</td>
                        <td>{{ $league_table->goals_difference }}</td>
                        <td>{{ $league_table->points }}</td>
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
