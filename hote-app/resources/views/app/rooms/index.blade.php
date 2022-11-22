<x-app-layout>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Habitaciones</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/rooms">Inicio</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Crear habitaci&oacute;n</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        @if(Auth::user()->isAbleTo('crear-habitaciones'))
                            <a href="/rooms/create">
                                <button class="btn-icon btn btn-primary btn-round btn-sm" type="button"  aria-haspopup="true"> + Crear habitaci&oacute;n</button>
                            </a>
                        @endif
                    </div>
                </div>

                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th>Numero</th>
                                            <th>Tipo</th>
                                            <th>Capacidad</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rooms as $habitacion)
                                            <tr>
                                                <td>{{ $habitacion->numero }}</td>
                                                <td>{{ $habitacion->tipo }}</td>
                                                <td>{{ $habitacion->capacidad }}</td>
                                                @if(Auth::user()->isAbleTo('actualizar-habitaciones'))
                                                    <td>
                                                        <a href="{{ route('rooms.edit', $habitacion->id) }}">
                                                            <button type="button" class="btn btn-primary waves-effect waves-float waves-light">Editar</button>
                                                        </a>
                                                    </td>
                                                @endif
                                                @if(Auth::user()->isAbleTo('eliminar-habitaciones'))
                                                    <td>
                                                        <form action="{{ route('rooms.destroy', $habitacion->id)}}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn show_confirm btn-danger waves-effect waves-float waves-light">Eliminar</button>
                                                        </form>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>        