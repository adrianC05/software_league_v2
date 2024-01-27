<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Software League</title>
    <link rel="icon" href="Imagenes/icono.png" type="image/png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    <div class="[background:radial-gradient(125%_125%_at_50%_10%,#000_40%,#63e_100%)]" <div
        class="absolute inset-0 z-10 h-full w-full items-center px-5">
        <!---------------------------Barra de Opciones------------------------->
        <div class="z-10  text-center  w-full p-1 flex justify-center items-center">
            <div class="flex items-center ">
                <!-- Logo -->
                <div class=" flex-shrink-0">
                    <img src="{{ asset('Imagenes/logo1.jpg') }}" alt="Descripción"
                        class="rounded-md p-6 font-semibold text-white hover:text-red-900">
                </div>
                <!-- Opciones de menú -->
                <div class="flex justify-end items-center space-x-10
                ">
                    <a href="{{ url('/espe') }}" class="p-6 font-semibold text-white hover:text-red-900">
                        Iniciar Sesión
                    </a>
                    <a href="#reglamentario" class="p-6 font-semibold text-white hover:text-red-900">
                        Reglamento
                    </a>
                    <a href="#ubicacion" class="p-6 font-semibold text-white hover:text-red-900">
                        Ubicación
                    </a>
                    <a href="{{ url('/descargar1-pdf') }}" class="p-6 font-semibold text-white hover:text-red-900">
                        Plantilla de Inscripcion
                    </a>
                </div>
            </div>
        </div>

        <div class=" max-w-7xl mx-auto p-6  ">
            <!-- Imagen -->
            <div class="p-6 flex justify-center items-center">
                <img src="{{ asset('Imagenes/intro.jpeg') }}" alt="Descripción" class="rounded-md">
            </div>

            <div class="mt-20 flex justify-center items-center">
                <div class="">
                    <!---------------Primera tabla--------------------------->
                    <div
                        class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01]">
                        <div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 flex justify-center items-center ">TABLA
                                DE POSICIONES</h2>
                            <!-- Bloque para mostrar la tabla de posiciones -->
                            <table class="content-table ">
                                <thead>
                                    <tr>
                                        <th>Equipo</th>
                                        <th>Partidos Jugados</th>
                                        <th>Ganados</th>
                                        <th>Empatados</th>
                                        <th> Perdidos</th>
                                        <th>Goles a favor</th>
                                        <th>Goles en contra</th>
                                        <th>Diferencia de goles</th>
                                        <th>Puntos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($resultados as $resultado)
                                    <tr>
                                        <td>{{ $resultado->team->name }}</td>
                                        <!-- Agrega más celdas según las necesidades -->
                                        <td>{{ $resultado->matches_played }}
                                        </td>
                                        <td>{{ $resultado->won }}</td>
                                        <td>{{ $resultado->drawn }}</td>
                                        <td>{{ $resultado->lost }}</td>
                                        <td>{{ $resultado->goals_for }}</td>
                                        <td>{{ $resultado->goals_against }}</td>
                                        <td>{{ $resultado->goals_difference }}
                                        </td>
                                        <td>{{ $resultado->points }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <!---------------Segunda tabla--------------------------->
                        <div
                            class="  justify-center items-center scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01]">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900 flex justify-center items-center">
                                    HORARIOS
                                </h2>

                                <div x-data="imageSlider" x-init="initSlider(@json($vs))"
                                    class="relative mx-auto max-w-2xl overflow-hidden rounded-md mt-6 sm:p-4 "
                                    style="background-image: url('{{ asset('Imagenes/horario.png') }}');">
                                    <div
                                        class="absolute right-5 top-5 z-10 rounded-full bg-gray-600 px-2 text-center text-sm text-white">
                                        <span x-text="currentIndex"></span>/<span x-text="matches.length"></span>
                                    </div>
                                    <button @click="previous()"
                                        class="absolute left-1 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-white shadow-md">
                                        <i class="fas fa-chevron-left text-2xl font-bold text-emerald-500"></i>
                                    </button>
                                    <button @click="forward()"
                                        class="absolute right-1 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-white shadow-md">
                                        <i class="fas fa-chevron-right text-2xl font-bold text-emerald-500"></i>
                                    </button>
                                    <div class="relative h-80 w-80 md:w-96">
                                        @foreach($vs as $vsItem)
                                        <div x-show="currentIndex == {{ $loop->index + 1 }}"
                                            x-transition:enter="transition transform duration-300"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="transition transform duration-300"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                            <div class="match z-20 flex flex-col items-center">
                                                <div class="flags flex">
                                                    <div class="">
                                                        <img src="{{ asset('Imagenes/escudo.jpg') }}"
                                                            alt="Escudo Equipo 1" class="rounded-md w-40 h-40">
                                                        <h4 class="text-white">{{ $vsItem->team2->name }}</h4>
                                                    </div>
                                                    <span class="text-white mx-4 mt-20 "><strong>VS</strong></span>
                                                    <div class="">
                                                        <img src="{{ asset('Imagenes/escudo.jpg') }}"
                                                            alt="Escudo Equipo 2" class="rounded-md w-40 h-40">
                                                        <h4 class="text-white">{{ $vsItem->team1->name }}</h4>
                                                    </div>
                                                </div>
                                                <!-- Agregar la fecha y hora -->
                                                <div class="mt-2">
                                                    <div class="text-white">
                                                        <h4 class=""><strong>Fecha: </strong>{{ $vsItem->date }}</h4>
                                                        <h4 class=""><strong>Hora: </strong>{{ $vsItem->time }}</h4>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <button data-modal-target="static-modal" data-modal-toggle="static-modal"
                                    class="my-4   text-white bg-blue-700 hover:bg-blue-800 focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">
                                    Abrir Horario
                                </button>
                            </div>
                        </div>
                        
                        <!---------------Tercera tabla--------------------------->
                        <div
                            class="flex justify-center items-center  scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01]">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900 flex justify-center items-center">
                                    TOP 7 DE GOLEADORES</h2>
                                <table class="content-table ">
                                    <thead>
                                        <tr>
                                            <th>TOP</th>
                                            <th>Nombre</th>
                                            <th>Goles</th>
                                            <th>Equipo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $rank = 1;
                                        @endphp
                                        @foreach($goleadores->sortByDesc('goals')->take(7) as $goleador)
                                        <tr>
                                            <td>{{ $rank++ }}</td>
                                            <td>
                                                {{ $goleador->player->name }} {{ $goleador->player->lastname }}
                                            </td>
                                            <td>{{ $goleador->goals }}</td>
                                            <td>{{ $goleador->player->team->name }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Nueva sección para el Reglamento -->
            <div id="reglamentario" class="mt-16">
                <h2 class="flex justify-center items-center text-2xl font-semibold text-white mb-4">REGLAMENTO
                    INTERNO DEL CAMPEONATO FUTBOL 7
                    “SOFTWARE LEAGUE 2023”</h2>
                <div
                    class="flex justify-center items-center scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <div>
                        <p class=" text-gray-500 text-sm leading-relaxed flex justify-center items-center">
                            Reglamento que debe cumplir cada persona que participe como jugador, cuerpo técnico y barra
                            de este campeonato.
                        </p>
                        <!-- Detalles del Reglamento -->
                        <div class="max-w-screen-xl mx-auto px-5 bg-white min-h-sceen">
                            <div class="flex flex-col items-center">
                                <!-- Imagen -->
                                <div class="p-6 flex justify-center items-center">
                                    <img src="{{ asset('Imagenes/logo.jpg') }}" alt="Descripción" class="rounded-md">
                                </div>

                                <p class="text-neutral-500 text-xl mt-3">
                                    "Con cada partido, escribimos nuestra historia de superación, trabajo en equipo y
                                    pasión. ¡El fútbol va más allá de la cancha, se juega con el corazón!"
                                </p>
                            </div>
                            <!------------------------------------------------------------------------------------------------------>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                                <!-- Columna 1 -->
                                <div class="py-5 ">
                                    <details class="group">
                                        <summary
                                            class="flex justify-between items-center font-medium cursor-pointer list-none">
                                            <span> A. PLANILLA DE INSCRIPCIÓN:</span>
                                            <span class="transition group-open:rotate-180">
                                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                    <path d="M6 9l6 6 6-6"></path>
                                                </svg>
                                            </span>
                                        </summary>
                                        <div class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                                            <ul class="list-disc pl-6 mt-2">
                                                <li>Cada Equipo debe entregar a la organización la planilla de
                                                    inscripción de acuerdo al
                                                    formato que será socializado a través del grupo de WhatsApp.</li>
                                                <li>Cada jugador debe tener claro conocimiento de este reglamento
                                                    previo
                                                    a su inclusión
                                                    en la Plantilla de Inscripción.</li>
                                            </ul>
                                        </div>
                                    </details>
                                    <!------------------------------------------------------------------------------------------------------>
                                    <details class="group ">
                                        <summary
                                            class="flex justify-between items-center font-medium cursor-pointer list-none">
                                            <span> B. PAGO DE INSCRIPCIÓN:</span>
                                            <span class="transition group-open:rotate-180">
                                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                    <path d="M6 9l6 6 6-6"></path>
                                                </svg>
                                            </span>
                                        </summary>
                                        <div class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                                            <ul class="list-disc pl-6 mt-2">
                                                <li> <strong>VALOR:</strong> $10 dólares americanos de inscripción.
                                                </li>
                                                <li> <strong>Nota 1:</strong> El equipo que incumpla con la
                                                    organización
                                                    en temas de
                                                    pago de inscripción, sanciones, carnés o multas, será suspendido
                                                    automáticamente del
                                                    campeonato.</li>
                                                <li> <strong>Nota 2:</strong> Puede realizar el pago de inscripción
                                                    mediante
                                                    transferencia y enviar el comprobante de pago con la planilla de
                                                    inscripción al
                                                    siguiente contacto.</li>
                                                <!---------NUMERO DE CUENTA PARA PAGO DE INSCRIPCION--------------------------------------------------------------------------------->
                                                <div class=" flex items-center justify-center">
                                                    <div class="p-4 bg-black bg-opacity-5 text-black rounded-md">
                                                        <!-- Aquí puedes agregar el texto que desees -->
                                                        <strong>Banco Pichincha Ahorros<br>
                                                            Nombre: Mosquera Claudio Omar Eduardo <br>
                                                            # 2208313302<br>
                                                            C.I: 0503973562</strong>
                                                    </div>
                                                </div>
                                                <li> <strong>Nota 3:</strong> Pueden realizar el pago directamente
                                                    con
                                                    los estudiantes
                                                    Eduardo Mosquera o Mario
                                                    Andrade de la Carrera de Software en el Campus Gral. Guillermo
                                                    Rodríguez Lara.</li>
                                            </ul>
                                        </div>
                                    </details>
                                    <!------------------------------------------------------------------------------------------------------>
                                    <details class="group ">
                                        <summary
                                            class="flex justify-between items-center font-medium cursor-pointer list-none">
                                            <span> C. CARNET OFICIAL:</span>
                                            <span class="transition group-open:rotate-180">
                                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                    <path d="M6 9l6 6 6-6"></path>
                                                </svg>
                                            </span>
                                        </summary>
                                        <div class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                                            <ul class="list-disc pl-6 mt-2">
                                                <li> Todo jugador debe tener su carnet oficial de la organización
                                                    para
                                                    su participación
                                                    en el evento deportivo, el mismo que tendrá el valor de 0.50
                                                    centavos de dólar, el
                                                    cual deberá estar
                                                    emplasticado y llenado correctamente caso contrario no se le
                                                    permitirá su
                                                    participación.</li>
                                            </ul>
                                        </div>
                                    </details>
                                    <details class="group">
                                        <summary
                                            class="flex justify-between items-center font-medium cursor-pointer list-none">
                                            <span> D. SEDE:</span>
                                            <span class="transition group-open:rotate-180">
                                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                    <path d="M6 9l6 6 6-6"></path>
                                                </svg>
                                            </span>
                                        </summary>
                                        <div class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                                            <ul class="list-disc pl-6 mt-2">
                                                <li>Podrán Participar en el Torneo todos los estudiantes que
                                                    pertenezcan
                                                    a la Carrera de
                                                    Software y
                                                    se encuentren matriculados en el periodo académico actual
                                                    202251,
                                                    siempre y cuando
                                                    cumplan
                                                    con los requerimientos exigidos por la organización.</li>
                                            </ul>
                                        </div>
                                    </details>
                                    <details class="group">
                                        <summary
                                            class="flex justify-between items-center font-medium cursor-pointer list-none">
                                            <span> E. PARTICIPANTES:</span>
                                            <span class="transition group-open:rotate-180">
                                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                    <path d="M6 9l6 6 6-6"></path>
                                                </svg>
                                            </span>
                                        </summary>
                                        <div class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                                            <ul class="list-disc pl-6 mt-2">
                                                <li>Podrán Participar en el Torneo todos los estudiantes que
                                                    pertenezcan
                                                    a la Carrera de
                                                    Software y
                                                    se encuentren matriculados en el periodo académico actual
                                                    202251,
                                                    siempre y cuando
                                                    cumplan
                                                    con los requerimientos exigidos por la organización.</li>
                                            </ul>
                                        </div>
                                    </details>
                                    <details class="group">
                                        <summary
                                            class="flex justify-between items-center font-medium cursor-pointer list-none">
                                            <span> F. NÚMERO DE JUGADORES:</span>
                                            <span class="transition group-open:rotate-180">
                                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                    <path d="M6 9l6 6 6-6"></path>
                                                </svg>
                                            </span>
                                        </summary>
                                        <div class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                                            <ul class="list-disc pl-6 mt-2">
                                                <li>Cada equipo podrá inscribir un máximo de 10 jugadores HOMBRES y
                                                    al
                                                    menos 1 MUJER,
                                                    pudiendo inscribir más mujeres de ser necesario</li>
                                                <ol class="list-decimal pl-6 mt-2">
                                                    <li>El partido será jugado por dos equipos compuestos cada uno
                                                        de
                                                        ellos por siete
                                                        jugadores, uno
                                                        de los cuales actuará como guardameta. <strong>UNA MUJER
                                                            ACTUARÁ
                                                            EN CANCHA
                                                            OBLIGATORIAMENTE.</strong></li>
                                                    <li>Para poder empezar válidamente un partido oficial, cada uno
                                                        de
                                                        los equipos
                                                        deberá presentar en
                                                        el terreno de juego al menos cinco (5) jugadores.</li>
                                                    <li>Sólo podrán incorporarse jugadores hasta el final del
                                                        descanso
                                                        de cada partido
                                                        <strong>(PRIMERA
                                                            PARTE)</strong>, considerándose como tal, la salida del
                                                        árbitro al terreno
                                                        de juego para
                                                        iniciar la
                                                        <strong>SEGUNDA PARTE.</strong>
                                                    </li>
                                                    <li>Si el número fuera menor, se considerará no presentación al
                                                        equipo. Para evitar
                                                        sanciones de
                                                        no presentación, el representante del equipo debe acercarse
                                                        a la
                                                        mesa y pagar el
                                                        costo del
                                                        árbitro.
                                                        .</li>
                                                    <li>Una vez comenzado el partido, podrán realizarse cuantos
                                                        cambios
                                                        o sustituciones
                                                        se deseen,
                                                        siempre que se realicen de forma reglamentaria, es decir
                                                        previa
                                                        autorización del
                                                        árbitro o del
                                                        auxiliar de mesa. Los jugadores sustituidos podrán volver al
                                                        juego cuantas veces
                                                        se
                                                        considere conveniente.
                                                    </li>
                                                    <li>Si una vez iniciado el juego uno de los contendientes
                                                        quedase
                                                        con un número de
                                                        jugadores
                                                        inferior a cinco, se dará por finalizado el partido.

                                                    </li>
                                                    <li> Se elimina la regla de fuera de juego (Posición
                                                        adelantada).
                                                    </li>
                                                    <li> <strong>Se agrega la regla de 5 faltas consecutivas a la
                                                            sexta
                                                            falta
                                                            penal</strong> para
                                                        minimizar los roses
                                                        bruscos de juego, se borran las faltas al término del primer
                                                        tiempo.</li>
                                                    <li> Si un jugador es expulsado (tarjeta roja), el equipo no
                                                        puede
                                                        completar con un
                                                        jugador.</li>
                                                </ol>
                                                <li><strong>Nota 1:</strong> Si uno de los equipos no cuenta con una
                                                    mujer en cancha, no
                                                    podrá completar
                                                    con un
                                                    jugador hombre, por lo tanto, jugará con un miembro menos.</li>
                                            </ul>
                                        </div>
                                    </details>
                                </div>
                                <!------------------------------------------------------------------------------------------------------>
                                <!-- Columna 2 -->
                                <div class="py-5">
                                    <details class="group">
                                        <summary
                                            class="flex justify-between items-center font-medium cursor-pointer list-none">
                                            <span> G. IMPLEMENTOS:</span>
                                            <span class="transition group-open:rotate-180">
                                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                    <path d="M6 9l6 6 6-6"></path>
                                                </svg>
                                            </span>
                                        </summary>
                                        <div class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                                            <ul class="list-disc pl-6 mt-2">
                                                <li>Cada jugador debe presentarse uniformado con pupos/pupillos,
                                                    camiseta, pantaloneta,
                                                    medias.
                                                    A partir de la primera fecha todo equipo debe estar uniformado
                                                    (mínimo camiseta
                                                    exactamente
                                                    igual a la de sus compañeros) de lo contrario el juez central no
                                                    permitirá jugar el
                                                    partido y se
                                                    otorgarán tres puntos y 2 goles al equipo rival.</li>
                                            </ul>
                                        </div>
                                    </details>
                                    <details class="group ">
                                        <summary
                                            class="flex justify-between items-center font-medium cursor-pointer list-none">
                                            <span> H. COMPROMISO:</span>
                                            <span class="transition group-open:rotate-180">
                                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                    <path d="M6 9l6 6 6-6"></path>
                                                </svg>
                                            </span>
                                        </summary>
                                        <div class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                                            <ul class="list-disc pl-6 mt-2">
                                                <li>Todo equipo adquiere el compromiso de acatar la reglamentación
                                                    interna, en lo
                                                    referente a: DIA,
                                                    HORA, CAMPO Y REGLAMENTO INTERNO DEL CAMPEONATO.
                                                </li>
                                            </ul>
                                        </div>
                                    </details>
                                    <details class="group ">
                                        <summary
                                            class="flex justify-between items-center font-medium cursor-pointer list-none">
                                            <span> I. HORARIO:</span>
                                            <span class="transition group-open:rotate-180">
                                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                    <path d="M6 9l6 6 6-6"></path>
                                                </svg>
                                            </span>
                                        </summary>
                                        <div class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                                            <ul class="list-disc pl-6 mt-2">
                                                <li>Los encuentros deportivos serán de martes a jueves en un horario que
                                                    no intervenga
                                                    con el
                                                    académico, cada tiempo durará 30 minutos con 10 minutos de descanso.
                                                </li>
                                            </ul>
                                        </div>
                                    </details>
                                    <details class="group ">
                                        <summary
                                            class="flex justify-between items-center font-medium cursor-pointer list-none">
                                            <span> J. INAUGURACIÓN:</span>
                                            <span class="transition group-open:rotate-180">
                                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                    <path d="M6 9l6 6 6-6"></path>
                                                </svg>
                                            </span>
                                        </summary>
                                        <div class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                                            <ul class="list-disc pl-6 mt-2">
                                                <li>El evento de inauguración se realizará de acuerdo a la fecha y hora
                                                    establecida en
                                                    el cronograma correspondiente y en concordancia con el programa
                                                    establecido para el
                                                    mismo.
                                                </li>
                                                <li> <strong>Nota 1:</strong> Luego del evento de inauguración se dará
                                                    inicio a la
                                                    primera fecha para los encuentros
                                                    respectivos CON LOS GANADORES DE Srta. DEPORTES Y MEJOR EQUIPO
                                                    UNIFORMADO,
                                                    quienes formarán parte de un mismo grupo.</li>
                                                <li> <strong>Nota 2:</strong> En el evento de inauguración se procederá
                                                    al sorteo de los
                                                    Grupos de equipos.</li>
                                                <li> <strong>Nota 3:</strong> La organización conformará una comisión de
                                                    Docentes de la
                                                    Carrera de Software para la
                                                    elección del equipo mejor uniformado (Camiseta, pantaloneta, medias,
                                                    canilleras y
                                                    Pupos/Pupillos, madrina), y de la misma forma elegirá a la Señorita
                                                    Deporte del
                                                    Campeonato.</li>
                                            </ul>
                                        </div>
                                    </details>
                                    <details class="group ">
                                        <summary
                                            class="flex justify-between items-center font-medium cursor-pointer list-none">
                                            <span> K. FORMATO DEL CAMPEONATO:</span>
                                            <span class="transition group-open:rotate-180">
                                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                    <path d="M6 9l6 6 6-6"></path>
                                                </svg>
                                            </span>
                                        </summary>
                                        <div class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                                            <ul class="list-disc pl-6 mt-2">
                                                <li>Se dividirá en dos grupos, donde en cada grupo se jugará en la
                                                    modalidad de todos
                                                    contra todos,
                                                    de los cuales clasificarán los 2 (dos) mejores equipos para las
                                                    fases finales
                                                    (SEMIFINAL Y
                                                    FINAL).
                                                </li>
                                            </ul>
                                        </div>
                                    </details>
                                    <details class="group ">
                                        <summary
                                            class="flex justify-between items-center font-medium cursor-pointer list-none">
                                            <span> L. DE LOS PREMIOS:</span>
                                            <span class="transition group-open:rotate-180">
                                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                    <path d="M6 9l6 6 6-6"></path>
                                                </svg>
                                            </span>
                                        </summary>
                                        <div class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                                            <ol class="list-decimal pl-6 mt-2">
                                                <li>El primer lugar del torneo se llevará un trofeo y medallas.</li>
                                                <li>El segundo lugar se llevará medallas.</li>
                                                <li>El tercer lugar se llevará medallas.</li>
                                                <li>Goleador.</li>
                                                <li>Mujer destacada.</li>
                                            </ol>
                                        </div>
                                    </details>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!------------------------------------------------------------------------------------------------------>
            <div class="mt-6 scale-100 flex justify-center items-center">
                <a href="{{ url('/descargar-pdf') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 ">
                    Descargar reglamentos completos PDF
                </a>
            </div>
        </div>
        <!-- --------------------------- Ubicación -------------------------------------------->
        <div id="ubicacion" class="mt-16">
            <h2 class="flex justify-center items-center text-2xl font-semibold text-white mb-1">UBICACIÓN DEL
                TORNEO</h2>
            <div class="flex justify-center items-center ">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15956.852510484774!2d-78.59382011279547!3d-0.9979606293446636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d4639e7c398d3f%3A0xc4999bdc40abfc48!2sUniversidad%20De%20Las%20Fuerzas%20Armadas%20ESPE%20Extensi%C3%B3n%20Belisario%20Quevedo!5e0!3m2!1ses!2sec!4v1705287758847!5m2!1ses!2sec"
                    width="1100" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <!-------------------------------------FOOTER----------------------------------------->
        <div class="flex justify-center mt-16 px-0 sm:items-center ">
            <div class="text-center text-sm text-gray-500 ">
                <div class="flex items-center gap-4">
                    <a href="https://github.com/sponsors/taylorotwell"
                        class="group inline-flex items-center hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            class="-mt-px mr-1 w-5 h-5 stroke-gray-400 group-hover:stroke-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                        Sponsor
                    </a>
                </div>
            </div>

            <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </div>
    </div>
    <!-- Modal -->
    <!-- Main modal -->
    <div id="static-modal-overlay" class="fixed top-0 right-0 bottom-0 left-0 bg-black bg-opacity-95 z-40 hidden"></div>
    <div id="static-modal" data-modal-backdrop="overlay" tabindex="-1" aria-hidden="true"
        class="flex justify-center items-center hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-8 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-white">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-black">
                        Horario Completo
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="static-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        @foreach($vs as $vsItem)
                        <div class="relative mx-auto max-w-2xl overflow-hidden rounded-md mt-6 sm:p-4"
                            style="background-image: url('{{ asset('Imagenes/horario.png') }}'); background-size: cover;">
                            <div class="match z-20 flex flex-col items-center">
                                <div class="flags flex">
                                    <div>
                                        <img src="{{ asset('Imagenes/escudo.jpg') }}" alt="Escudo Equipo 1"
                                            class="rounded-md w-40 h-40">
                                        <h4 class="text-white ">{{ $vsItem->team2->name }}</h4>
                                    </div>
                                    <span class="text-white mx-4 mt-20 "><strong>VS</strong></span>
                                    <div>
                                        <img src="{{ asset('Imagenes/escudo.jpg') }}" alt="Escudo Equipo 2"
                                            class="rounded-md w-40 h-40">
                                        <h4 class="text-white">{{ $vsItem->team1->name }}</h4>
                                    </div>
                                </div>
                                <!-- Agregar la fecha y hora -->
                                <div class="mt-2">
                                    <div class="text-white">
                                        <h4 class=""><strong>Fecha: </strong>{{ $vsItem->date }}</h4>
                                        <h4 class=""><strong>Hora: </strong>{{ $vsItem->time }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="static-modal" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // El códlpine.js que inicializa el slider y maneja la navegación
            document.addEventListener("alpine:init", () => {
                Alpine.data("imageSlider", () => ({
                    currentIndex: 1,
                    matches: @json($vs), // Aquí asumí que $vs contiene la información de los partidos
                    previous() {
                        if (this.currentIndex > 1) {
                            this.currentIndex = this.currentIndex - 1;
                        }
                    },
                    forward() {
                        if (this.currentIndex < this.matches.length) {
                            this.currentIndex = this.currentIndex + 1;
                        }
                    },
                }));
            });

            //scrit modal
            document.addEventListener('DOMContentLoaded', function () {
                const modalToggles = document.querySelectorAll('[data-modal-toggle]');
                const modalHides = document.querySelectorAll('[data-modal-hide]');
                const modalOverlay = document.getElementById('static-modal-overlay');

                modalToggles.forEach(toggle => {
                    toggle.addEventListener('click', () => {
                        const target = document.getElementById(toggle.dataset.modalTarget);
                        if (target) {
                            target.classList.toggle('hidden');
                            modalOverlay.classList.toggle('hidden');
                        }
                    });
                });

                modalHides.forEach(hide => {
                    hide.addEventListener('click', () => {
                        const target = document.getElementById(hide.dataset.modalHide);
                        if (target) {
                            target.classList.add('hidden');
                            modalOverlay.classList.add('hidden');
                        }
                    });
                });
            });
        </script>
</body>

</html>