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
                <input type='text' name='name' id='name' value='{{old('name', $coral->name) }}' class='form-control'>
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
            <label for='type' class='col-sm-5 control-label'>Coral Type<span class="required">*</span></label>
            <div class='col-sm-4'>
                <select class='form-control' name='type' id='type'>
                    <option value='' >Choose One</option>
                    <option value='{{'Polyps'}}' @if(old('type', $coral->type) == 'Polyps') SELECTED @endif>Polyps</option>
                    <option value='{{'Mushroom'}}' @if(old('type', $coral->type) == 'Mushroom') SELECTED @endif>Mushroom</option>
                    <option value='{{'Soft'}}' @if(old('type', $coral->type) == 'Soft') SELECTED @endif>Soft Coral</option>
                    <option value='{{'SPS'}}' @if(old('type', $coral->type) == 'SPS') SELECTED @endif>SPS Hard Coral</option>
                    <option value='{{'LPS'}}' @if(old('type', $coral->type) == 'LPS') SELECTED @endif>LPS Hard Coral</option>
                </select>
                @if($errors->get('type'))
                    <div class="alert-danger">
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
                    <option value='{{'Easy'}}' @if(old('care_level', $coral->care_level) == 'Easy') SELECTED @endif>Easy</option>
                    <option value='{{'Moderate'}}' @if(old('care_level', $coral->care_level) == 'Moderate') SELECTED @endif>Moderate</option>
                    <option value='{{'Hard'}}' @if(old('care_level', $coral->care_level) == 'Hard') SELECTED @endif>Hard</option>
                </select>
            </div>
        </div>
        <div class='form-group'>
            <label for='temperament' class='col-sm-5 control-label'>Temperament</label>
            <div class='col-sm-4'>
                <select class='form-control' name='temperament' id='temperament'>
                    <option value='' >Choose One</option>
                    <option value='{{'Peaceful'}}' @if(old('temperament', $coral->temperament) == 'Peaceful') SELECTED @endif>Peaceful</option>
                    <option value='{{'Semi-aggressive'}}' @if(old('temperament', $coral->temperament) == 'Semi-aggressive') SELECTED @endif>Semi-aggressive</option>
                    <option value='{{'Aggressive'}}' @if(old('temperament', $coral->temperament) == 'Aggressive') SELECTED @endif>Aggressive</option>
                </select>
            </div>
        </div>
        <div class='form-group'>
            <label for='lighting' class='col-sm-5 control-label'>Lighting</label>
            <div class='col-sm-4'>
                <select class='form-control' name='lighting' id='lighting'>
                    <option value='' >Choose One</option>
                    <option value='{{'Low'}}' @if(old('lighting', $coral->lighting) == 'Low') SELECTED @endif>Low</option>
                    <option value='{{'Moderate'}}' @if(old('lighting', $coral->lighting) == 'Moderate') SELECTED @endif>Moderate</option>
                    <option value='{{'High'}}' @if(old('lighting', $coral->lighting) == 'High') SELECTED @endif>High</option>
                </select>
            </div>
        </div>
        <div class='form-group'>
            <label for='waterflow' class='col-sm-5 control-label'>Waterflow</label>
            <div class='col-sm-4'>
                <select class='form-control' name='waterflow' id='waterflow'>
                    <option value='' >Choose One</option>
                    <option value='{{'Low'}}' @if(old('waterflow', $coral->waterflow) == 'Low') SELECTED @endif>Low</option>
                    <option value='{{'Medium'}}' @if(old('waterflow', $coral->waterflow) == 'Medium') SELECTED @endif>Medium</option>
                    <option value='{{'High'}}' @if(old('waterflow', $coral->waterflow) == 'High') SELECTED @endif>High</option>
                </select>
            </div>
        </div>
        <div class='form-group'>
            <label for='image' class='col-sm-5 control-label'>Coral Image URL</label>
            <div class='col-sm-4'>
                <input type='text' name='image' id='image' value='{{old('image', $coral->image) }}' class='form-control'>
            </div>
        </div>

        <div class='form-group'>
            <label for='notes' class='col-sm-5 control-label'>Notes</label>
            <div class='col-sm-4'>
                <textarea rows="4" cols="50" name='notes' id='notes' class='form-control'>{{old('notes', $coral->notes) }}</textarea>
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