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
                                <th>Event Id</th>
                                <th>Organization User Id</th>
                                <th>Organization Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>   </th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach ($volunteerEventList as $volunteerEvent)
                            <tr>
                                <td>{{$volunteerEvent['eventId']}}</td>
                                <td>{{$volunteerEvent['user_id']}}</td>
                                <td>{{$volunteerEvent['user_name']}}</td>
                                <td>{{$volunteerEvent['phone']}}</td>
                                <td>{{$volunteerEvent['status']}}</td>
                                <td><a href="/user/organizationDetails" class="btn btn-success">Details</a></td>
                            
                            </tr>
                            @endforeach
                            
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