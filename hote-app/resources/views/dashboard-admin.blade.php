<x-app-layout>
<!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <h3>Dashboard</h3>
                <p class="mb-2">
                    Buen d&iacute;a, {{ Auth::user()->name }}! Ahora en este nuevo tablero podr&aacute;s gestionar el funcionamiento de las reservaciones para Hotel LaSinventura.
                </p>

                <!-- Role cards -->
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                                    <div class="role-heading">
                                        <h4 class="fw-bolder">Reservaciones activas</h4>
                                        <a href="/reservation" class="role-edit-modal">
                                            <small class="fw-bolder">Consulta las reservas realizadas en HotelLaSinventura.com</small>
                                        </a>
                                    </div>
                                    <a href="javascript:void(0);" class="text-body"><i data-feather="copy" class="font-medium-5"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                                    <div class="role-heading">
                                        <h4 class="fw-bolder">Habitaciones</h4>
                                        <a href="/rooms" class="role-edit-modal">
                                            <small class="fw-bolder">Gestiona habitaciones del hotel</small>
                                        </a>
                                    </div>
                                    <a href="javascript:void(0);" class="text-body"><i data-feather="copy" class="font-medium-5"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                                    <div class="role-heading">
                                        <h4 class="fw-bolder">Precio por habitaciones</h4>
                                        <a href="/rooms-price" class="role-edit-modal">
                                            <small class="fw-bolder">Modifica los precios por tipo de habitaciones</small>
                                        </a>
                                    </div>
                                    <a href="javascript:void(0);" class="text-body"><i data-feather="copy" class="font-medium-5"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Role cards -->
            </div>
        </div>
    </div>

</x-app-layout>
