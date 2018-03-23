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
        <td>{{ $group->code }}</td>
      </tr>
      <tr>
        <td>Name</td>
        <td>{{ $group->name }}</td>
      </tr>
      <tr>
        <td>Description</td>
        <td>{!! nl2br($group->description) !!}</td>
      </tr>
        <td>Created</td>
        <td>{{ $group->created_at }}</td>
      </tr>
    </tr>
      <td>Member Name</td>
      <td>
        @foreach($group->members as $m)
        <ol>{{ $m -> name}}</ol>
        @endforeach
        </td>
    </tr>

    </tbody>
  </table>
</div>

@endsection
