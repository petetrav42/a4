@extends('layouts.app')

@section('aquarium')
<li><a href="#"><img src="images/addAquarium.png" alt="Add Aquarium"></a></li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <h1 class="panel-heading centerText">{{ Auth::user()->name }}'s Aquarium Dashboard</h1>


                <div class="panel-body">
                    This will be the main page that will display all the aquariums that the user has.

                    @foreach($aquariums as $aquarium)
                        <img src="{{$aquarium->image}}" title="{{$aquarium->name}}" />
                        <p>{{$aquarium->name}}</p>
                        <p>{{$aquarium->size}}</p>
                    <p>{{$aquarium->type}}</p>

                    <p>{{$aquarium->created_at}}</p>
                    <p>{{$aquarium->notes}}</p>
                    <ul>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('view-aquarium').submit();">
                                View
                            </a>

                            <form id="view-aquarium" action="{{ route('/aquarium') }}" method="GET" style="display: none;">

                            </form>
                        </li>
                    </ul>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
