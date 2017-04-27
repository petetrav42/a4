@extends('layouts.app')

@section('back')
    href="{{ url('/aquarium/view/' . $id) }}"
@endsection

@section('heading')
    Edit {{$aquarium->name}}
@endsection

@section('content')
    <form method='POST' action='/aquarium/edit' class='form-horizontal'>
        {{ csrf_field() }}
        <input type='hidden' name='id' id='id' value='{{old('id', $aquarium->id) }}'>
        <input type='hidden' name='user_id' id='user_id' value='{{old('user_id', $aquarium->user_id) }}'>
        <div class='form-group'>
            <label for='name' class='col-sm-5 control-label'>Name<span class="required">*</span></label>
            <div class='col-sm-4'>
                <input type='text' name='name' id='name' value='{{old('name', $aquarium->name) }}' class='form-control'>
                @if($errors->get('name'))
                    <div class="alert-danger">
                        @foreach($errors->get('name') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class='form-group'>
            <label for='tankSize' class='col-sm-5 control-label'>Size<span class="required">*</span></label>
            <div class='col-sm-4'>
                <input type='number' name='tankSize' id='tankSize' value='{{old('tankSize', $aquarium->size) }}' class='form-control' >
                @if($errors->get('tankSize'))
                    <div class="alert-danger">
                        @foreach($errors->get('tankSize') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class='form-group'>
            <label for='type' class='col-sm-5 control-label'>Type<span class="required">*</span></label>
            <div class='col-sm-4 text-left'>
                <input type="radio" name="type" value="{{'Freshwater'}}" @if(old('type', $aquarium->type) == 'Freshwater') CHECKED @endif> Freshwater
                <input type="radio" name="type" value="{{'Saltwater'}}" @if(old('type', $aquarium->type) == 'Saltwater') CHECKED @endif> Saltwater
                @if($errors->get('type'))
                    <div class="alert-danger text-center">
                        @foreach($errors->get('type') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class='form-group'>
            <label for='image' class='col-sm-5 control-label'>Image URL</label>
            <div class='col-sm-4'>
                <input type='text' name='image' id='image' value='{{old('image', $aquarium->image) }}' class='form-control'>
                @if($errors->get('image'))
                    <div class="alert-danger">
                        @foreach($errors->get('image') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class='form-group'>
            <label for='notes' class='col-sm-5 control-label'>Notes</label>
            <div class='col-sm-4'>
                <textarea rows="4" cols="50" name='notes' id='notes' class='form-control'>{{old('notes', $aquarium->notes) }}</textarea>
            </div>
        </div>
        <div class='form-group'>
            <div class='col-sm-offset-5 col-sm-6 text-left'>
                <input type='submit' name="edit" id="edit" class='btn btn-primary btn-aquarium-padding' value='Update'>
                <input type='submit' name="cancel" id="cancel" class='btn btn-primary btn-aquarium-padding' value='Cancel'>
            </div>
            <div class='col-sm-offset-5 col-sm-6 text-left'>
                <p><span class="required">*</span> Required</p>
            </div>
        </div>
    </form>
@endsection