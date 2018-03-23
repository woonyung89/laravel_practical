<?php

use App\Common;

?>
@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
  @include('members._filters')
  @if (count($members) > 0)
  <table class="table table-striped task-table">

    <!-- Table Headings -->
    <thead>
      <tr>
        <th>No.</th>
        <th>Membership Number</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Postcode</th>
        <th>City</th>
        <th>State</th>
        <th>phone</th>
        <th>Division ID</th>
        <th>Created</th>
        <th>Actions</th>
      </tr>
    </thead>

    <!-- Table Body -->
    <tbody>
      @foreach ($members as $i => $member)
      <tr>
        <td class="table-text">
          <div>{{ $i+1 }}</div>
        </td>
        <td class="table-text">
          <div>
            {!! link_to_route(
              'member.show',
              $title = $member->membership_no,
              $parameters = [
              'id' => $member->id,
              ]
              ) !!}
            </div>
          </td>
          <td class="table-text">
            <div>{{ $member->name }}</div>
          </td>
          <td class="table-text">
            <div>{{ Common::$gender[$member->gender] }}</div>
          </td>
          <td class="table-text">
            <div>{{ $member->address}}</div>
          </td>
          <td class="table-text">
            <div>{{ $member->postcode }}</div>
          </td>
          <td class="table-text">
            <div>{{ $member->city }}</div>
          </td>
          <td class="table-text">
            <div>{{ Common::$states[$member->state] }}</div>
          </td>
          <td class="table-text">
            <div>{{ $member->phone }}</div>
          </td>

          <td class="table-text">
            <div>{{ $member->division_id }}</div>
          </td>
          <td class="table-text">
            <div>{{ $member->created_at }}</div>
          </td>
          <td class="table-text">
            <div>
              {!! link_to_route(
                'member.edit',
                $title = 'Edit',
                $parameters = [
                'id' => $member->id,
                ]
                ) !!}
                {!! link_to_route(
                  'member.group',
                  $title = 'Group',
                  $parameters = [
                  'id' => $member->id,
                  ]
                  ) !!}
              </div>
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
    {{$members->links()}}
    @endsection
