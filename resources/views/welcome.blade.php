<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="antialiased">
<div class="absolute inset-0 -z-10 h-full w-full items-center px-5 [background:radial-gradient(125%_125%_at_50%_10%,#000_40%,#63e_100%)]">
    <!---------------------------Barra de Opciones------------------------->

        <div class="sm:static sm:top-0 sm:center-0 text-center z-10 w-full p-1">
            <!-- login -->
            <div class="flex justify-end flex justify-center items-center">
                <a href="{{ url('/espe') }}" class="p-6 font-semibold text-white  hover:text-red-900">
                    Iniciar Sesión
                </a>
                <!-- opcione de: reglamento, ubicacion, contacto -->
                <a href="#reglamentario" class="p-6 font-semibold text-white  hover:text-red-900">
                    Reglamento
                </a>
                <a href="#ubicacion" class="p-6 font-semibold text-white hover:text-red-900">
                    Ubicación
                </a>
                <a href="{{ url('/descargar1-pdf') }}"
                    class="p-6 font-semibold text-white hover:text-red-900">Plantilla de Inscripcion</a>
            </div>
        </div>

        <div class="mt-16 max-w-7xl mx-auto p-6 lg:p-8">
            <!-- Imagen -->
            <div class="p-6 flex justify-center items-center">
                <img src="{{ asset('Imagenes/intro.jpeg') }}" alt="Descripción" class="rounded-md">
            </div>


            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <!---------------Primera tabla--------------------------->
                    <div
                        class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900">TABLA DE POSICIONES</h2>

                            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                Aqui se mostrara las estadisticas de los equipos
                            </p>
                        </div>
                    </div>
                    <!---------------Segunda tabla--------------------------->
                    <div
                        class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900">PROXIMOS PARTIDOS</h2>
                            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                Aqui se mostrara los proximos versus del futbol
                            </p>
                        </div>
                    </div>
                    <!---------------Tercera tabla--------------------------->
                    <div
                        class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900">GOLEADORES DE CADA EQUIPO</h2>

                            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                Aqui se mostrara los goleadores
                            </p>
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
                    class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <div>
                        <p class=" text-gray-500 text-sm leading-relaxed">
                            Reglamento que debe cumplir cada persona que participe como jugador, cuerpo técnico y barra
                            de este campeonato.
                        </p>

                        <!-- Detalles del Reglamento -->
                        <div class="mt-4">
                            <h3 class="text-lg font-semibold text-gray-900">A. PLANILLA DE INSCRIPCIÓN:</h3>
                            <ul class="list-disc pl-6 mt-2">
                                <li>Cada Equipo debe entregar a la organización la planilla de inscripción de acuerdo al
                                    formato que será socializado a través del grupo de WhatsApp.</li>
                                <li>Cada jugador debe tener claro conocimiento de este reglamento previo a su inclusión
                                    en la Plantilla de Inscripción.</li>
                            </ul>
                            <p class=" text-gray-500 text-sm leading-relaxed "><strong>
                                    IMPORTANTE:</strong> Los equipos tienen plazo de inscribir jugadores hasta el 26 de
                                enero del 2024 </p>
                            <!------------------------------------------------------------------------------------------------------>
                            <h3 class="text-lg font-semibold text-gray-900 mt-4">B. PAGO DE INSCRIPCIÓN:</h3>
                            <ul class="list-disc pl-6 mt-2">
                                <li> <strong>VALOR:</strong> $10 dólares americanos de inscripción.</li>
                                <li> <strong>Nota 1:</strong> El equipo que incumpla con la organización en temas de
                                    pago de inscripción, sanciones, carnés o multas, será suspendido automáticamente del
                                    campeonato.</li>
                                <li> <strong>Nota 2:</strong> Puede realizar el pago de inscripción mediante
                                    transferencia y enviar el comprobante de pago con la planilla de inscripción al
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
                                <li> <strong>Nota 3:</strong> Pueden realizar el pago directamente con los estudiantes
                                    Eduardo Mosquera o Mario
                                    Andrade de la Carrera de Software en el Campus Gral. Guillermo Rodríguez Lara.</li>
                            </ul>
                            <!------------------------------------------------------------------------------------------------------>
                            <h3 class="text-lg font-semibold text-gray-900 mt-4">C. CARNET OFICIAL:</h3>
                            <ul class="list-disc pl-6 mt-2">
                                <li> Todo jugador debe tener su carnet oficial de la organización para su participación
                                    en el evento deportivo, el mismo que tendrá el valor de 0.50 centavos de dólar, el
                                    cual deberá estar
                                    emplasticado y llenado correctamente caso contrario no se le permitirá su
                                    participación.</li>
                            </ul>
                            <!------------------------------------------------------------------------------------------------------>
                            <h3 class="text-lg font-semibold text-gray-900 mt-4">D. SEDE: </h3>
                            <ul class="list-disc pl-6 mt-2">
                                <li>El campeonato se realizará en la “Universidad de las Fuerzas Armadas ESPE Sede
                                    Latacunga Campus Gral. Guillermo Rodríguez Lara”.</li>
                            </ul>
                            <!------------------------------------------------------------------------------------------------------>
                            <h3 class="text-lg font-semibold text-gray-900 mt-4">E. PARTICIPANTES: </h3>
                            <ul class="list-disc pl-6 mt-2">
                                <li>Podrán Participar en el Torneo todos los estudiantes que pertenezcan a la Carrera de
                                    Software y
                                    se encuentren matriculados en el periodo académico actual 202251, siempre y cuando
                                    cumplan
                                    con los requerimientos exigidos por la organización.</li>
                            </ul>
                            <!------------------------------------------------------------------------------------------------------>
                            <h3 class="text-lg font-semibold text-gray-900 mt-4">F. NÚMERO DE JUGADORES. </h3>
                            <ul class="list-disc pl-6 mt-2">
                                <li>Cada equipo podrá inscribir un máximo de 10 jugadores HOMBRES y al menos 1 MUJER,
                                    pudiendo inscribir más mujeres de ser necesario</li>
                                <ol class="list-decimal pl-6 mt-2">
                                    <li>El partido será jugado por dos equipos compuestos cada uno de ellos por siete
                                        jugadores, uno
                                        de los cuales actuará como guardameta. <strong>UNA MUJER ACTUARÁ EN CANCHA
                                            OBLIGATORIAMENTE.</strong></li>
                                    <li>Para poder empezar válidamente un partido oficial, cada uno de los equipos
                                        deberá presentar en
                                        el terreno de juego al menos cinco (5) jugadores.</li>
                                    <li>Sólo podrán incorporarse jugadores hasta el final del descanso de cada partido
                                        <strong>(PRIMERA
                                            PARTE)</strong>, considerándose como tal, la salida del árbitro al terreno
                                        de juego para
                                        iniciar la
                                        <strong>SEGUNDA PARTE.</strong>
                                    </li>
                                    <li>Si el número fuera menor, se considerará no presentación al equipo. Para evitar
                                        sanciones de
                                        no presentación, el representante del equipo debe acercarse a la mesa y pagar el
                                        costo del
                                        árbitro.
                                        .</li>
                                    <li>Una vez comenzado el partido, podrán realizarse cuantos cambios o sustituciones
                                        se deseen,
                                        siempre que se realicen de forma reglamentaria, es decir previa autorización del
                                        árbitro o del
                                        auxiliar de mesa. Los jugadores sustituidos podrán volver al juego cuantas veces
                                        se
                                        considere conveniente.
                                    </li>
                                    <li>Si una vez iniciado el juego uno de los contendientes quedase con un número de
                                        jugadores
                                        inferior a cinco, se dará por finalizado el partido.

                                    </li>
                                    <li> Se elimina la regla de fuera de juego (Posición adelantada). </li>
                                    <li> <strong>Se agrega la regla de 5 faltas consecutivas a la sexta falta
                                            penal</strong> para
                                        minimizar los roses
                                        bruscos de juego, se borran las faltas al término del primer tiempo.</li>
                                    <li> Si un jugador es expulsado (tarjeta roja), el equipo no puede completar con un
                                        jugador.</li>
                                </ol>
                                <li><strong>Nota 1:</strong> Si uno de los equipos no cuenta con una mujer en cancha, no
                                    podrá completar
                                    con un
                                    jugador hombre, por lo tanto, jugará con un miembro menos.</li>
                            </ul>
                            <!------------------------------------------------------------------------------------------------------>
                            <h3 class="text-lg font-semibold text-gray-900 mt-4">G. IMPLEMENTOS: </h3>
                            <ul class="list-disc pl-6 mt-2">
                                <li>Cada jugador debe presentarse uniformado con pupos/pupillos, camiseta, pantaloneta,
                                    medias.
                                    A partir de la primera fecha todo equipo debe estar uniformado (mínimo camiseta
                                    exactamente
                                    igual a la de sus compañeros) de lo contrario el juez central no permitirá jugar el
                                    partido y se
                                    otorgarán tres puntos y 2 goles al equipo rival.</li>
                            </ul>
                            <!------------------------------------------------------------------------------------------------------>
                            <h3 class="text-lg font-semibold text-gray-900 mt-4">H. COMPROMISO: </h3>
                            <ul class="list-disc pl-6 mt-2">
                                <li>Todo equipo adquiere el compromiso de acatar la reglamentación interna, en lo
                                    referente a: DIA,
                                    HORA, CAMPO Y REGLAMENTO INTERNO DEL CAMPEONATO.
                                </li>
                            </ul>
                            <!------------------------------------------------------------------------------------------------------>
                            <h3 class="text-lg font-semibold text-gray-900 mt-4">I. HORARIO: </h3>
                            <ul class="list-disc pl-6 mt-2">
                                <li>Los encuentros deportivos serán de martes a jueves en un horario que no intervenga
                                    con el
                                    académico, cada tiempo durará 30 minutos con 10 minutos de descanso.
                                </li>
                            </ul>
                            <!------------------------------------------------------------------------------------------------------>
                            <h3 class="text-lg font-semibold text-gray-900 mt-4">J. INAUGURACIÓN: </h3>
                            <ul class="list-disc pl-6 mt-2">
                                <li>El evento de inauguración se realizará de acuerdo a la fecha y hora establecida en
                                    el cronograma correspondiente y en concordancia con el programa establecido para el
                                    mismo.
                                </li>
                                <li> <strong>Nota 1:</strong> Luego del evento de inauguración se dará inicio a la
                                    primera fecha para los encuentros
                                    respectivos CON LOS GANADORES DE Srta. DEPORTES Y MEJOR EQUIPO UNIFORMADO,
                                    quienes formarán parte de un mismo grupo.</li>
                                <li> <strong>Nota 2:</strong> En el evento de inauguración se procederá al sorteo de los
                                    Grupos de equipos.</li>
                                <li> <strong>Nota 3:</strong> La organización conformará una comisión de Docentes de la
                                    Carrera de Software para la
                                    elección del equipo mejor uniformado (Camiseta, pantaloneta, medias, canilleras y
                                    Pupos/Pupillos, madrina), y de la misma forma elegirá a la Señorita Deporte del
                                    Campeonato.</li>
                            </ul>
                            <!------------------------------------------------------------------------------------------------------>
                            <h3 class="text-lg font-semibold text-gray-900 mt-4">K. FORMATO DEL CAMPEONATO: </h3>
                            <ul class="list-disc pl-6 mt-2">
                                <li>Se dividirá en dos grupos, donde en cada grupo se jugará en la modalidad de todos
                                    contra todos,
                                    de los cuales clasificarán los 2 (dos) mejores equipos para las fases finales
                                    (SEMIFINAL Y
                                    FINAL).
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mt-6 scale-100 flex justify-center items-center">
                    <a href="{{ url('/descargar-pdf') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 ">
                        Descargar reglamentos completos PDF
                    </a>
                </div>

            </div>
            <!-- --------------------------- Ubicación -------------------------------------------->
            <div id="ubicacion" class="mt-16">
                <h2 class="flex justify-center items-center text-2xl font-semibold text-white mb-4">UBICACIÓN DEL
                    TORNEO</h2>
                <div
                    class="flex justify-center items-center scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15956.852510484774!2d-78.59382011279547!3d-0.9979606293446636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d4639e7c398d3f%3A0xc4999bdc40abfc48!2sUniversidad%20De%20Las%20Fuerzas%20Armadas%20ESPE%20Extensi%C3%B3n%20Belisario%20Quevedo!5e0!3m2!1ses!2sec!4v1705287758847!5m2!1ses!2sec"
                        width="1100" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <!-------------------------------------FOOTER----------------------------------------->
            <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
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
</body>

</html>
