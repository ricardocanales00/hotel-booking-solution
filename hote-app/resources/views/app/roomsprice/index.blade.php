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

                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th>Tipo de habitacion</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha fin</th>
                                            <th>Precio</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($precios as $precio)
                                            <tr>
                                                <td>{{ $precio->tipo }}</td>
                                                <td>{{ $precio->inicio }}</td>
                                                <td>{{ $precio->fin }}</td>
                                                <td>{{ $precio->precio }}</td>
                                                @if(Auth::user()->isAbleTo('eliminar-precios'))
                                                    <td>
                                                        <form action="{{ route('rooms-price.destroy', $precio->id)}}" method="post">
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