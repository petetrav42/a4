@extends('layouts.app')

@section('aquarium')
<li class="addAquariumMargin">
    <form method="GET" action="/">
        <input type='submit' class='btn btn-primary btn-aquarium-padding' value='Back'>
    </form>
</li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h1 class="panel-heading centerText">Add Aquarium</h1>
                <div class="panel-body">
                    <form method='POST' action='/aquarium/add' class='form-horizontal'>
                        {{ csrf_field() }}
                        <input type='hidden' name='user_id' id='user_id' value='{{Auth::user()->id}}'>
                        <div class='form-group'>
                            <label for='name' class='col-sm-5 control-label'>Tank Name<span class="required">*</span></label>
                            <div class='col-sm-4'>
                                <input type='text' name='name' id='name' value='{{old('name') }}' class='form-control'>
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
                            <label for='tankSize' class='col-sm-5 control-label'>Tank Size<span class="required">*</span></label>
                            <div class='col-sm-4'>
                                <input type='number' name='tankSize' id='tankSize' value='{{old('tankSize') }}' class='form-control'>
                                @if($errors->get('tankSize'))
                                <div class="alert-danger centerText">
                                    @foreach($errors->get('tankSize') as $error)
                                    {{ $error }}
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='type' class='col-sm-5 control-label'>Tank Type<span class="required">*</span></label>
                            <div class='col-sm-4'>
                                <select class='form-control' name='type' id='type'>
                                    <option value='' >Choose One</option>
                                    <option value='{{'Freshwater'}}' @if(old('type') == 'Freshwater') SELECTED @endif>Freshwater</option>
                                    <option value='{{'Saltwater'}}' @if(old('type') == 'Saltwater') SELECTED @endif>Saltwater</option>
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
                            <label for='image' class='col-sm-5 control-label'>Tank Image</label>
                            <div class='col-sm-4'>
                                <input type='text' name='image' id='image' value='{{old('image') }}' class='form-control'>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='notes' class='col-sm-5 control-label'>Notes</label>
                            <div class='col-sm-4'>
                                <textarea rows="4" cols="50" name='notes' id='notes' class='form-control'>
                                    {{old('notes') }}
                                </textarea>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='col-sm-offset-5  col-sm-6'>
                                <input type='submit' name="add" id="add" class='btn btn-primary btn-aquarium-padding' value='Add'>
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