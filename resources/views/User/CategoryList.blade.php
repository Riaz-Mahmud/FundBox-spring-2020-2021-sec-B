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
                            <h4>CategoryList</h4>
                            <hr>
                        </div>
                    </div>

                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Category Serial No.</th>
                                <th>Category</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>A Category</td>  
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>B Category</td>
                                
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>C Category</td>
                                
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