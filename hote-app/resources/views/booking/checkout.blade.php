<x-app-layout>
     <!-- BEGIN: Content-->
    <div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Checkout</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Inicio</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div id="place-order" class="list-view product-checkout">
                    <div class="checkout-items">
                        <div class="card ecommerce-card">
                            <div class="item-img">
                                <a href="app-ecommerce-details.html">
                                    <img src="{{  asset('img/habitacion.jpg') }}" alt="img-placeholder" />
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="item-name">
                                    <h6 class="mb-0"><a href="app-ecommerce-details.html" class="text-body">Habitacion {{ $capacidad }}</a></h6>
                                    <span class="item-company">En nuestra mejor hubicacion de  <a href="#" class="company-name">Hotel LaSinventura</a></span>
                                    <div class="item-rating">
                                        <ul class="unstyled-list list-inline">
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="text-success mb-1">Disponible</span>
                                <span class="delivery-date text-muted">Tu reservaci&oacute;n expirara en 5 minutos</span>
                                <span class="text-success">Tu precio es el mejor en la zona</span>
                            </div>
                            <div class="item-options text-center">
                                <div class="item-wrapper">
                                    <div class="item-cost">
                                        <h4 class="item-price">${{ $precio }}</h4>
                                        <p class="card-text shipping">
                                            <span class="badge rounded-pill badge-light-success">Disponible</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="checkout-options">
                        <div class="card">
                            <div class="card-body">
                                <label class="section-label form-label mb-1">Detalles de tu reserva</label>
                                <hr />
                                <div class="price-details">
                                    <h6 class="price-title">Precio por habitaci&oacute;n</h6>
                                    <ul class="list-unstyled">
                                        <li class="price-detail">
                                            <div class="detail-title">Check-in</div>
                                            <div class="detail-amt">{{  $inicio }}</div>
                                        </li>
                                        <li class="price-detail">
                                            <div class="detail-title">Check-out</div>
                                            <div class="detail-amt">{{  $fin }}</div>
                                        </li>
                                        <li class="price-detail">
                                            <div class="detail-title">Tipo de habitaci&oacute;n</div>
                                            <div class="detail-amt">{{ $capacidad }}</div>
                                        </li>
                                        <li class="price-detail">
                                            <div class="detail-title">Personas</div>
                                            <a href="#" class="detail-amt text-primary">{{ $personas }}</a>
                                        </li>
                                    </ul>
                                    <hr />
                                    <ul class="list-unstyled">
                                        <li class="price-detail">
                                            <div class="detail-title detail-total">Total</div>
                                            <div class="detail-amt fw-bolder">${{ $total }}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row col-md-12">
                    <div class="col-md-6" id="checkout-address">
                        <div class="card">
                            <div class="card-header flex-column align-items-start">
                                <h4 class="card-title">Informaci&oacute;n del  hu&eacute;sped</h4>
                                <p class="card-text text-muted mt-25">Para completar la reservaci&oacute;n por favor ingresa la siguiente informacion</p>
                            </div>
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
                                <form class="form form-horizontal" method="POST" action="{{ route('reservation.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-2">
                                                <label class="form-label" cfor="checkout-name">Nombre:</label>
                                                <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre" @auth value="{{ Auth::user()->name }}" @endauth />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-2">
                                                <label class="form-label" cfor="apellidos">Apellidos:</label>
                                                <input type="text" id="apellidos" class="form-control" name="apellidos" placeholder="Apellidos" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-2">
                                                <label class="form-label" cfor="correo">Correo:</label>
                                                <input type="text" id="correo" class="form-control" name="correo" placeholder="Correo electronico" @auth value="{{ Auth::user()->email }}" @endauth/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-2">
                                                <label class="form-label" cfor="checkout-landmark">Celular:</label>
                                                <input type="text" id="celular" class="form-control" name="celular" placeholder="Celular" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-2">
                                                <label class="form-label" cfor="fecha-de-nacimiento">Fecha de nacimiento:</label>
                                                <input type="date" id="fecha-de-nacimiento" class="form-control" name="fecha-de-nacimiento" placeholder="Fecha de nacimiento" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-2">
                                                <label class="form-label" cfor="nacionalidad">Nacionalidad:</label>
                                                <input type="text" id="nacionalidad" class="form-control" name="nacionalidad" placeholder="Nacionalidad" />
                                            </div>
                                        </div>
                                        <input type="date" name="inicio" value="{{ $inicio }}" hidden>
                                        <input type="date" name="fin" value="{{ $fin }}" hidden>
                                        <input type="text" name="precio" value="{{ $total }}" hidden>
                                        <input type="text" name="personas" value="{{ $personas }}" hidden>
                                        <input type="text" name="habitacion" value="{{ $numero_habitacion }}" hidden>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary btn-next delivery-address">Realizar reserva</button>
                                            @guest
                                                <a href="/login">
                                                    <button type="submit" class="btn btn-flat-primary waves-effect">Iniciar sesion</button>
                                                </a>
                                            @endguest
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="payment-type">
                            <div class="card">
                                <div class="card-header flex-column align-items-start">
                                    <h4 class="card-title">Payment options</h4>
                                    <p class="card-text text-muted mt-25">Be sure to click on correct payment option</p>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-holder-name my-75">John Doe</h6>
                                    <div class="form-check">
                                        <input type="radio" id="customColorRadio1" name="paymentOptions" class="form-check-input" checked />
                                        <label class="form-check-label" for="customColorRadio1">
                                            US Unlocked Debit Card 12XX XXXX XXXX 0000
                                        </label>
                                    </div>
                                    <div class="customer-cvv mt-1 row row-cols-lg-auto">
                                        <div class="col-3 d-flex align-items-center">
                                            <label class="mb-50 form-label" for="card-holder-cvv">Enter CVV:</label>
                                        </div>
                                        <div class="col-4 p-0">
                                            <input type="password" class="form-control mb-50 input-cvv" name="input-cvv" id="card-holder-cvv" />
                                        </div>
                                    </div>
                                    <hr class="my-2" />
                                    <ul class="other-payment-options list-unstyled">
                                        <li class="py-50">
                                            <div class="form-check">
                                                <input type="radio" id="customColorRadio2" name="paymentOptions" class="form-check-input" />
                                                <label class="form-check-label" for="customColorRadio2"> Credit / Debit / ATM Card </label>
                                            </div>
                                        </li>
                                        <li class="py-50">
                                            <div class="form-check">
                                                <input type="radio" id="customColorRadio3" name="paymentOptions" class="form-check-input" />
                                                <label class="form-check-label" for="customColorRadio3"> Net Banking </label>
                                            </div>
                                        </li>
                                        <li class="py-50">
                                            <div class="form-check">
                                                <input type="radio" id="customColorRadio4" name="paymentOptions" class="form-check-input" />
                                                <label class="form-check-label" for="customColorRadio4"> EMI (Easy Installment) </label>
                                            </div>
                                        </li>
                                        <li class="py-50">
                                            <div class="form-check">
                                                <input type="radio" id="customColorRadio5" name="paymentOptions" class="form-check-input" />
                                                <label class="form-check-label" for="customColorRadio5"> Cash On Delivery </label>
                                            </div>
                                        </li>
                                    </ul>
                                    <hr class="my-2" />
                                    <div class="gift-card mb-25">
                                        <p class="card-text">
                                            <i data-feather="plus-circle" class="me-50 font-medium-5"></i>
                                            <span class="align-middle">Add Gift Card</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>