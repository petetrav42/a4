@extends('layouts.app')

@section('heading')
    {{$fish->name}}
@endsection

@section('back')
    href="{{ url('/aquarium/view/' . $fish->aquarium_id) }}"
@endsection

@section('popup')
<!--Using sweet alert component-->
<script>
    function deleteFish(name) {
        swal({
            title: "Confirm Delete",
            text: "Are you sure that you want to delete your " + name + "?",
            type: "error", //this isnt an error but wanted to error image instead of warn.
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Delete",
            confirmButtonColor: "red"
        }, function() {
            $("#deleteFish").submit();
        });
    }
</script>
@endsection

@section('content')
    <div class="col-lg-6">
        @if($fish->image)
        <img src="{{$fish->image}}" title="{{$fish->name}}" alt="{{$fish->name}}" class="pictureBorder" />
        @else
        <img src="/images/noimage.png" title="No Picture" alt="{{$fish->name}}" class='pictureBorder'/>
        @endif
    </div>
    <div class="col-lg-6">
        <table>
            <tr>
                <td class="aquarium-detail-name"><b>Name:</b></td>
                <td class="aquarium-detail-value">{{$fish->name}}</td>
            </tr>
            <tr>
                <td class="aquarium-detail-name"><b>Type:</b></td>
                <td class="aquarium-detail-value">{{$fish->fish_type}}</td>
            </tr>
            @if($fish->care)
                <tr>
                    <td class="aquarium-detail-name"><b>Care Level:</b></td>
                    <td class="aquarium-detail-value">{{$fish->care}}</td>
                </tr>
            @endif
            @if($fish->temperament)
                <tr>
                    <td class="aquarium-detail-name"><b>Temperament:</b></td>
                    <td class="aquarium-detail-value">{{$fish->temperament}}</td>
                </tr>
            @endif
            @if($fish->fish_type!='Freshwater' && $fish->reef_compatible)
                <tr>
                    <td class="aquarium-detail-name"><b>Reef Safe:</b></td>
                    <td class="aquarium-detail-value">{{$fish->reef_compatible}}</td>
                </tr>
            @endif
            <tr>
                <td class="aquarium-detail-name"><b>Date Added:</b></td>
                <td class="aquarium-detail-value">{{ date('F d, Y @ H:i:s', strtotime($fish->created_at)) }}</td>
            </tr>
            <tr>
                <td class="aquarium-detail-name"><b>Last Update:</b></td>
                <td class="aquarium-detail-value">{{ date('F d, Y @ H:i:s', strtotime($fish->updated_at)) }}</td>
            </tr>
            @if($fish->notes)
                <tr>
                    <td class="aquarium-detail-name"><b>Notes:</b></td>
                    <td class="aquarium-detail-value">{{$fish->notes}}</td>
                </tr>
            @endif
            <tr>
                <td class="aquarium-detail-name">
                    <a class="btn btn-primary btn-aquarium-padding" href="{{ url('/fish/edit/' . $fish->id) }}">Edit</a>
                </td>
                <td class="aquarium-detail-value">
                    <a class="btn btn-primary btn-aquarium-padding" onclick="deleteFish('{{ $fish->name }}')">Delete</a>
                    <form id="deleteFish" class="delete" method="POST" action="/fish/delete/{{$fish->id}}" >
                        {{ csrf_field() }}
                    </form>
                </td>
            </tr>
        </table>
    </div>
@endsection