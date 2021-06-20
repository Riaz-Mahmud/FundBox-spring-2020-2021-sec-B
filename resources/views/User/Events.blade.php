@extends('Layout.app')

@section('body')

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    @include('Layout.UserMenu')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <section id="widgets-Statistics">

                    <div class="row">
                        <div class="col-10 mt-1 mb-2">
                        <input type="text" class="form-control" id="inputAddress" placeholder="Search event here...">
                        </div>

                        <div class="col-2 mt-1 mb-2">
                        <button type="submit" class="btn btn-outline-success">Search</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mt-1 mb-2">
                        <form >
                            <select class="form-select form-control" aria-label="Default select example">
                                <option selected>Category</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            
                        
                        </from>
                                                
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 mt-1 mb-2">
                            <h4>Events Based on Category</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                            <div class="card text-center">
                                <div class="card-content">
                                <img src="https://image.shutterstock.com/image-vector/events-colorful-typography-banner-600w-1356206768.jpg" class="card-img-top" alt="...">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto mb-50">
                                            <i class="bx bx-receipt font-medium-5"></i>
                                        </div>
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <p class="card-text"><b>65% funded</b></p>
                                        <a href="/user/donation" class="btn btn-primary">Donate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                            <div class="card text-center">
                                <div class="card-content">
                                <img src="https://image.shutterstock.com/image-vector/events-colorful-typography-banner-600w-1356206768.jpg" class="card-img-top" alt="...">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto mb-50">
                                            <i class="bx bx-receipt font-medium-5"></i>
                                        </div>
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <p class="card-text"><b>80% funded</b></p>
                                        <a href="/user/donation" class="btn btn-primary">Donate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                            <div class="card text-center">
                                <div class="card-content">
                                <img src="https://image.shutterstock.com/image-vector/events-colorful-typography-banner-600w-1356206768.jpg" class="card-img-top" alt="...">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto mb-50">
                                            <i class="bx bx-receipt font-medium-5"></i>
                                        </div>
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <p class="card-text"><b>95% funded</b></p>
                                        <a href="/user/donation" class="btn btn-primary">Donate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                            <div class="card text-center">
                                <div class="card-content">
                                <img src="https://image.shutterstock.com/image-vector/events-colorful-typography-banner-600w-1356206768.jpg" class="card-img-top" alt="...">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto mb-50">
                                            <i class="bx bx-receipt font-medium-5"></i>
                                        </div>
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <p class="card-text"><b>75% funded</b></p>
                                        <a href="/user/donation" class="btn btn-primary">Donate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
              
            </div>
        </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('Layout.footer')

    @include('Layout.scripts')
</body>
@endsection