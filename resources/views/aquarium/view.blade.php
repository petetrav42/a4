@extends('layouts.app')

@section('aquarium')
<li class="addAquariumMargin">
    <form method="GET" action="/fish/add/{{$aquarium->id}}">
        <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Add Fish'>
    </form>
</li>
@if($aquarium->type == 'Saltwater')
<li class="addAquariumMargin">
    <form method="GET" action="/coral/add/{{$aquarium->id}}">
        <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Add Coral'>
    </form>
</li>
@endif
<li class="addAquariumMargin">
    <form method="GET" action="/">
        <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Back'>
    </form>
</li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h1 class='panel-heading text-center'>{{$aquarium->name}}</h1>
                <div class="panel-body">
                    <div class="col-lg-6 centerText">
                        @if($aquarium->image)
                        <img src="{{$aquarium->image}}" title="{{$aquarium->name}}" class="pictureBorder" />
                        @else
                        <img src="/images/noimage.png" title="No Picture" class='pictureBorder'/>
                        @endif
                    </div>
                    <div class="col-lg-6 centerText">
                        <table>
                            <tr>
                                <td class="aquarium-detail-name"><b>Name:</b></td>
                                <td class="aquarium-detail-value">{{$aquarium->name}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Size:</b></td>
                                <td class="aquarium-detail-value">{{$aquarium->size}} Gallons</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Type:</b></td>
                                <td class="aquarium-detail-value">{{$aquarium->type}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Date Added:</b></td>
                                <td class="aquarium-detail-value">{{ date('F d, Y', strtotime($aquarium->created_at)) }}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Last Updated:</b></td>
                                <td class="aquarium-detail-value">{{ date('F d, Y', strtotime($aquarium->updated_at)) }}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Notes:</b></td>
                                <td class="aquarium-detail-value">{{$aquarium->notes}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name">
                                    <form method="GET" action="/aquarium/edit/{{$aquarium->id}}" class="btn-edit-aquarium">
                                        <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Edit'>
                                    </form>
                                </td>
                                <td class="aquarium-detail-value">
                                    <form method="POST" action="/aquarium/delete/{{$aquarium->id}}" >
                                        {{ csrf_field() }}
                                        <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Delete'>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-12 centerText borderTop">
                        <h2>Fish</h2>
                    </div>
                    @if($fish_count)
                        @foreach($fishes as $fish)
                            <div class="col-lg-6 centerText">
                                @if($fish->image)
                                    <img src="{{$fish->image}}" title="{{$fish->name}}" class="pictureBorder" />
                                @else
                                    <img src="/images/noimage.png" title="No Picture" class='pictureBorder'/>
                                @endif
                                <div class="col">
                                    <div class="row"><b>Name:</b> {{$fish->name}} </div>
                                </div>
                                <form method="GET" action="/fish/view/{{$fish->id}}">
                                    <input type='submit' class='btn btn-primary btn-aquarium-padding' value='View Details'>
                                </form>
                                <br /><br />
                            </div>
                        @endforeach
                    @else
                    <div class="col-lg-12 centerText">
                        <p>You have no fish added to this aquarium.  Select "Add Fish" to add your first fish.</p>
                        <form method="GET" action="/fish/add/{{$aquarium->id}}">
                            <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Add Fish'>
                        </form>
                    </div>
                    @endif
                    @if($aquarium->type == 'Saltwater')
                        <div class="col-lg-12 centerText borderTop">
                            <h2>Coral</h2>
                        </div>
                        @if($coral_count)
                            @foreach($corals as $coral)
                                <div class="col-lg-6 centerText">
                                    @if($coral->image)
                                        <img src="{{$coral->image}}" title="{{$coral->name}}" class="pictureBorder" />
                                    @else
                                        <img src="/images/noimage.png" title="No Picture" class='pictureBorder'/>
                                    @endif
                                    <div class="col">
                                        <div class="row"><b>Name:</b> {{$coral->name}} </div>
                                    </div>
                                    <form method="GET" action="/coral/view/{{$coral->id}}">
                                        <input type='submit' class='btn btn-primary btn-aquarium-padding' value='View Details'>
                                    </form>
                                    <br /><br />
                                </div>
                            @endforeach
                        @else
                        <div class="col-lg-12 centerText">
                            <p>You have no corals added to this aquarium.  Select "Add Coral" to add your first coral.</p>
                            <form method="GET" action="/coral/add/{{$aquarium->id}}">
                                <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Add Coral'>
                            </form>
                        </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection