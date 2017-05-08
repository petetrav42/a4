@extends('layouts.app')

@section('buttons')
<li class="addAquariumMargin">
    <a class="btn btn-primary btn-aquarium-padding" href="{{ url('/aquarium/add/' . Auth::user()->id) }}">Add Aquarium</a>
</li>
@endsection

@section('heading')
    {{ Auth::user()->name }}'s Aquarium Dashboard
@endsection

@section('content')
    @if(count($aquariums) > 0)
        @foreach($aquariums as $aquarium)
            <div class="col-lg-6">
                @if($aquarium->image)
                    <img src="{{$aquarium->image}}" title="{{$aquarium->name}}" alt="{{$aquarium->name}}" class="pictureBorder" />
                @else
                    <img src="/images/noimage.png" title="No Picture" alt="{{$aquarium->name}}" class='pictureBorder'/>
                @endif
                <div class="col">
                    <div class="row"><b>Name:</b> {{$aquarium->name}} </div>
                    <div class="row"><b>Size:</b> {{$aquarium->size}} Gallons</div>
                    <div class="row"><b>Type:</b> {{$aquarium->type}}</div>
                    <div class="row">
                        <a class="btn btn-primary btn-aquarium-padding" href="{{ url('/aquarium/view/' . $aquarium->id) }}">View Details</a>
                    </div>
                </div>
                <br /><br />
            </div>
        @endforeach
    @else
        <div>
            <p>You have no aquariums added to the site.  Select "Add Aquarium" to add your first aquarium.</p>
            <a class="btn btn-primary btn-aquarium-padding" href="{{ url('/aquarium/add/' . Auth::user()->id) }}">Add Aquarium</a>
        </div>
    @endif
@endsection
