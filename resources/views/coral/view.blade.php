@extends('layouts.app')

@section('aquarium')
<li class="addAquariumMargin">
    <form method="GET" action="/aquarium/view/{{$coral->tank_id}}">
        <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Back'>
    </form>
</li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h1 class='panel-heading text-center'>{{$coral->name}}</h1>
                <div class="panel-body">
                    <div class="col-lg-6 centerText">
                        @if($coral->image)
                        <img src="{{$coral->image}}" title="{{$coral->name}}" class="pictureBorder" />
                        @else
                        <img src="/images/noimage.png" title="No Picture" class='pictureBorder'/>
                        @endif
                    </div>
                    <div class="col-lg-6 centerText">
                        <table>
                            <tr>
                                <td class="aquarium-detail-name"><b>Name:</b></td>
                                <td class="aquarium-detail-value">{{$coral->name}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Type:</b></td>
                                <td class="aquarium-detail-value">{{$coral->type}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Care Level:</b></td>
                                <td class="aquarium-detail-value">{{$coral->care_level}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Temperament:</b></td>
                                <td class="aquarium-detail-value">{{$coral->temperament}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Lighting:</b></td>
                                <td class="aquarium-detail-value">{{$coral->lighting}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Waterflow:</b></td>
                                <td class="aquarium-detail-value">{{$coral->waterflow}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Date Added:</b></td>
                                <td class="aquarium-detail-value">{{ date('F d, Y', strtotime($coral->created_at)) }}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Last Update:</b></td>
                                <td class="aquarium-detail-value">{{ date('F d, Y', strtotime($coral->updated_at)) }}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Notes:</b></td>
                                <td class="aquarium-detail-value">{{$coral->notes}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name">
                                    <form method="GET" action="/coral/edit/{{$coral->id}}" class="btn-edit-aquarium">
                                        <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Edit'>
                                    </form>
                                </td>
                                <td class="aquarium-detail-value">
                                    <form method="POST" action="/coral/delete/{{$coral->id}}" >
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