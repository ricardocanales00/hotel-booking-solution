<x-app-layout>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Precio por habitaciones</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/rooms-price">Inicio</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Asignar nuevo precio</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        @if(Auth::user()->isAbleTo('crear-precios'))
                            <a href="/rooms-price/create">
                                <button class="btn-icon btn btn-primary btn-round btn-sm" type="button"  aria-haspopup="true"> + Asignar nuevo precio</button>
                            </a>
                        @endif
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
                                    <form class="form form-horizontal" method="POST" action="{{ route('rooms.update', $room->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="numero">Numero</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="numero" class="form-control" name="numero" placeholder="Numero de la habitacion" value="{{ $room->numero }}" />
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="tipo">Tipo de habitacion</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="tipo">
                                                            <option class="form-control" value="">Seleccionar</option>
                                                            <option class="form-control" value="single" @if($room->tipo == "single") selected @endif>Single</option>
                                                            <option class="form-control" value="doble" @if($room->tipo == "doble") selected @endif>Doble</option>
                                                            <option class="form-control" value="triple" @if($room->tipo == "triple") selected @endif>Triple</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="capacidad">Capacidad</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="number" id="capacidad" class="form-control" name="capacidad" placeholder="Capacidad de la habitacion" value="{{ $room->capacidad }}"/>
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