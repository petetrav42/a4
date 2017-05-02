@extends('layouts.app')

@section('heading')
    {{$coral->name}}
@endsection

@section('back')
    href="{{ url('/aquarium/view/' . $coral->aquarium_id) }}"
@endsection

@section('popup')
<!--Using sweet alert component-->
<script>
    function deleteCoral(name) {
        swal({
            title: "Confirm Delete",
            text: "Are you sure that you want to delete your " + name + "?",
            type: "error", //this isnt an error but wanted to error image instead of warn.
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Delete",
            confirmButtonColor: "red"
        }, function() {
            $("#deleteCoral").submit();
        });
    }
</script>
@endsection

@section('content')
    <div class="col-lg-6">
        @if($coral->image)
        <img src="{{$coral->image}}" title="{{$coral->name}}" class="pictureBorder" />
        @else
        <img src="/images/noimage.png" title="No Picture" class='pictureBorder'/>
        @endif
    </div>
    <div class="col-lg-6">
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
                <td class="aquarium-detail-value">{{ date('F d, Y @ H:i:s', strtotime($coral->created_at)) }}</td>
            </tr>
            <tr>
                <td class="aquarium-detail-name"><b>Last Update:</b></td>
                <td class="aquarium-detail-value">{{ date('F d, Y @ H:i:s', strtotime($coral->updated_at)) }}</td>
            </tr>
            <tr>
                <td class="aquarium-detail-name"><b>Notes:</b></td>
                <td class="aquarium-detail-value">{{$coral->notes}}</td>
            </tr>
            <tr>
                <td class="aquarium-detail-name">
                    <a class="btn btn-primary btn-aquarium-padding" href="{{ url('/coral/edit/' . $coral->id) }}">Edit</a>
                </td>
                <td class="aquarium-detail-value">
                    <a class="btn btn-primary btn-aquarium-padding" onclick="deleteCoral('{{ $coral->name }}')">Delete</a>
                    <form id="deleteCoral" class="delete" method="POST" action="/coral/delete/{{$coral->id}}" >
                        {{ csrf_field() }}
                    </form>
                </td>
            </tr>
        </table>
    </div>
@endsection