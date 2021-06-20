@extends('Layout.app')

@section('body')

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    @include('Layout.UserMenu')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <section id="widgets-Statistics">
                    <div class="row">
                        <div class="col-12 mt-1 mb-2">
                            <h4>Organization Details</h4>
                            <hr>
                        </div>
                    </div>

                    <div class="container">
                           
                            <h3 > Organization name from session variable </h3>
                        <br><br>
                            <img src="https://www.paychex.com/sites/default/files/styles/1200wide/public/image/2020-09/improving-your-business-organization-in-2015.jpg" class="mx-auto d-block"  class="img-thumbnail" alt="Organization picture" max-width="800" height="300" > 
                            
                            <div class="col-12">
                            <label for="inputAddress" class="form-label"><b>About</b></label>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, hic natus placeat odit sequi quis. Ipsum quis molestias reiciendis natus!</p>
                        </div>

                            <div class="col-12 col text-center">
                                <button type="submit" class="btn btn-outline-success" >Follow</button>
                                <button type="submit" class="btn btn-outline-success" >Event List</button>
                                
                            </div>
                    </div> 
    


 

 
                </section>
            </div>
        </div>
        </div>
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('Layout.footer')

    @include('Layout.scripts')
</body>
@endsection