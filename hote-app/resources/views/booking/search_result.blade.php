<x-app-layout>
<!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="pricing-plan">
                    <!-- title text and switch button -->
                    <div class="text-center">
                        <h1 class="mt-5">Nuestras mejores habitaciones</h1>
                        <p class="mb-2 pb-75">
                            A continuaci&oacute;n, te presentamos las mejores opciones para hospedarte con la informacion que nos proporcionaste.
                        </p>
                    </div>
                    <!--/ title text and switch button -->

                    <!-- pricing plan cards -->
                    <div class="row pricing-card">
                        <div class="col-12 col-sm-offset-2 col-sm-10 col-md-12 col-lg-offset-2 col-lg-10 mx-auto">
                            <div class="row">
                                @foreach($disponibilidad as $habitacion)
                                        <div class="col-12 col-md-4">
                                            <div class="card basic-pricing text-center">
                                                <div class="card-body">
                                                    <img src="{{  asset('img/habitacion.jpg') }}" class="mb-2 mt-5" width="100%" />
                                                    <h3>{{ strtoupper($habitacion->tipo) }} </h3>
                                                    <p class="card-text">Habitacion increible para hasta {{$habitacion->capacidad}} personas</p>
                                                    <div class="annual-plan">
                                                        <div class="plan-price mt-2">
                                                            <sup class="font-medium-1 fw-bold text-primary">$</sup>
                                                            <span class="pricing-basic-value fw-bolder text-primary">{{ $habitacion->precio }}</span>
                                                            <sub class="pricing-duration text-body font-medium-1 fw-bold">/por noche</sub>
                                                        </div>
                                                        <small class="annual-pricing d-none text-muted"></small>
                                                    </div>
                                                    <ul class="list-group list-group-circle text-start">
                                                        <li class="list-group-item">Habitacion para {{$habitacion->capacidad}} personas</li>
                                                        <li class="list-group-item">Plataformas de streaming</li>
                                                        <li class="list-group-item">Estacionamiento</li>
                                                        <li class="list-group-item">Check-in 3PM y Check-out 12PM</li>
                                                    </ul>
                                                    <form class="form form-horizontal" method="POST" action="{{ route('buscador.update', $habitacion->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="text" name="habitacion" value="{{ $habitacion->id }}" hidden>
                                                        <input type="text" name="capacidad" value="{{ $habitacion->tipo }}" hidden>
                                                        <input type="text" name="precio" value="{{ $habitacion->precio }}" hidden>
                                                        <input type="text" name="personas" value="{{ $personas }}" hidden>
                                                        <input type="text" name="inicio" value="{{ $inicio }}" hidden>
                                                        <input type="text" name="fin" value="{{ $fin }}" hidden>
                                                        <button type="submit" class="btn w-100 btn-outline-info mt-2">Reservar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--/ pricing plan cards -->
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
</x-app-layout>