<?php

use App\Common;

?>
@extends('layouts.app')

@section('content')
<!-- Bootstrap Boilerplate... -->
<div class="panel-body">
  <div>
  @include('divisions._filters')
</div>
  @if (count($divisions) > 0)
  <table class="table table-striped task-table">

    <!-- Table Headings -->
    <thead>
      <tr>
        <th>No.</th>
        <th>Code</th>
        <th>Name</th>
        <th>City</th>
        <th>State</th>
        <th>Created</th>
        <th>Actions</th>
      </tr>
    </thead>

    <!-- Table Body -->
    <tbody>
      @foreach ($divisions as $i => $division)
      <tr>
        <td class="table-text">
          <div>{{ $i+1 }}</div>
        </td>
        <td class="table-text">
          <div>
            {!! link_to_route(
              'division.show',
              $title = $division->code,
              $parameters = [
              'id' => $division->id,
              ]
              ) !!}
            </div>
          </td>
          <td class="table-text">
            <div>{{ $division->name }}</div>
          </td>
          <td class="table-text">
            <div>{{ $division->city }}</div>
          </td>
          <td class="table-text">
            <div>{{ Common::$states[$division->state] }}</div>
          </td>
          <td class="table-text">
            <div>{{ $division->created_at }}</div>
          </td>
          <td class="table-text">
            <div>
              {!! link_to_route(
                'division.edit',
                $title = 'Edit',
                $parameters = [
                'id' => $division->id,
                ]
                ) !!}
                {!! link_to_route(
                  'division.edit',
                  $title = 'Member',
                  $parameters = [
                  'id' => $division->id,
                  ]
                  ) !!}
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <div>
        No records found
      </div>
      @endif
    </div>
    @endsection
