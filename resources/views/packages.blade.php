{{-- resources/views/packages.blade.php --}}
@extends('layouts.app')

@section('title', 'Nuestros Paquetes')

@section('content')

    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="display-1 text-uppercase text-dark mb-lg-4">Paquetes</h1>
                    <h1 class="text-uppercase text-white mb-lg-4">Elige el Mejor Plan Para tu Mascota</h1>
                    <p class="fs-4 text-white mb-lg-4">
                        Ofrecemos servicios de alta calidad para asegurar que tu mejor amigo se vea y se sienta genial.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5">
        <div class="container">
            <ul class="nav nav-tabs justify-content-center mb-5" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="haircuts-tab" data-bs-toggle="tab" data-bs-target="#haircuts-content" type="button" role="tab" aria-controls="haircuts-content" aria-selected="true">Cortes de Pelo</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nailcuts-tab" data-bs-toggle="tab" data-bs-target="#nailcuts-content" type="button" role="tab" aria-controls="nailcuts-content" aria-selected="false">Cortes de Uñas</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="dentalcare-tab" data-bs-toggle="tab" data-bs-target="#dentalcare-content" type="button" role="tab" aria-controls="dentalcare-content" aria-selected="false">Cepillo dental</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="knotremoval-tab" data-bs-toggle="tab" data-bs-target="#knotremoval-content" type="button" role="tab" aria-controls="knotremoval-content" aria-selected="false">Sesion de nudos</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="haircuts-content" role="tabpanel" aria-labelledby="haircuts-tab">
                    <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                        <h6 class="text-primary text-uppercase">Baños profesionales</h6>
                        <h1 class="display-5 text-uppercase mb-0">PERRITOS</h1> 
                    </div>
                    <div class="row g-5">
                        <div class="col-lg-4">
                            <div class="bg-light text-center pt-5">
                                <h2 class="text-uppercase">Pequeños</h2>
                                <h6 class="text-body mb-5">Corte de pelo o arreglo segun estandar de la raza</h6>
                                <div class="text-center bg-primary p-4 mb-2">
                                    <h1 class="display-4 text-white mb-0">
                                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>15<small
                                            class="align-bottom" style="font-size: 16px; line-height: 40px;">.00</small>
                                    </h1>
                                </div>
                                <div class="text-center p-4">
                                    <a href="{{ route('agendar.cita.seleccionar', [
                                               'servicio' => 'Corte de Pelo',
                                               'tamanio' => 'Pequeños',
                                               'precio' => 15
                                           ]) }}"
                                    class="btn btn-primary text-uppercase py-2 px-4 my-3">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="bg-light text-center pt-5">
                                <h2 class="text-uppercase">Medianos</h2>
                                <h6 class="text-body mb-5">Corte de pelo o arreglo segun estandar de la raza</h6>
                                <div class="text-center bg-dark p-4 mb-2">
                                    <h1 class="display-4 text-white mb-0">
                                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>20<small
                                            class="align-bottom" style="font-size: 16px; line-height: 40px;">.00</small>
                                    </h1>
                                </div>
                                <div class="text-center p-4">
                                    <a href="{{ route('agendar.cita.seleccionar', [
                                               'servicio' => 'Corte de Pelo',
                                               'tamanio' => 'Medianos',
                                               'precio' => 20
                                           ]) }}"
                                    class="btn btn-primary text-uppercase py-2 px-4 my-3">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="bg-light text-center pt-5">
                                <h2 class="text-uppercase">Grandes</h2>
                                <h6 class="text-body mb-5">Corte de pelo o arreglo segun estandar de la raza</h6>
                                <div class="text-center bg-primary p-4 mb-2">
                                    <h1 class="display-4 text-white mb-0">
                                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>25<small
                                            class="align-bottom" style="font-size: 16px; line-height: 40px;">.00</small>
                                    </h1>
                                </div>
                                <div class="text-center p-4">
                                    <a href="{{ route('agendar.cita.seleccionar', [
                                               'servicio' => 'Corte de Pelo',
                                               'tamanio' => 'Grandes',
                                               'precio' => 25
                                           ]) }}"
                                    class="btn btn-primary text-uppercase py-2 px-4 my-3">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>
                    
                    {{-- APARTADO DE SERVICIOS PARA GATITOS --}}
                    <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                        <h6 class="text-primary text-uppercase">Baños profesionales</h6>
                        <h1 class="display-5 text-uppercase mb-0">GATITOS</h1>
                    </div>
                    <div class="row g-5">
                        <div class="col-lg-4">
                            <div class="bg-light text-center pt-5">
                                <h2 class="text-uppercase">Gatito</h2>
                                <h6 class="text-body mb-5">Corte de pelo o arreglo segun el manto a lo largo</h6>
                                <div class="text-center bg-primary p-4 mb-2">
                                    <h1 class="display-4 text-white mb-0">
                                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>20<small
                                            class="align-bottom" style="font-size: 16px; line-height: 40px;">.00</small>
                                    </h1>
                                </div>
                                <div class="text-center p-4">
                                    <a href="{{ route('agendar.cita.seleccionar', [
                                               'servicio' => 'Corte de Pelo',
                                               'tamanio' => 'Minino',
                                               'precio' => 20
                                           ]) }}"
                                    class="btn btn-primary text-uppercase py-2 px-4 my-3">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="bg-light text-center pt-5">
                                <h2 class="text-uppercase">Adultos</h2>
                                <h6 class="text-body mb-5">Corte de pelo o arreglo segun estandar de la raza</h6>
                                <div class="text-center bg-dark p-4 mb-2">
                                    <h1 class="display-4 text-white mb-0">
                                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>25<small
                                            class="align-bottom" style="font-size: 16px; line-height: 40px;">.00</small>
                                    </h1>
                                </div>
                                <div class="text-center p-4">
                                    <a href="{{ route('agendar.cita.seleccionar', [
                                               'servicio' => 'Corte de Pelo',
                                               'tamanio' => 'Adultos',
                                               'precio' => 25
                                           ]) }}"
                                    class="btn btn-primary text-uppercase py-2 px-4 my-3">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nailcuts-content" role="tabpanel" aria-labelledby="nailcuts-tab">
                    <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                        <h6 class="text-primary text-uppercase">Servicios Adicionales</h6>
                        <h1 class="display-5 text-uppercase mb-0">CORTES DE UÑAS</h1>
                    </div>
                    <div class="row g-5">
                        <div class="col-lg-4">
                            <div class="bg-light text-center pt-5">
                                <h2 class="text-uppercase">Pequeños</h2>
                                <h6 class="text-body mb-5">Con alicate y/o limado con Dremel</h6>
                                <div class="text-center bg-primary p-4 mb-2">
                                    <h1 class="display-4 text-white mb-0">
                                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>3<small
                                            class="align-bottom" style="font-size: 16px; line-height: 40px;">.00</small>
                                    </h1>
                                </div>
                                <div class="text-center p-4">
                                    <a href="{{ route('agendar.cita.seleccionar', [
                                               'servicio' => 'Corte de Uñas',
                                               'tamanio' => 'Pequeños',
                                               'precio' => 3
                                           ]) }}"
                                    class="btn btn-primary text-uppercase py-2 px-4 my-3">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="bg-light text-center pt-5">
                                <h2 class="text-uppercase">Medianos</h2>
                                <h6 class="text-body mb-5">Con alicate y/o limado con Dremel</h6>
                                <div class="text-center bg-dark p-4 mb-2">
                                    <h1 class="display-4 text-white mb-0">
                                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>4<small
                                            class="align-bottom" style="font-size: 16px; line-height: 40px;">.00</small>
                                    </h1>
                                </div>
                                <div class="text-center p-4">
                                    <a href="{{ route('agendar.cita.seleccionar', [
                                               'servicio' => 'Corte de Uñas',
                                               'tamanio' => 'Medianos',
                                               'precio' => 4
                                           ]) }}"
                                    class="btn btn-primary text-uppercase py-2 px-4 my-3">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="bg-light text-center pt-5">
                                <h2 class="text-uppercase">Grandes</h2>
                                <h6 class="text-body mb-5">Con alicate y/o limado con Dremel</h6>
                                <div class="text-center bg-primary p-4 mb-2">
                                    <h1 class="display-4 text-white mb-0">
                                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>5<small
                                            class="align-bottom" style="font-size: 16px; line-height: 40px;">.00</small>
                                    </h1>
                                </div>
                                <div class="text-center p-4">
                                    <a href="{{ route('agendar.cita.seleccionar', [
                                               'servicio' => 'Corte de Uñas',
                                               'tamanio' => 'Grandes',
                                               'precio' => 5
                                           ]) }}"
                                    class="btn btn-primary text-uppercase py-2 px-4 my-3">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="dentalcare-content" role="tabpanel" aria-labelledby="dentalcare-tab">
                    <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                        <h6 class="text-primary text-uppercase">Servicios Adicionales</h6>
                        <h1 class="display-5 text-uppercase mb-0">CEPILLO DENTAL</h1>
                    </div>
                    <div class="row g-5">
                        <div class="col-lg-4">
                            <div class="bg-light text-center pt-5">
                                <h2 class="text-uppercase">Pequeños</h2>
                                <h6 class="text-body mb-5">Cepillado dental profesional</h6>
                                <div class="text-center bg-primary p-4 mb-2">
                                    <h1 class="display-4 text-white mb-0">
                                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>3<small
                                            class="align-bottom" style="font-size: 16px; line-height: 40px;">.00</small>
                                    </h1>
                                </div>
                                <div class="text-center p-4">
                                    <a href="{{ route('agendar.cita.seleccionar', [
                                               'servicio' => 'Cepillo Dental',
                                               'tamanio' => 'Pequeños',
                                               'precio' => 3
                                           ]) }}"
                                    class="btn btn-primary text-uppercase py-2 px-4 my-3">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="bg-light text-center pt-5">
                                <h2 class="text-uppercase">Medianos</h2>
                                <h6 class="text-body mb-5">Cepillado dental profesional</h6>
                                <div class="text-center bg-dark p-4 mb-2">
                                    <h1 class="display-4 text-white mb-0">
                                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>4<small
                                            class="align-bottom" style="font-size: 16px; line-height: 40px;">.00</small>
                                    </h1>
                                </div>
                                <div class="text-center p-4">
                                    <a href="{{ route('agendar.cita.seleccionar', [
                                               'servicio' => 'Cepillo Dental',
                                               'tamanio' => 'Medianos',
                                               'precio' => 4
                                           ]) }}"
                                    class="btn btn-primary text-uppercase py-2 px-4 my-3">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="bg-light text-center pt-5">
                                <h2 class="text-uppercase">Grandes</h2>
                                <h6 class="text-body mb-5">Cepillado dental profesional</h6>
                                <div class="text-center bg-primary p-4 mb-2">
                                    <h1 class="display-4 text-white mb-0">
                                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>5<small
                                            class="align-bottom" style="font-size: 16px; line-height: 40px;">.00</small>
                                    </h1>
                                </div>
                                <div class="text-center p-4">
                                    <a href="{{ route('agendar.cita.seleccionar', [
                                               'servicio' => 'Cepillo Dental',
                                               'tamanio' => 'Grandes',
                                               'precio' => 5
                                           ]) }}"
                                    class="btn btn-primary text-uppercase py-2 px-4 my-3">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="knotremoval-content" role="tabpanel" aria-labelledby="knotremoval-tab">
                    <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                        <h6 class="text-primary text-uppercase">Servicios Adicionales</h6>
                        <h1 class="display-5 text-uppercase mb-0">SESIÓN DE NUDOS</h1>
                    </div>
                    <div class="row g-5">
                        <div class="col-lg-4">
                            <div class="bg-light text-center pt-5">
                                <h2 class="text-uppercase">POR SESIÓN</h2>
                                <h6 class="text-body mb-5">3 horas de trabajo</h6>
                                <div class="text-center bg-primary p-4 mb-2">
                                    <h1 class="display-4 text-white mb-0">
                                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>30<small
                                            class="align-bottom" style="font-size: 16px; line-height: 40px;">.00</small>
                                    </h1>
                                </div>
                                <div class="text-center p-4">
                                    <a href="{{ route('agendar.cita.seleccionar', [
                                               'servicio' => 'Sesion de Nudos',
                                               'tamanio' => 'Por Sesion',
                                               'precio' => 30
                                           ]) }}"
                                    class="btn btn-primary text-uppercase py-2 px-4 my-3">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection