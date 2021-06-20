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
                            <h4>Donation</h4>
                            <hr>
                        </div>
                    </div>

                    <form>

                        <div class="row">
                            <div class="col-12 mt-1 mb-2">
                                <label for="formGroupExampleInput" class="form-label"> <b>Amount:</b></label>
                                <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Enter your amount number here...">
                            </div>
                        </div>


                        <div class="row form-floating" >
                            <div class="col-12 mt-1 mb-2">
                                <label for="formGroupExampleInput" class="form-label"> <b>Reason:</b></label>
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            </div>
                        </div>

                        <div class="row form-floating" >
                            <div class="col-12 mt-1 mb-2">
                                <label for="formGroupExampleInput" class="form-label"> <b>Do you want to hide your donation information from other users?</b></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row form-floating">
                            <div class="col-12 mt-1 mb-2">
                            <button type="submit" class="btn btn-outline-success">Done</button>
                            </div>
                        </div>

                    </form>
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