@extends('Layout.app')

@section('body')

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    @include('Layout.AdminMenu')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users list start -->
                <section class="users-list-wrapper">
                    <div class="users-list-filter">
                        @if(session()->has('error') && !session()->get('error'))
                        <div class="alert alert-success alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="d-flex align-items-center">
                                <i class="bx bx-like"></i>
                                <span>
                                    {{ session()->get('message') }}
                                </span>
                            </div>
                        </div>
                        @endif
                        @if(session()->has('error') && session()->get('error'))
                        <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="d-flex align-items-center">
                                <i class="bx bx-error"></i>
                                <span>
                                    {{ session()->get('message') }}
                                </span>
                            </div>
                        </div>
                        @endif
                        <div class="card">
                            <img src="{{asset('/images/pages/giphy.gif')}}" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-thumbnail mx-auto shadow-sm rounded" alt="...">
                            <div class="card-header">
                                <h4 class="card-title">Create Volunteer Event</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="#" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-lg-12">
                                                <input type="text" class="form-control" name="vevent_name" placeholder="Event Name" required>
                                            </div>
                                            
                                             <div class="col-12 col-sm-12" style="margin-top:10px">
                                                <fieldset class="form-group">
                                                    <textarea class="form-control" name="vevent_details" id="basicTextarea" rows="3" placeholder="Details" required></textarea>
                                                </fieldset>
                                            </div>

                                            <div class="col-12 col-sm-12 col-lg-6 mb-1" style="margin-top:10px">
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="datetime-local" name="start_date"  class="form-control" id="#" placeholder="Start Date" autocomplete="off" required>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-sm-12 col-lg-6" style="margin-top:10px">
                                                <input type="number" class="form-control" name="vevent_Time" placeholder="Time" required>
                                            </div>
                                            <div class="col-12 col-sm-12 col-lg-12" style="margin-top:10px">
                                                <input type="number" class="form-control" name="vevent_recuiredVol" placeholder="Recuired Volunteer" required>
                                            </div>
                                           <div class="col-12 col-sm-12 col-lg-6" style="margin-top:10px">
                                                <input type="number" class="form-control" name="vevent_venue" placeholder="Venue" required>
                                            </div>
                                            <div class="col-12 col-sm-12" style="margin-top:10px">
                                                <fieldset class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="promo_image">
                                                        <label class="custom-file-label" for="inputGroupFile02">Choose Event image</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            
                                            <div class="col-12 col-sm-12" style="margin-top: 10px">
                                                <button type="submit" class="btn btn-block btn-success glow">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users list ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('Layout.footer')

    @include('Layout.scripts')

</body>
@endsection