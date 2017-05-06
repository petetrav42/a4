@extends('layouts.app')

@section('heading')
    Add Fish To {{$aquarium->name}}
@endsection

@section('back')
    href="{{ url('/aquarium/view/' . $aquarium_id) }}"
@endsection

@section('content')
    <form method='POST' action='/fish/add' class='form-horizontal'>
        {{ csrf_field() }}
        <input type='hidden' name='aquarium_id' id='aquarium_id' value='{{$aquarium_id}}'>
        <div class='form-group'>
            <label for='name' class='col-sm-5 control-label'>Fish Name<span class="required">*</span></label>
            <div class='col-sm-4'>
                <input type='text' name='name' id='name' value='{{old('name') }}' class='form-control' maxlength="255">
                @if($errors->get('name'))
                    <div class="alert-danger centerText">
                        @foreach($errors->get('name') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class='form-group'>
            <label for='fish_type' class='col-sm-5 control-label'>Fish Type<span class="required">*</span></label>
            <div class='col-sm-4'>
                <select class='form-control' name='fish_type' id='fish_type'>
                    <option value='' >Choose One</option>
                    @foreach($fish_type as $id => $value)
                        <option value='{{$value}}' @if(old('fish_type') == $value) SELECTED @endif>{{$value}}</option>
                    @endforeach
                </select>
                @if($errors->get('fish_type'))
                    <div class="alert-danger centerText">
                        @foreach($errors->get('fish_type') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class='form-group'>
            <label for='care' class='col-sm-5 control-label'>Care Level</label>
            <div class='col-sm-4'>
                <select class='form-control' name='care' id='care'>
                    <option value='' >Choose One</option>
                    @foreach($care as $id => $value)
                        <option value='{{$value}}' @if(old('care') == $value) SELECTED @endif>{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class='form-group'>
            <label for='temperament' class='col-sm-5 control-label'>Temperament</label>
            <div class='col-sm-4'>
                <select class='form-control' name='temperament' id='temperament'>
                    <option value='' >Choose One</option>
                    @foreach($temperament as $id => $value)
                        <option value='{{$value}}' @if(old('temperament') == $value) SELECTED @endif>{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @if($aquarium->type!='Freshwater')
            <div class='form-group text-left'>
                <label for='reef_compatible' class='col-sm-5 control-label'>Reef Compatible</label>
                <div class='col-sm-4'>
                    @foreach($reef_compatible as $id => $value)
                        <input type="radio" name="reef_compatible" value="{{$value}}" @if(old('reef_compatible') == $value) CHECKED @endif> {{$value}}
                    @endforeach
                </div>
            </div>
        @endif
        <div class='form-group'>
            <label for='image' class='col-sm-5 control-label'>Fish Image URL</label>
            <div class='col-sm-4'>
                <input type='text' name='image' id='image' value='{{old('image') }}' class='form-control' maxlength="255">
                @if($errors->get('image'))
                    <div class="alert-danger centerText">
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
                <textarea rows="4" cols="50" name='notes' id='notes' class='form-control' maxlength="255">{{old('notes') }}</textarea>
                @if($errors->get('notes'))
                    <div class="alert-danger centerText">
                        @foreach($errors->get('notes') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class='form-group'>
            <div class='col-sm-offset-5 col-sm-6 text-left'>
                <input type='submit' name="add" id="add" class='btn btn-primary btn-aquarium-padding' value='Add'>
                <input type='submit' name="cancel" id="cancel" class='btn btn-primary btn-aquarium-padding' value='Cancel'>
            </div>
            <div class='col-sm-offset-5 col-sm-6 text-left'>
                <p><span class="required">*</span> Required</p>
            </div>
        </div>
    </form>
@endsection