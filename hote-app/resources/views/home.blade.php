@extends('layouts.home')
@section('content')
  <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1> Hotel La Sinventura</h1>
                        <p>Un escape a Antigua Guatemala ideal para pasar tus vacaciones y disfrutar de la ciudad en el mejor lugar.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3>Busqueda de disponibilidad</h3>
                        @if($errors->any())
                             <div class="alert alert-danger">
                                  <ul class="list-unstyled">
                                         @foreach ($errors->all() as $error)
                                               <li>{{ $error }}</li>
                                         @endforeach
                                  </ul>
                              </div>
                        @endif
                        <form method="POST" action="{{ route('buscador.store') }}">
                            @csrf
                            <div class="check-date">
                                <label for="inicio">Check In:</label>
                                <input type="date" id="inicio" name="inicio">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="fin">Check Out:</label>
                                <input type="date" id="fin" name="fin">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="select-option">
                                <label for="personas">Personas:</label>
                                <input type="number" name="personas">
                            </div>
                            <button type="submit">Consultar disponibilidad</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="img/hero/hero-1.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-3.jpg"></div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>Nosotros</span>
                            <h2>El Lugar perfecto <br />Para un descanso en Antigua Guatemala</h2>
                        </div>
                        <p class="f-para">Somos un hotel localizado en Antigua Guatemala que se caracteriza por el mejor servicio y las instalaciones mas completas en la regi&oacute;n.</p>
                        <a href="#" class="primary-btn about-btn">Leer rese&ntilde;as</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="img/about/about-1.jpg" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="img/about/about-2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->
@endsection