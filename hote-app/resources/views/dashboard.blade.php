<x-app-layout>
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Tablero</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Ir a HotelLaSinventura.com</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Tablero</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Knowledge base Jumbotron -->
                <section id="knowledge-base-search">
                    <div class="row">
                        <div class="col-12">
                            <div class="card knowledge-base-bg text-center" style="background-image: url('../../../app-assets/images/banner/banner.png')">
                                <div class="card-body">
                                    <h2 class="text-primary">Bienvenido {{ Auth::user()->name }}!</h2>
                                    <p class="card-text mb-2">
                                        <span>En este apartado podras gestionar tus reservaciones, realizar nuevas reservaciones y modificar la informacion en tu perfil</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Knowledge base Jumbotron -->

                <!-- Knowledge base -->
                <section id="knowledge-base-content">
                    <div class="row kb-search-content-info match-height">
                        <!-- sales card -->
                        <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                            <div class="card">
                                <a href="/reservation">
                                    <img src="../../../app-assets/images/illustration/sales.svg" class="card-img-top" alt="knowledge-base-image" />

                                    <div class="card-body text-center">
                                        <h4>Mis Reservaciones</h4>
                                        <p class="text-body mt-1 mb-0">
                                            Consulta tu historial de reservaciones y futuras visitas
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- demand -->
                        <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                            <div class="card">
                                <a href="/">
                                    <img src="../../../app-assets/images/illustration/demand.svg" class="card-img-top" alt="knowledge-base-image" />
                                    <div class="card-body text-center">
                                        <h4>Nueva reservaci&oacute;n</h4>
                                        <p class="text-body mt-1 mb-0">Consulta la disponibilidad de nuestro hotel.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Knowledge base ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
</x-app-layout>
