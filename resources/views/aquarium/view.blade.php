@extends('layouts.app')

@section('heading')
    {{$aquarium->name}}
@endsection

@section('back')
    href="{{ url('/') }}"
@endsection

@section('buttons')
    <li class="addAquariumMargin">
        <a class="btn btn-primary btn-aquarium-padding" href="{{ url('/fish/add/' . $aquarium->id) }}">Add Fish</a>
    </li>
    @if($aquarium->type == 'Saltwater')
        <li class="addAquariumMargin">
            <a class="btn btn-primary btn-aquarium-padding" href="{{ url('/coral/add/' . $aquarium->id) }}">Add Coral</a>
        </li>
    @endif
@endsection

@section('popup')
    <!--Using sweet alert component-->
    <script>
        function deleteAquarium(name) {
            swal({
                title: "Confirm Delete",
                text: "Are you sure that you want to delete your " + name + "? This will also remove associated fish and corals.",
                type: "error", //this isnt an error but wanted to error image instead of warn.
                showCancelButton: true,
                closeOnConfirm: false,
                confirmButtonText: "Delete",
                confirmButtonColor: "red"
            }, function() {
                $("#deleteAquarium").submit();
            });
        }
    </script>
@endsection

@section('content')
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
                <td class="aquarium-detail-value">{{ date('F d, Y @ H:i:s', strtotime($aquarium->created_at)) }}</td>
            </tr>
            <tr>
                <td class="aquarium-detail-name"><b>Last Updated:</b></td>
                <td class="aquarium-detail-value">{{ date('F d, Y @ H:i:s', strtotime($aquarium->updated_at)) }}</td>
            </tr>
            <tr>
                <td class="aquarium-detail-name"><b>Notes:</b></td>
                <td class="aquarium-detail-value">{{$aquarium->notes}}</td>
            </tr>
            <tr>
                <td class="aquarium-detail-name">
                    <a class="btn btn-primary btn-aquarium-padding" href="{{ url('/aquarium/edit/' . $aquarium->id) }}">Edit</a>
                </td>
                <td class="aquarium-detail-value">
                    <a class="btn btn-primary btn-aquarium-padding" onclick="deleteAquarium('{{ $aquarium->name }}')">Delete</a>
                    <form id="deleteAquarium" class="delete" method="POST" action="/aquarium/delete/{{$aquarium->id}}" >
                        {{ csrf_field() }}
                    </form>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-lg-12 centerText borderTop">
        <h2>Fish</h2>
    </div>
    @if(count($fishes) > 0)
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
                <a class="btn btn-primary btn-aquarium-padding" href="{{ url('/fish/view/' . $fish->id) }}">View Details</a>
                <br /><br />
            </div>
        @endforeach
    @else
        <div class="col-lg-12 centerText">
            <p>You have no fish added to this aquarium.  Select "Add Fish" to add your first fish.</p>
            <a class="btn btn-primary btn-aquarium-padding" href="{{ url('/fish/add/' . $aquarium->id) }}">Add Fish</a>
        </div>
    @endif
    @if($aquarium->type == 'Saltwater')
        <div class="col-lg-12 centerText borderTop">
            <h2>Coral</h2>
        </div>
        @if(count($corals) > 0)
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
                    <a class="btn btn-primary btn-aquarium-padding" href="{{ url('/coral/view/' . $coral->id) }}">View Details</a>
                    <br /><br />
                </div>
            @endforeach
        @else
        <div class="col-lg-12 centerText">
            <p>You have no corals added to this aquarium.  Select "Add Coral" to add your first coral.</p>
            <a class="btn btn-primary btn-aquarium-padding" href="{{ url('/coral/add/' . $aquarium->id) }}">Add Coral</a>
        </div>
        @endif
    @endif
@endsection