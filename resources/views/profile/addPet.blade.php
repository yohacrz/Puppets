<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>PUPPETS</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{ asset('img/user/VARIANTE DE LOGOS PUPPETS-02.png') }}">

    <link href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="accountbg"></div>

    <script>
        const razasPorEspecie = {
            Perro: [
                "Akita Inu", "Beagle", "Bulldog Francés", "Chihuahua", "Golden Retriever",
                "Labrador Retriever", "Pastor Alemán", "Pitbull", "Pomerania", "Rottweiler"
            ],
            Gato: [
                "Abisinio", "Angora Turco", "Azul Ruso", "Bengalí", "Maine Coon",
                "Persa", "Ragdoll", "Siamés", "Siberiano", "Sphynx"
            ]
        };

        function actualizarRazas() {
            const especie = document.getElementById('especie').value;
            const razaSelect = document.getElementById('raza');

            // Limpiar opciones actuales
            razaSelect.innerHTML = '<option value="">-- Selecciona una raza --</option>';

            // Agregar nuevas opciones si hay razas disponibles
            if (razasPorEspecie[especie]) {
                razasPorEspecie[especie].forEach(function(raza) {
                    const option = document.createElement('option');
                    option.value = raza;
                    option.text = raza;
                    razaSelect.appendChild(option);
                });
            }
        }
    </script>


    <!-- Begin page -->
    <div class="home-btn d-none d-sm-block">
        <a href="{{ url('/profile') }}" class="text-white"><i class="mdi mdi-home h1"></i></a>
    </div>

    <div class="wrapper-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card card-pages mt-4">
                        <div class="card-body">
                            <div class="text-center mt-0 mb-3">
                                <a href="{{ url('/') }}" class="logo logo-admin">
                                    <img src="{{ asset('img/user/VARIANTE DE LOGOS PUPPETS-05.png') }}" class="mt-3"
                                        alt="" height="150">
                                </a>
                                <p class="text-muted w-75 mx-auto mb-4 mt-4"></p>
                            </div>

                            <form class="form-horizontal mt-4" method="POST" action="{{ route('addPet.store') }}">
                                @csrf

                                <div class="form-group">
                                    <div class="col-12">
                                        <label for="especie">Especie</label>
                                        <select name="especie" id="especie" class="form-control"
                                            onchange="actualizarRazas()" required>
                                            <option value="">Elige una especie</option>
                                            <option value="Perro">Perro</option>
                                            <option value="Gato">Gato</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="raza">Raza</label>
                                            <select name="raza" id="raza" class="form-control" required>
                                                <option value="">Selecciona una raza</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12">
                                        <label for="nombre">Nombre</label>
                                        <input class="form-control" type="text" id="nombre" name="nombre"
                                            placeholder="Nombre" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-12">
                                        <label for="color">Color</label>
                                        <input class="form-control" type="text" id="color" name="color"
                                            placeholder="Color" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-12">
                                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                        <input class="form-control" type="date" id="fecha_nacimiento"
                                            name="fecha_nacimiento" placeholder="Fecha de Nacimiento" required>
                                    </div>
                                </div>


                                <div class="form-group text-center mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-block waves-effect waves-light"
                                            type="submit">Añadir Mascota</button>
                                    </div>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>

    <!-- jQuery and scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/waves.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
