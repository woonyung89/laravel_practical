<?php

use App\Common;
use App\Division;

?>
<section class="filters">
  {!!Form::open([
    'route'=>['division.index'],
    'method'=>'get',
    'class'=>'form inline'
    ])!!}
    <div  class="col-xs-3">
    {!!Form::label('division-code','Division Code',
     ['class'=>'control-label col-sm-5'])!!}

    {!!Form::text('code',null,[
      'id'=>'division-code',
      'class'=>'form-control',
      'maxlength'=>10,
    ])!!}
  </div>
  <div  class="col-xs-3">
    {!!Form::label('division-name','Name',
       ['class'=>'control-label col-sm-3'])!!}
    {!!Form::text('name',null,[
      'id'=>'division-name',
      'class'=>'form-control',
      'maxlength'=>100,
    ])!!}
</div>
  <div  class="col-xs-3">
    {!!Form::label('division-state','State',
       ['class'=>'control-label col-sm-3'])!!}
    {!!Form::select('state',Common::$states,null,[
      'class'=>'form-control',
      'placeholder'=>' All ',
    ])!!}
</div>
  <div  class="col-xs-3">
    {!!Form::button('Filter',[
      'type'=>'submit',
      'class'=>'btn btn primary',
      'maxlength'=>12,
    ])!!}
</div>
