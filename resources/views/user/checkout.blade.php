<!DOCTYPE html>
<html lang="en">

<head>
    <title>Confirmación de Orden #{{ $pago->id }} - PUPPETS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- LIBRERÍAS EXTERNAS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- CSS Y BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('user-template/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user-template/style.css') }}">

    <style>
        /* FONDO SUAVE Y NEUTRO PARA QUE TODO RESALTE */
        body {
            background-color: #f7f3f0;
            /* Un color hueso/blanco roto muy suave */
        }

        /* Estilo Característico del Ticket */
        .ticket-virtual {
            border: 2px dashed #ff69b4;
            /* Color primario característico (rosa/fucsia) */
            padding: 30px;
            border-radius: 10px;
            background-color: #ffffff;
            /* Fondo blanco puro para que el texto negro resalte */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .text-primary {
            color: #ff69b4 !important;
        }

        .main-button {
            background-color: #ff69b4;
            /* Botón rosa fuerte */
            border-color: #ff69b4;
            color: white;
            transition: background-color 0.3s;
        }

        .main-button:hover {
            background-color: #e05c9c;
            border-color: #e05c9c;
        }

        .btn-back-to-home {
            background-color: #343a40;
            /* Gris oscuro/negro */
            border-color: #343a40;
            color: white;
            transition: background-color 0.3s;
        }

        .btn-back-to-home:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }

        .qr-placeholder {
            width: 150px;
            height: 150px;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc;
        }

        /* REGLA: Texto negro y padding para el aviso importante */
        .aviso-importante {
            background-color: #d8e6ff;
            /* Fondo azul suave */
            color: #000000 !important;
            /* Texto negro forzado */
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            margin-top: 15px;
            text-align: center;
        }

        .highlight-text-dark {
            background-color: #d8e6ff;
            color: #000000 !important;
            font-weight: bold;
            display: inline-block;
            padding: 5px 10px;
            border-radius: 3px;
        }
    </style>
</head>

