@extends('layouts.app')

@section('aquarium')
    <li class="addAquariumMargin">
        <form method="GET" action="/aquarium/add/{{Auth::user()->id}}">
            <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Add Aquarium'>
        </form>
    </li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h1 class="panel-heading centerText">{{ Auth::user()->name }}'s Aquarium Dashboard</h1>
                <div class="panel-body">
                    @if(count($aquariums) > 0)
                    @foreach($aquariums as $aquarium)
                        <div class="col-lg-6 centerText">
                            @if($aquarium->image)
                                <img src="{{$aquarium->image}}" title="{{$aquarium->name}}" class="pictureBorder" />
                            @else
                                <img src="/images/noimage.png" title="No Picture" class='pictureBorder'/>
                            @endif
                            <div class="col">
                                <div class="row"><b>Name:</b> {{$aquarium->name}} </div>
                                <div class="row"><b>Size:</b> {{$aquarium->size}} Gallons</div>
                                <div class="row"><b>Type:</b> {{$aquarium->type}}</div>
                                <div class="row">
                                    <form method="GET" action="/aquarium/view/{{$aquarium->id}}">
                                        <input type='submit' class='btn btn-primary btn-aquarium-padding' value='View Details'>
                                    </form>
                                </div>
                            </div>
                            <br /><br />
                        </div>
                    @endforeach
                    @else
                        <div class="col centerText">
                            <p>You have no aquariums added to the site.  Select "Add Aquarium" to add your first aquarium.</p>
                        </div>
                    @endif
                    <div class="col-md-12 centerText">
                        <form method="GET" action="/aquarium/add/{{Auth::user()->id}}">
                            <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Add Aquarium'>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
