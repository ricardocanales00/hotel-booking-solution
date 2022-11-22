<x-app-layout>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0"> Reservaciones activas</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/reservation">Inicio</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th>Numero de habitaci&oacute;n</th>
                                            <th>Cliente</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha fin</th>
                                            <th>Precio total</th>
                                            <th>Personas</th>
                                            <th>Estatus de la reservaci&oacute;n</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reservas as $reserva)
                                            <tr>
                                                <td>{{ $reserva->numero }}</td>
                                                <td>{{ $reserva->nombre }} {{ $reserva->apellidos }}</td>
                                                <td>{{ $reserva->inicio }}</td>
                                                <td>{{ $reserva->fin }}</td>
                                                <td>{{ $reserva->precio }}</td>
                                                <td>{{ $reserva->personas }}</td>
                                                <td>Pagado</td>
                                                @if(Auth::user()->hasRole('administrator'))
                                                    <td>
                                                        <form action="{{ route('reservation.destroy', $reserva->id)}}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn show_confirm btn-danger waves-effect waves-float waves-light">Eliminar reserva</button>
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