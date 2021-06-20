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
                            <h4>Transition Details</h4>
                            <hr>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Organization Serial No.</th>
                                <th>Organization Name</th>
                                <th>Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>A organization</td>
                                <td><a href="/user/organizationDetails" class="btn btn-success">Details</a></td>
                            
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>B organization</td>
                                <td><a href="/user/organizationDetails" class="btn btn-success">Details</a></td>
                                
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>C organization</td>
                                <td><a href="/user/organizationDetails" class="btn btn-success">Details</a></td>
                            
                            </tr>
                            </tbody>
                        </table>
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