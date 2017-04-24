@extends('layouts.app')

@section('aquarium')
<li class="addAquariumMargin">
    <form method="GET" action="/aquarium/view/{{$fish->tank_id}}">
        <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Back'>
    </form>
</li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h1 class='panel-heading text-center'>{{$fish->name}}</h1>
                <div class="panel-body">
                    <div class="col-lg-6 centerText">
                        @if($fish->image)
                        <img src="{{$fish->image}}" title="{{$fish->name}}" class="pictureBorder" />
                        @else
                        <img src="/images/noimage.png" title="No Picture" class='pictureBorder'/>
                        @endif
                    </div>
                    <div class="col-lg-6 centerText">
                        <table>
                            <tr>
                                <td class="aquarium-detail-name"><b>Name:</b></td>
                                <td class="aquarium-detail-value">{{$fish->name}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Type:</b></td>
                                <td class="aquarium-detail-value">{{$fish->type}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Care Level:</b></td>
                                <td class="aquarium-detail-value">{{$fish->care_level}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Temperament:</b></td>
                                <td class="aquarium-detail-value">{{$fish->temperament}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Reef Safe:</b></td>
                                <td class="aquarium-detail-value">{{$fish->reef_compatible}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Date Added:</b></td>
                                <td class="aquarium-detail-value">{{ date('F d, Y', strtotime($fish->created_at)) }}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Last Update:</b></td>
                                <td class="aquarium-detail-value">{{ date('F d, Y', strtotime($fish->updated_at)) }}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Notes:</b></td>
                                <td class="aquarium-detail-value">{{$fish->notes}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name">
                                    <form method="GET" action="/fish/edit/{{$fish->id}}" class="btn-edit-aquarium">
                                        <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Edit'>
                                    </form>
                                </td>
                                <td class="aquarium-detail-value">
                                    <form method="POST" action="/fish/delete/{{$fish->id}}" >
                                        {{ csrf_field() }}
                                        <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Delete'>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection