@extends('layouts.app')

@section('back')
    href="{{ url('/') }}"
@endsection

@section('heading')
    Add Aquarium
@endsection

@section('content')
    <form method='POST' action='/aquarium/add' class='form-horizontal'>
        {{ csrf_field() }}
        <input type='hidden' name='user_id' id='user_id' value='{{Auth::user()->id}}'>
        <div class='form-group'>
            <label for='name' class='col-sm-5 control-label'>Name<span class="required">*</span></label>
            <div class='col-sm-4'>
                <input type='text' name='name' id='name' value='{{old('name') }}' class='form-control'>
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
                <input type='number' name='tankSize' id='tankSize' value='{{old('tankSize') }}' class='form-control'>
                @if($errors->get('tankSize'))
                    <div class="alert-danger">
                        @foreach($errors->get('tankSize') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class='form-group text-left'>
            <label for='type' class='col-sm-5 control-label'>Type<span class="required">*</span></label>
            <div class='col-sm-4'>
                <input type="radio" name="type" value="{{'Freshwater'}}" @if(old('type') == 'Freshwater') CHECKED @endif> Freshwater
                <input type="radio" name="type" value="{{'Saltwater'}}" @if(old('type') == 'Saltwater') CHECKED @endif> Saltwater
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
                <input type='text' name='image' id='image' value='{{old('image') }}' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='notes' class='col-sm-5 control-label'>Notes</label>
            <div class='col-sm-4'>
                <textarea rows="4" cols="50" name='notes' id='notes' class='form-control'>{{old('notes') }}</textarea>
            </div>
        </div>
        <div class='form-group'>
            <div class='col-sm-offset-5  col-sm-6 text-left'>
                <input type='submit' name="add" id="add" class='btn btn-primary btn-aquarium-padding' value='Add'>
                <input type='submit' name="cancel" id="cancel" class='btn btn-primary btn-aquarium-padding' value='Cancel'>
            </div>
            <div class='col-sm-offset-5 col-sm-6 text-left'>
                <p><span class="required">*</span> Required</p>
            </div>
        </div>
    </form>
@endsection