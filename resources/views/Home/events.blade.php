@extends('Layout.masterlayout')
@section('content')
<div class="event" style="background-color:#F2F4F4; height:200px; ">
    <div class="container">
        <h1 class="text-center" style="padding-top:70px;">Events</h1>
    </div>
</div>
<div class="event">
    <div class="container">
        <div class="row" style="padding-bottom:30px;">
            <div class="col-12" >
                <h2 class="text-center" style="margin:30px 0px;">All Events</h2>
                <div class="row">
                @foreach($allEvents as $key => $events)
                    <div class="col-4">
                        <div class="card" style="width: 20rem;margin-top:10px;">
                            @if($events->image)
                                <?php if (file_exists("../public".$events->image)){ ?>
                                    <img class="card-img-top" style="height:13.4rem;" src="{{asset($events->image)}}" alt="Card image cap">
                                <?php } else{ ?>
                                    <img class="card-img-top" style="height:13.4rem;" src="{{asset('/B0eS.gif')}}" alt="Card image cap">
                                <?php } ?>
                            @else
                                <img class="card-img-top" style="height:13.4rem;" src="{{asset('/B0eS.gif')}}" alt="Card image cap">
                            @endif
                            <div class="card-body" style="text-align: center;">
                                <h5 class="card-title" style="height: 80px;overflow: hidden;text-overflow: ellipsis;">{{$events->event_name}}</h5>
                                <p class="card-text" style="height: 80px;width: 250px;overflow: hidden;text-overflow: ellipsis;">{{$events->details}}</p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                                </div>
                                <h6 style="margin-top:10px;"> <b>৳ 6000 raised</b> of ৳ 10000</h6>
                                <a href="#" class="btn btn-primary">Donate Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12 col-12 overflow-auto">
                        {!! $allEvents->links() !!}
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="event" style="background-color:#F2F4F4;">
    <div class="container">
        <div class="row" style="padding-bottom:30px;">
            <div class="col-12" >
                <h2 class="text-center" style="margin:30px 0px;">Volunteer Events</h2>
                <div class="row">
                @foreach($volEvents as $key => $vEvents)
                    <div class="col-4">
                        <div class="card" style="width: 20rem;margin-top:10px;">
                            @if($vEvents->image)
                                <?php if (file_exists("../public".$vEvents->image)){ ?>
                                    <img class="card-img-top" style="height:13.4rem;" src="{{asset($vEvents->image)}}" alt="Card image cap">
                                <?php } else{ ?>
                                    <img class="card-img-top" style="height:13.4rem;" src="{{asset('/B0eS.gif')}}" alt="Card image cap">
                                <?php } ?>
                            @else
                                <img class="card-img-top" style="height:13.4rem;" src="{{asset('/B0eS.gif')}}" alt="Card image cap">
                            @endif
                            <div class="card-body" style="text-align: center;">
                                <h5 class="card-title" style="height: 80px;overflow: hidden;text-overflow: ellipsis;">{{$events->event_name}}</h5>
                                <p class="card-text" style="height: 80px;width: 250px;overflow: hidden;text-overflow: ellipsis;">{{$events->details}}</p>
                                <a href="#" class="btn btn-primary">Apply</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection