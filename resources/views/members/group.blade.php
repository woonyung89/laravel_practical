<?php

use App\Common;
use App\Group;

?>
@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
  {!! Form::model($member, [
    'route' => ['member.update', $member->id],
    'method'=>'put',
    'class' => 'form-horizontal'
    ])!!}
  <table class="table table-striped task-table">
    <!-- Table Headings -->
    <thead>
      <tr>
        <th>Attribute</th>
        <th>Value</th>
      </tr>
    </thead>
    <!-- Table Body -->
    <tbody>

      <tr>
        <td>Code</td>
        <td>{{ $member->membership_no }}</td>
      </tr>
      <tr>
        <td>Name</td>
        <td>{{ $member->name }}</td>
      </tr>
      <tr>
        <td>Address</td>
        <td>{!! nl2br($member->address) !!}</td>
      </tr>
      <tr>
        <td>Postcode</td>
        <td>{{ $member->postcode }}</td>
      </tr>
      <tr>
        <td>City</td>
        <td>{{ $member->city }}</td>
      </tr>
      <tr>
        <td>State</td>
        <td>{{ Common::$states[$member->state] }}</td>
      </tr>
      <tr>
        <td>Created</td>
        <td>{{ $member->created_at }}</td>
      </tr>

      <tr>
        <td>Group check</td>

        <td>
          @foreach($group as $g)
            {!!Form::checkbox('group_id[]', $g['id'], (array($g['id'], $member->groups->pluck('id'))) ? 1 : 0)!!} {{$g->name}}<br>

          @endforeach
        
      </td>
      </tr>
    </tbody>
  </table>
  {!! Form::button('Update', [
  'type' => 'submit',
  'class' => 'btn btn-primary',
  ]) !!}

    {!! Form::close() !!}
</div>

@endsection
