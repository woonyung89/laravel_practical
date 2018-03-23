<?php

use App\Common;
use App\Division;

?>
@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate...-->

<div class="panel-body">
  <!--New Division Form-->
  {!! Form::model($member,[
    'route' => ['member.store'],
    'class'=>'form-horizontal'
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



    <!-- membership_no -->
    <div class="form-group row">
      {!!Form::label('member-no','Membership Number',[
      'class'=>'control-label col-sm-3',])!!}
      <div class="col-sm-9">
        {!!Form::text('membership_no', null,[
        'id'=>'member-no',
        'class'=>'form-control',
        'maxlength'=>10,
        ])!!}
      </div>
    </div>
    <!--NRIC-->
    <div class="form-group row">
      {!!Form::label('member-ic','NRIC',[
      'class'=>'control-label col-sm-3',])!!}
      <div class="col-sm-9">
        {!!Form::text('nric', null,[
        'id'=>'member-ic',
        'class'=>'form-control',
        'maxlength'=>12,
        ])!!}
      </div>
    </div>
    <!--Name-->
    <div class="form-group row">
      {!!Form::label('member-name','Name',[
      'class'=>'control-label col-sm-3',
      ])!!}
      <div class="col-sm-9">
        {!!Form::text('name',null,[
        'id'=>'member-name',
        'class' =>'form-control',
        'maxlength'=>100,
        ])!!}
      </div>
    </div>
    <!--Gender-->
    <div class="form-group row">
      {!!Form::label('member-gender','Gender',[
      'class'=>'control-label col-sm-3',
      ])!!}
      <div class="col-sm-9">
        @foreach(Common::$gender as $key => $val)
        {!!Form::radio('gender',$key)!!}{{$val}}
        @endforeach
      </div>
    </div>


</div>
<!--division_id-->
<div class="form-group row">
  <div class="col-sm-9">
    {!!Form::select('division_id',
    Division::pluck('name','id'),null,[
    'class' => 'form-control',
    'placeholder'=>'- Select Division -',
    ])!!}
  </div>
</div>
<!--phone-->
<div class="form-group row">
  {!!Form::label('member-phone','Phone',[
  'class'=>'control-label col-sm-3',
  ])!!}
  <div class="col-sm-9">
    {!!Form::text('phone',null,[
    'id'=>'member-postcode',
    'class'=>'form-control',
    'maxlength'=>11,
    ])!!}
  </div>
</div>

<!--Address-->
<div class="form-group row">
  {!!Form::label('member-address','Address',[
  'class'=>'control-label col-sm-3',
  ])!!}
  <div class="col-sm-9">
    {!!Form::textarea('address',null,[
    'id'=>'member-address',
    'class'=>'form-control',
    ])!!}
  </div>
</div>

<!--postcode-->
<div class="form-group row">
  {!!Form::label('member-postcode','Postcode',[
  'class'=>'control-label col-sm-3',
  ])!!}
  <div class="col-sm-9">
    {!!Form::text('postcode',null,[
    'id'=>'member-postcode',
    'class'=>'form-control',
    'maxlength'=>5,
    ])!!}
  </div>
</div>
<!--city-->
<div class="form-group row">
  {!!Form::label('member-city','City',[
  'class'=>'control-label col-sm-3',
  ])!!}
  <div class="col-sm-9">
    {!!Form::text('city',null,[
    'id'=>'member-city',
    'class'=>'form-control',
    'maxlength'=>50,
    ])!!}
  </div>
</div>
<!--state-->
<div class="form-group row">
  {!!Form::label('member-state','State',[
  'class'=>'control-label col-sm-3',
  ])!!}
  <div class="col-sm-9">
    {!!Form::select('state',Common::$states,null,[
    'class'=>'form-control',
    'placeholder'=>'- Select State -',
    ])!!}
  </div>
</div>
<!--Submit Button-->
<div class="form-group row">
  <div class="col-sm-offset-3 col-sm-6">
    {!!Form::button('Save',[
    'type'=>'submit',
    'class'=>'btn btn-primary',
    ])!!}
  </div>
</div>
{!!Form::close()!!}
</div>
</div>
@endsection
