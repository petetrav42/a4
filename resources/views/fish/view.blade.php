@extends('layouts.app')

@section('aquarium')
<li class="addAquariumMargin">
    <form method="GET" action="/backToAquarium">
        <input type='text' name='tank_id' id='tank_id' value='{{$fish[0]->tank_id}}' style="display: none;">
        <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Back'>
    </form>
</li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h1 class='panel-heading text-center'>{{$fish[0]->name}}</h1>
                <div class="panel-body">
                    <div class="col-lg-6 centerText">
                        @if($fish[0]->image)
                        <img src="{{$fish[0]->image}}" title="{{$fish[0]->name}}" class="pictureBorder" />
                        @else
                        <img src="images/noimage.png" title="No Picture" class='pictureBorder'/>
                        @endif
                    </div>
                    <div class="col-lg-6 centerText">
                        <table>
                            <tr>
                                <td class="aquarium-detail-name"><b>Name:</b></td>
                                <td class="aquarium-detail-value">{{$fish[0]->name}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Type:</b></td>
                                <td class="aquarium-detail-value">{{$fish[0]->type}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Care Level:</b></td>
                                <td class="aquarium-detail-value">{{$fish[0]->care_level}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Temperament:</b></td>
                                <td class="aquarium-detail-value">{{$fish[0]->temperament}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Reef Safe:</b></td>
                                <td class="aquarium-detail-value">{{$fish[0]->reef_compatible}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Date Added:</b></td>
                                <td class="aquarium-detail-value">{{$fish[0]->created_at}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Last Update:</b></td>
                                <td class="aquarium-detail-value">{{$fish[0]->updated_at}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name"><b>Notes:</b></td>
                                <td class="aquarium-detail-value">{{$fish[0]->notes}}</td>
                            </tr>
                            <tr>
                                <td class="aquarium-detail-name">
                                    <form method="GET" action="/editFish" class="btn-edit-aquarium">
                                        <input type='text' name='editFish' id='editFish' value='{{$fish[0]->id}}' style="display: none;">
                                        <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Edit Fish'>
                                    </form>
                                </td>
                                <td class="aquarium-detail-value">
                                    <form method="GET" action="/deleteFish" >
                                        <input type='text' name='deleteFish' id='deleteFish' value='{{$fish[0]->id}}' style="display: none;">
                                        <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Delete Fish'>
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