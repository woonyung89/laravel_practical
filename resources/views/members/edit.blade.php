<?php

use App\Common;
use App\Division;
use App\Group;
?>
@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
  <!-- New Division Form -->
  {!! Form::model($member, [
    'route' => ['member.update', $member->id],
    'method'=>'put',
    'class' => 'form-horizontal'
    ])!!}
    @if($errors -> any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors -> all() as $error)
        <li>
          {{$error}}
        </li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- Code -->
    <div class="form-group row">
      {!! Form::label('membership-no', 'no', [
      'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-9">
        {!! Form::text('membership_no', $member->membership_no, [
        'id' => 'member-no',
        'class' => 'form-control',
        'maxlength' => 10,
        ]) !!}
      </div>
    </div>

    <!-- Name -->
    <div class="form-group row">
      {!! Form::label('member-name', 'Name', [
      'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-9">
        {!! Form::text('name', $member->name, [
        'id' => 'member-name',
        'class' => 'form-control',
        'maxlength' => 100,
        ]) !!}
      </div>
    </div>
    <!--group_id-->
    <!-- <div class="form-group row">
    {!! Form::label('member-group_id', 'Group ID', [
    'class' => 'control-label col-sm-3',
    ]) !!}
    <div class="col-sm-9">
    {!!Form::select('group_id',
    Group::pluck('name','id'),null,[
    'class' => 'form-control',
    'placeholder'=>'- Select Group -',
    ])!!}
  </div>
</div> -->

<!-- Address -->
<div class="form-group row">
  {!! Form::label('member-address', 'Address', [
  'class' => 'control-label col-sm-3',
  ]) !!}
  <div class="col-sm-9">
    {!! Form::textarea('address', $member->address, [
    'id' => 'member-address',
    'class' => 'form-control',
    ]) !!}
  </div>
</div>
<!--phone-->
<div class="form-group row">
  {!! Form::label('member-phone', 'Phone', [
  'class' => 'control-label col-sm-3',
  ]) !!}
  <div class="col-sm-9">
    {!! Form::textarea('phone', $member->phone, [
    'id' => 'member-phone',
    'class' => 'form-control',
    'max-length' => 100,
    ]) !!}
  </div>
</div>
<!--nric-->
<div class="form-group row">
  {!! Form::label('member-nric', 'Nric', [
  'class' => 'control-label col-sm-3',
  ]) !!}
  <div class="col-sm-9">
    {!! Form::textarea('nric', $member->nric, [
    'id' => 'member-nric',
    'class' => 'form-control',
    'max-length' => 100,
    ]) !!}
  </div>
</div>
<!-- Postcode -->
<div class="form-group row">
  {!! Form::label('member-postcode', 'Postcode', [
  'class' => 'control-label col-sm-3',
  ]) !!}
  <div class="col-sm-9">
    {!! Form::text('postcode', $member->postcode, [
    'id' => 'member-postcode',
    'class' => 'form-control',
    'maxlength' => 5,
    ]) !!}
  </div>
</div>
<!--division_id-->
<div class="form-group row">
  {!!Form::label('member-division_id','Division ID',[
  'class'=>'control-label col-sm-3',
  ])!!}
  <div class="col-sm-9">
    {!!Form::select('division_id',
    Division::pluck('name','id'),null,[
    'class' => 'form-control',
    'placeholder'=>'- Select Division -',
    ])!!}
  </div>
</div>
<!-- City -->
<div class="form-group row">
  {!! Form::label('member-city', 'City', [

  'class' => 'control-label col-sm-3',
  ]) !!}
  <div class="col-sm-9">
    {!! Form::text('city', $member->city, [
    'id' => 'member-city',
    'class' => 'form-control',
    'maxlength' => 50,
    ]) !!}
  </div>
</div>

<!-- State -->
<div class="form-group row">
  {!! Form::label('member-state', 'State', [
  'class' => 'control-label col-sm-3',
  ]) !!}
  <div class="col-sm-9">
    {!! Form::select('state', Common::$states, $member->state, [
    'class' => 'form-control',
    'placeholder' => '- Select State -',
    ]) !!}
  </div>
</div>

<div class="form-group row">
  {!! Form::label('member-group', 'Group', [
  'class' => 'control-label col-sm-3',
  ]) !!}
  <div class="col-sm-offset-3 col-sm-6">
    @foreach($group as $g => $val)
    {!!Form::checkbox('group_id[]', $val['id'], (in_array($val['id'], $member->groups->pluck('id')->toArray())) ? 1 : 0)!!} {{$val['name']}}<br>
    @endforeach

  </div>
</div>

<!-- Submit Button -->
<div class="form-group row">
  <div class="col-sm-offset-3 col-sm-6">
    {!! Form::button('Update', [
    'type' => 'submit',
    'class' => 'btn btn-primary',
    ]) !!}
  </div>
</div>


{!! Form::close() !!}
</div>

@endsection
