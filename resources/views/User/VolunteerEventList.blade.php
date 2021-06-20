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
                            <h4>Volunteer Event List</h4>
                            <hr>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Volunteer Event Serial No.</th>
                                <th>Volunteer Event Name</th>
                                <th>Organization Name</th>
                                <th>   </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>ABC</td>
                                <td>A organization</td>
                                <td><a href="/user/applyVolunteerEvent" class="btn btn-success">Apply</a></td>
                            
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>DEF</td>
                                <td>B organization</td>
                                <td><a href="/user/applyVolunteerEvent" class="btn btn-success">Apply</a></td>
                                
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