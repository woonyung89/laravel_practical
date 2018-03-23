<?php

use App\Common;

?>
@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
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
        <td>Groups</td>
        <td>
          @foreach( $member->groups as $g )
          <ol>{{$g->name}}</ol>
          @endforeach
        </td>
      </tr>
      <tr>
        <td>Division</td>
        <td>{{ App\Division::pluck('name','id')          [$member->division_id]}}</td>
      </tr>


    </tbody>
  </table>
</div>

@endsection
