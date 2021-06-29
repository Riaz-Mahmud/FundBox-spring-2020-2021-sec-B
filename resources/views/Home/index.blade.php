@extends('Layout.masterlayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 style="margin-top : 90px;">Fundraising for the people and causes you care about</h1>
            <h5>Get Start Today</h5>
            <button type="button" class="btn btn-lg btn-primary" disabled>Start Donation</button>
        </div>
        <div class="col-6">
            <img src="/images/pages/undraw_team_work_k80m.png" alt="team width="500" height="500"">
        </div>
    </div>
</div>
<div class="event" style="background-color:#F2F4F4;">
    <div class="container">
        <div class="row" style="padding-bottom:30px;">
            <div class="col-12" >
                <h2 class="text-center" style="margin:30px 0px;">Feature Events</h2>
                <div class="row">
                @foreach($featureEvents as $key => $feaEvent)
                    <div class="col-4">
                        <div class="card" style="width: 20rem;">
                            @if($feaEvent->image)
                            <?php if (file_exists("../public".$feaEvent->image)){ ?>
                                <img class="card-img-top" style="height:13.4rem;" src="{{asset($feaEvent->image)}}" alt="Card image cap">
                            <?php } else{ ?>
                                <img class="card-img-top" style="height:13.4rem;" src="{{asset('/B0eS.gif')}}" alt="Card image cap">
                            <?php } ?>
                            @else
                            <img class="card-img-top" style="height:13.4rem;" src="{{asset('/B0eS.gif')}}" alt="Card image cap">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title" style="height: 80px;overflow: hidden;text-overflow: ellipsis;">{{$feaEvent->event_name}}</h5>
                                <p class="card-text" style="height: 80px;width: 200px;overflow: hidden;text-overflow: ellipsis;">{{$feaEvent->details}}</p>
                                <a href="{{ URL::to('/example2/'.base64_encode($feaEvent->id).'/'.base64_encode($feaEvent->orgId)) }}" class="btn btn-primary">Donate Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="status">
    <div class="container" style="padding-bottom:30px;">
        <h2 class="text-center" style="margin-top:30px;">We will save the world</h2>
        <h6 class="text-center" style="margin-bottom:30px;">We have the strongest community</h6>
        <div class="row">
            <div class="col-4" style="text-align: center;">
                <h2><b>{{$totalVolunteers}}</b></h2>
                <h3>Volunteers</h3>
            </div>
            <div class="col-4" style="text-align: center;">
                <h2><b>{{$totalEvents}}</b></h2>
                <h3>Events</h3>
            </div>
            <div class="col-4" style="text-align: center;">
                <h2><b>{{$totalMoneyCollect}} ৳</b></h2>
                <h3>Total Donation</h3>
            </div>
        </div>
    </div>
</div>

<div class="event" style="background-color:fff; margin: auto;width: 100%;">
    <div >
        <div class="col-12">
        @if($banner->image)
            <?php if (file_exists("../public".$banner->image)){ ?>
                <div class="osahan-slider-item">
                    <img src="{{asset($banner->image)}}" style="height:300px;box-shadow:none !important;object-fit:contain; display: block;margin-left: auto;margin-right: auto;width: 50%;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                </div>
            <?php } else{ ?>
                <div class="osahan-slider-item">
                    <img src="{{asset('/B0eS.gif')}}" style="height:300px;box-shadow:none !important;object-fit:contain; display: block;margin-left: auto;margin-right: auto;width: 50%;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                </div>
            <?php } ?>
        @else
            <div class="osahan-slider-item" >
                <img src="{{asset('/B0eS.gif')}}" style="height:300px;box-shadow:none !important;object-fit:contain; display: block;margin-left: auto;margin-right: auto;width: 50%;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
            </div>
        @endif
        </div>
    </div>
</div>
<div class="event" style="background-color:#F2F4F4;">
    <div class="container">
        <div class="row" style="padding-bottom:30px;">
            <div class="col-12" >
                <h2 class="text-center" style="margin:30px 0px;">Ongoing Events</h2>
                <div class="row">
                    <div class="col-4">
                        <div class="card" style="width: 20rem;">
                            <img class="card-img-top" style="height:13.4rem;" src="../../../images/pages/317233_gettyimages .jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Save Nuhash</h5>
                                <p class="card-text">A blood donation occurs when a person voluntarily has blood drawn and used for transfusions and/or made into biopharmaceutical medications by a process called fractionation</p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                                </div>
                                <h6 style="margin-top:10px;"> <b>৳ 6000 raised</b> of ৳ 10000</h6>

                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card" style="width: 20rem;">
                            <img class="card-img-top" style="height:13.4rem;" src="../../../images/pages/144367-cfmusnbhff-1594704365.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Save the people</h5>
                                <p class="card-text">A blood donation occurs when a person voluntarily has blood drawn and used for transfusions and/or made into biopharmaceutical medications by a process called fractionation</p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                                <h6 style="margin-top:10px;"> <b>৳ 50000 raised</b> of ৳ 200000</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card" style="width: 20rem;">
                            <img class="card-img-top" style="height:13.4rem;" src="../../../images/pages/dc-Cover-s2snl09nju40r1s1d4o2ced504-20170728024517.Medi.jpeg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Education for everyone</h5>
                                <p class="card-text">A blood donation occurs when a person voluntarily has blood drawn and used for transfusions and/or made into biopharmaceutical medications by a process called fractionation</p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                                </div>
                                <h6 style="margin-top:10px;"> <b>৳ 8000 raised</b> of ৳ 10000</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="event">
    <div class="container" style="height:200px; text-align: center; margin-top:100px;">
        <h2>Ready to Join us?</h2>
        <button type="button" class="btn btn-success">Join with Us</button>
    </div>
</div>
@endsection