<x-app-layout>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">mis Reservaciones</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/reservation">Inicio</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#"> Modificar reservaci&oacute;n</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <a href="/">
                            <button class="btn-icon btn btn-primary btn-round btn-sm" type="button"  aria-haspopup="true"> + Nueva reservaci&oacute;n</button>
                        </a>
                    </div>
                </div>
                <div class="content-body">
                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    @if($errors->any())
                                         <div class="alert alert-danger">
                                              <ul class="list-unstyled">
                                                     @foreach ($errors->all() as $error)
                                                           <li>{{ $error }}</li>
                                                     @endforeach
                                              </ul>
                                          </div>
                                    @endif
                                    <form class="form form-horizontal" method="POST" action="{{ route('reservation.update', $reserva->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="inicio">Fecha de ingreso</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="date" id="inicio" class="form-control" name="inicio" placeholder="Fecha de ingreso" value="{{ $reserva->inicio }}" />
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="fin">Fecha de salida</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="date" id="fin" class="form-control" name="fin" placeholder="Fecha de salida" value="{{ $reserva->fin }}" />
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="personas">Capacidad</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="number" id="personas" class="form-control" name="personas" placeholder="Personas" value="{{ $reserva->personas }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 offset-sm-3">
                                                <button type="submit" class="btn btn-primary me-1">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>