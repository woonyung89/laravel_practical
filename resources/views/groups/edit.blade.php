<?php

use App\Common;

?>
@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
  <!-- New group Form -->
  {!! Form::model($group, [
    'route' => ['group.update', $group->id],
    'method'=>'put',
    'class' => 'form-horizontal'
    ]) !!}

    <!-- Code -->
    <div class="form-group row">
      {!! Form::label('group-code', 'Code', [
      'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-9">
        {!! Form::text('code', $group->code, [
        'id' => 'group-code',

        'class' => 'form-control',
        'maxlength' => 3,
        ]) !!}
      </div>
    </div>

    <!-- Name -->
    <div class="form-group row">
      {!! Form::label('group-name', 'Name', [
      'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-9">
        {!! Form::text('name', $group->name, [
        'id' => 'group-name',
        'class' => 'form-control',
        'maxlength' => 100,
        ]) !!}
      </div>
    </div>

    <!-- Address -->
    <div class="form-group row">
      {!! Form::label('group-description', 'Description', [
      'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-9">
        {!! Form::textarea('description', $group->description, [
        'id' => 'group-description',
        'class' => 'form-control',
        ]) !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('member', 'Member(s)', [
      'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-offset-3 col-sm-6">
    @foreach($member as $g => $val)
      {!!Form::checkbox('member_id[]', $val['id'], (in_array($val['id'], $group->members->pluck('id')->toArray())) ? 1 : 0)!!} {{$val['name']}}<br>
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
