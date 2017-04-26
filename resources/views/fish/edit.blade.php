@extends('layouts.app')

@section('aquarium')
<li class="addAquariumMargin">
    <form method="GET" action="/fish/view/{{$id}}">
        <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Back'>
    </form>
</li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h1 class="panel-heading centerText">Edit Fish</h1>
                <div class="panel-body">
                    <form method='POST' action='/fish/edit' class='form-horizontal'>
                        {{ csrf_field() }}
                        <input type='hidden' name='id' id='id' value='{{old('id', $id) }}'>
                        <input type='hidden' name='tank_id' id='tank_id' value='{{ old('tank_id', $fish->tank_id) }}'>
                        <div class='form-group'>
                            <label for='name' class='col-sm-5 control-label'>Fish Name<span class="required">*</span></label>
                            <div class='col-sm-4'>
                                <input type='text' name='name' id='name' value='{{old('name', $fish->name) }}' class='form-control'>
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
                            <label for='type' class='col-sm-5 control-label'>Fish Type<span class="required">*</span></label>
                            <div class='col-sm-4'>
                                <select class='form-control' name='type' id='type'>
                                    <option value='' >Choose One</option>
                                    <option value='{{'Freshwater'}}' @if(old('type', $fish->type) == 'Freshwater') SELECTED @endif>Freshwater</option>
                                    <option value='{{'Saltwater'}}' @if(old('type', $fish->type) == 'Saltwater') SELECTED @endif>Saltwater</option>
                                </select>
                                @if($errors->get('type'))
                                <div class="alert-danger centerText">
                                    @foreach($errors->get('type') as $error)
                                    {{ $error }}
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='care_level' class='col-sm-5 control-label'>Care Level</label>
                            <div class='col-sm-4'>
                                <select class='form-control' name='care_level' id='care_level'>
                                    <option value='' >Choose One</option>
                                    <option value='{{'Easy'}}' @if(old('care_level', $fish->care_level) == 'Easy') SELECTED @endif>Easy</option>
                                    <option value='{{'Moderate'}}' @if(old('care_level', $fish->care_level) == 'Moderate') SELECTED @endif>Moderate</option>
                                    <option value='{{'Hard'}}' @if(old('care_level', $fish->care_level) == 'Hard') SELECTED @endif>Hard</option>
                                </select>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='temperament' class='col-sm-5 control-label'>Temperament</label>
                            <div class='col-sm-4'>
                                <select class='form-control' name='temperament' id='temperament'>
                                    <option value='' >Choose One</option>
                                    <option value='{{'Peaceful'}}' @if(old('temperament', $fish->temperament) == 'Peaceful') SELECTED @endif>Peaceful</option>
                                    <option value='{{'Semi-aggressive'}}' @if(old('temperament', $fish->temperament) == 'Semi-aggressive') SELECTED @endif>Semi-aggressive</option>
                                    <option value='{{'Aggressive'}}' @if(old('temperament', $fish->temperament) == 'Aggressive') SELECTED @endif>Aggressive</option>
                                </select>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='reef_compatible' class='col-sm-5 control-label'>Reef Compatible</label>
                            <div class='col-sm-4'>
                                <input type="radio" name="reef_compatible" value="{{'Yes'}}" @if(old('reef_compatible', $fish->reef_compatible) == 'Yes') CHECKED @endif> Yes
                                <input type="radio" name="reef_compatible" value="{{'No'}}" @if(old('reef_compatible', $fish->reef_compatible) == 'Semi-aggressive') CHECKED @endif> No
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='image' class='col-sm-5 control-label'>Fish Image URL</label>
                            <div class='col-sm-4'>
                                <input type='text' name='image' id='image' value='{{old('image', $fish->image) }}' class='form-control'>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='notes' class='col-sm-5 control-label'>Notes</label>
                            <div class='col-sm-4'>
                                <textarea rows="4" cols="50" name='notes' id='notes' class='form-control'>{{old('notes', $fish->notes) }}</textarea>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='col-sm-offset-5  col-sm-6'>
                                <input type='submit' name="edit" id="edit" class='btn btn-primary btn-aquarium-padding' value='Update'>
                                <input type='submit' name="cancel" id="cancel" class='btn btn-primary btn-aquarium-padding' value='Cancel'>
                            </div>
                            <div class='col-sm-offset-5 col-sm-6'>
                                <p><span class="required">*</span> Required</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection