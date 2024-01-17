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
        <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}.z-10{z-index: 10}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}}
        </style>
    </head>
    <body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 selection:bg-red-500 selection:text-white">
        <!---------------------------Barra de Opciones------------------------->
        @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:center-0 text-center z-10 bg-white w-full p-4">
            @auth
            <a href="{{ url('/dashboard') }}"
                class="font-semibold text-gray-600 hover:text-red-900 focus:outline  ">Dashboard</a>
            @else
            <a href="#reglamentario"
                class="p-6 font-semibold text-gray-600 hover:text-red-900   ">REGLAMENTARIO</a>
            <a href="#ubicacion"
                class="p-6 font-semibold text-gray-600 hover:text-red-900   ">UBICANOS</a>
                <a href="{{ url('/descargar1-pdf') }}"
                class="p-6 font-semibold text-gray-600 hover:text-red-900   ">PLANTILLA DE INSCRIPCIÓN</a>
            <a href="{{ route('login') }}"
                class="p-6 font-semibold text-gray-600 hover:text-red-900   ">INICIAR
                SESIÓN</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="ml-4 font-semibold text-gray-600 hover:text-red-900   ">REGISTRARSE</a>
            @endif
            @endauth
        </div>
        @endif

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
                <div
                    class="mt-6 scale-100 flex justify-center items-center">
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
