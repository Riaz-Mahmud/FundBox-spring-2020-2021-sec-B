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
                            <div class="card-header">
                                
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="#" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="row">
                                            <h1 class="container p-3 mb-2 bg-secondary text-white">Volunteer List</h1>
  
    <table class="table table-success table-striped">
   <thead>
      <tr>
        <th>Name</th>
        <th>email</th>
        <th>contact </th>
        <th>assigned event</th>
        <th>Assigned Location</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>john@gmail.com</td>
        <td>01111111111</td>
        <td>ABC</td>
        <td><div class="col-12 col-sm-12 col-lg-5" style="margin-top:10px;">
            <fieldset class="form-group">
                     <select name="org_type" class="form-control" id="basicSelect" required>
                             <option disabled selected>Select Type</option>
                            <option value="1">Blood donation</option>
                             <option value="2">Medical</option>
                              <option value="2">Social</option>
                                                        
                         </select>
                         </fieldset>
               </div></td>
        <td>
             <button type="submit" data-toggle="modal" data-target="#updateModal" class="btn btn-info glow" onclick="updateEvent()">Edit</button>
             <button type="submit" id="deleteBtn" class="btn btn-danger glow" style="margin-top: 3px"  onclick="deleteEvent()">Delete</button>
         </td>
      </tr>
      <tr>
        <td>Monica</td>
        <td>Monica@gmail.com</td>
        <td>02222222222</td>
        <td>XYZ</td>
        <td><div class="col-12 col-sm-12 col-lg-5" style="margin-top:10px;">
                                                <fieldset class="form-group">
                                                    <select name="org_type" class="form-control" id="basicSelect" required>
                                                        <option disabled selected>Select Type</option>
                                                        <option value="1">Blood donation</option>
                                                        <option value="2">Medical</option>
                                                        <option value="2">Social</option>
                                                        
                                                    </select>
                                                </fieldset>
                                            </div></td>
         <td>
             <button type="submit" data-toggle="modal" data-target="#updateModal" class="btn btn-info glow" onclick="updateEvent()">Edit</button>
             <button type="submit" id="deleteBtn" class="btn btn-danger glow" style="margin-top: 3px"  onclick="deleteEvent()">Delete</button>
         </td>
    </tr>
      <tr>
        <td>Gilfoyl</td>
        <td>Gil@gmail.com</td>
        <td>03333333333</td>
        <td>UVW</td>
        <td><div class="col-12 col-sm-12 col-lg-5" style="margin-top:10px;">
                                                <fieldset class="form-group">
                                                    <select name="org_type" class="form-control" id="basicSelect" required>
                                                        <option disabled selected>Select Type</option>
                                                        <option value="1">Blood donation</option>
                                                        <option value="2">Medical</option>
                                                        <option value="2">Social</option>
                                                        
                                                    </select>
                                                </fieldset>
                                            </div></td>
            <td>
             <button type="submit" data-toggle="modal" data-target="#updateModal" class="btn btn-info glow" onclick="updateEvent()">Edit</button>
             <button type="submit" id="deleteBtn" class="btn btn-danger glow" style="margin-top: 3px"  onclick="deleteEvent()">Delete</button>
         </td>                                 
      </tr>
            <tr>
        <td>Jing</td>
        <td>Jing@gmail.com</td>
        <td>0999999999</td>
        <td>PTO</td>
        <td><div class="col-12 col-sm-12 col-lg-5" style="margin-top:10px;">
                                                <fieldset class="form-group">
                                                    <select name="org_type" class="form-control" id="basicSelect" required>
                                                        <option disabled selected>Select Type</option>
                                                        <option value="1">Blood donation</option>
                                                        <option value="2">Medical</option>
                                                        <option value="2">Social</option>
                                                        
                                                    </select>
                                                </fieldset>
                                            </div></td>
                                         <td>
             <button type="submit" data-toggle="modal" data-target="#updateModal" class="btn btn-info glow" onclick="updateEvent()">Edit</button>
             <button type="submit" id="deleteBtn" class="btn btn-danger glow" style="margin-top: 3px"  onclick="deleteEvent()">Delete</button>
         </td>
                                        </tr>
    </tbody>
</table>
</table>

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