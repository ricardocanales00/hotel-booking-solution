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

                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th>Fecha de llegada</th>
                                            <th>Fecha de salida</th>
                                            <th>Personas</th>
                                            <th>Total pagado</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($myReservations as $reservacion)
                                            <tr>
                                                <td>{{ $reservacion->inicio }}</td>
                                                <td>{{ $reservacion->fin }}</td>
                                                <td>{{ $reservacion->personas }}</td>
                                                <td>{{ $reservacion->precio }}</td>
                                                @if($reservacion->correo ==Auth::user()->email)
                                                    <td>
                                                        <a href="{{ route('reservation.edit', $reservacion->id) }}">
                                                            <button type="button" class="btn btn-primary waves-effect waves-float waves-light">Editar reserva</button>
                                                        </a>
                                                    </td>
                                                @endif
                                                @if($reservacion->correo ==Auth::user()->email)
                                                    <td>
                                                        <form action="{{ route('reservation.destroy', $reservacion->id)}}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn show_confirm btn-danger waves-effect waves-float waves-light">Cancelar reserva</button>
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