@extends('layouts.app')

@section('heading')
    Edit {{$coral->name}}
@endsection

@section('back')
href="{{ url('/coral/view/' . $id) }}"
@endsection

@section('content')
    <form method='POST' action='/coral/edit' class='form-horizontal'>
        {{ csrf_field() }}
        <input type='hidden' name='id' id='id' value='{{old('id', $id) }}'>
        <input type='hidden' name='aquarium_id' id='aquarium_id' value='{{ old('aquarium_id', $coral->aquarium_id) }}'>
        <div class='form-group'>
            <label for='name' class='col-sm-5 control-label'>Coral Name<span class="required">*</span></label>
            <div class='col-sm-4'>
                <input type='text' name='name' id='name' value='{{old('name', $coral->name) }}' class='form-control' maxlength="255">
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
            <label for='coral_type' class='col-sm-5 control-label'>Coral Type<span class="required">*</span></label>
            <div class='col-sm-4'>
                <select class='form-control' name='coral_type' id='coral_type'>
                    <option value='' >Choose One</option>
                    @foreach($coral_type as $id => $value)
                        <option value='{{$value}}' @if(old('coral_type', $coral->coral_type) == $value) SELECTED @endif>{{$value}}</option>
                    @endforeach
                </select>
                @if($errors->get('coral_type'))
                    <div class="alert-danger">
                        @foreach($errors->get('coral_type') as $error)
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
                        <option value='{{$value}}' @if(old('care', $coral->care) == $value) SELECTED @endif>{{$value}}</option>
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
                        <option value='{{$value}}' @if(old('temperament', $coral->temperament) == $value) SELECTED @endif>{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class='form-group'>
            <label for='lighting' class='col-sm-5 control-label'>Lighting</label>
            <div class='col-sm-4'>
                <select class='form-control' name='lighting' id='lighting'>
                    <option value='' >Choose One</option>
                    @foreach($lighting as $id => $value)
                        <option value='{{$value}}' @if(old('lighting', $coral->lighting) == $value) SELECTED @endif>{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class='form-group'>
            <label for='waterflow' class='col-sm-5 control-label'>Waterflow</label>
            <div class='col-sm-4'>
                <select class='form-control' name='waterflow' id='waterflow'>
                    <option value='' >Choose One</option>
                    @foreach($waterflow as $id => $value)
                        <option value='{{$value}}' @if(old('waterflow', $coral->waterflow) == $value) SELECTED @endif>{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class='form-group'>
            <label for='image' class='col-sm-5 control-label'>Coral Image URL</label>
            <div class='col-sm-4'>
                <input type='text' name='image' id='image' value='{{old('image', $coral->image) }}' class='form-control' maxlength="255">
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
                <textarea rows="4" cols="50" name='notes' id='notes' class='form-control' maxlength="255">{{old('notes', $coral->notes) }}</textarea>
                @if($errors->get('notes'))
                    <div class="alert-danger">
                        @foreach($errors->get('notes') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
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