<body>

    {{-- ==================================================================== --}}
    {{-- BARRA DE NAVEGACIÓN COMPLETA (HEADER) --}}
    {{-- ==================================================================== --}}
    <header>
        <div class="container py-2">
            <div class="row py-4 pb-0 pb-sm-4 align-items-center ">
                <div class="col-sm-4 col-lg-3 text-center text-sm-start">
                    <div class="main-logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('user-template/images/puppets/logoo.png') }}" alt="logo" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block"></div>
                <div class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
                    <div class="support-box text-end d-none d-xl-block">
                        <span class="fs-6 secondary-font text-muted">Phone</span>
                        <h5 class="mb-0">+503-6000-5222</h5>
                    </div>
                    <div class="support-box text-end d-none d-xl-block">
                        <span class="fs-6 secondary-font text-muted">Email</span>
                        <h5 class="mb-0">puppets@gmail.com</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <hr class="m-0">
        </div>
        <div class="container">
            <nav class="main-menu d-flex navbar navbar-expand-lg">
                {{-- Nota: La lógica interna del Navbar fue eliminada por brevedad, pero debe estar aquí --}}
            </nav>
        </div>
    </header>
    {{-- ==================================================================== --}}


    <section id="banner" class="py-3" style="background: #F9F3EC;">
        <div class="container">
            <div class="hero-content py-3">
                <h2 class="display-3 mt-3 mb-0">Checkout</h2>
            </div>
        </div>
    </section>

    <section id="checkout-receipt" class="py-5 my-5">
        <div class="container">

            {{-- BOTÓN DE REGRESO A HOME --}}
            <div class="text-center mb-4">
                <a href="{{ route('home') }}" class="btn btn-back-to-home text-uppercase px-4 py-2">
                    Volver al Inicio
                </a>
            </div>

            <h1 class="display-4 text-center mb-5">Confirmación de Orden (Pago por Transferencia)</h1>

            <div class="row justify-content-center">
                <div class="col-lg-8">

                    {{-- 1. DETALLES DE LA TRANSFERENCIA BANCARIA (QR) --}}
                    <div class="card p-4 mb-5 border-0 shadow-sm">
                        <h2 class="card-title text-primary mb-4">Realizar Pago</h2>
                        <p class="fs-5">Para completar tu compra, por favor realiza una transferencia bancaria a la siguiente cuenta:</p>

                        <div class="d-flex align-items-center mb-4">
                            <div class="qr-placeholder me-4">
                                <span class="text-muted small">QR de Banco Agrícola</span>
                            </div>
                            <div>
                                <p class="mb-1 fw-bold">Banco: Banco Agrícola</p>
                                <p class="mb-1 fw-bold">Cuenta: 002-901-00890-4567</p>

                                {{-- MONTO EXACTO (CORREGIDO A NEGRO CON FONDO DE RESALTE) --}}
                                <p class="mb-0 highlight-text-dark">Monto Exacto: ${{ number_format($pago->total, 2) }}</p>
                            </div>
                        </div>

                        {{-- AVISO IMPORTANTE (CORREGIDO PARA TENER TEXTO OSCURO) --}}
                        <div class="aviso-importante">
                            Tu orden será procesada ÚNICAMENTE después de verificar tu comprobante de pago.
                        </div>
                    </div>

                    {{-- 2. TICKET VIRTUAL --}}
                    <div class="mb-4">
                        <h3 class="text-center mb-4">TICKET VIRTUAL DE ENTREGA</h3>

                        {{-- CONTENEDOR DEL TICKET PARA DESCARGA --}}
                        <div id="ticket-content" class="ticket-virtual">
                            <h4 class="text-center text-primary mb-3">PUPPETS - Orden #{{ $pago->id }}</h4>
                            <hr>

                            <div class="row mb-4 small">
                                <div class="col-6">
                                    {{-- CORRECCIÓN CLAVE: El nombre debe estar fuera de la etiqueta strong, pero el strong debe estar en el <strong>Comprador:</strong> --}}

                                    <p class="mb-1"><strong>Comprador:</strong> {{ Auth::check() ? Auth::user()->username : 'Invitado' }}</p>
                                    <p class="mb-1"><strong>Ticket ID:</strong> #{{ $pago->id }}</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p class="mb-1"><strong>Fecha:</strong> {{ date('d/m/Y', strtotime($pago->fecha_hora)) }}</p>
                                    <p class="mb-1"><strong>Hora:</strong> {{ date('h:i A', strtotime($pago->fecha_hora)) }}</p>
                                </div>
                            </div>

                            <h5 class="mb-3">Detalle de Productos:</h5>
                            <ul class="list-group list-group-flush mb-4 small">
                                @foreach ($items as $item)
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>{{ $item['quantity'] }} x {{ $item['name'] }} @if(isset($item['size']) && $item['size'] != 'N/A') (Talla: {{ $item['size'] }}) @endif</span>
                                    <strong>${{ number_format($item['price'] * $item['quantity'], 2) }}</strong>
                                </li>
                                @endforeach
                            </ul>

                            <h3 class="text-center text-primary mt-4">Total Pagado: ${{ number_format($pago->total, 2) }}</h3>
                        </div>
                    </div>

                    {{-- 3. INSTRUCCIONES FINALES Y BOTÓN DE DESCARGA --}}
                    <div class="card p-4 border-0 shadow-sm">
                        <h4 class="mb-3">Instrucciones para Reclamar:</h4>
                        <ol class="mb-4">
                            <li class="fs-6 mb-2">Muestra el **comprobante digital o físico** de la transferencia bancaria realizada.</li>
                            <li class="fs-6">Muestra este **Ticket Virtual (pantallazo o descarga)** a la recepcionista de la tienda para hacerle entrega de tus productos.</li>
                        </ol>

                        <button id="download-ticket-btn" class="btn btn-lg main-button text-uppercase mt-3">
                            <i class="fas fa-download me-2"></i> Descargar Ticket Virtual (PNG)
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- ... (Footer y otros scripts) ... --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Lógica de descarga del Ticket
        $(document).ready(function() {
            // Nota: Se asume que SweetAlert2 y html2canvas están cargados
            $('#download-ticket-btn').on('click', function() {
                const element = document.getElementById('ticket-content');

                // Ocultar el botón de descarga temporalmente para que no aparezca en el PNG
                $(this).hide();

                html2canvas(element, {
                    scale: 3,
                    useCORS: true,
                    allowTaint: true
                }).then(canvas => {
                    const image = canvas.toDataURL('image/png');
                    const link = document.createElement('a');
                    link.href = image;

                    const orderId = '{{ $pago->id }}';
                    link.download = `PUPPETS_Ticket_Orden_${orderId}.png`;

                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);

                    // Mostrar el botón de descarga nuevamente
                    $('#download-ticket-btn').show();

                    Swal.fire({
                        title: '¡Descarga Exitosa!',
                        text: 'Guarda tu comprobante para recoger tu orden.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
                }).catch(error => {
                    console.error('Error al generar la imagen:', error);
                    $('#download-ticket-btn').show();
                    alert('Error al generar el ticket. Intente nuevamente.');
                });
            });
        });
    </script>
</body>

</html>