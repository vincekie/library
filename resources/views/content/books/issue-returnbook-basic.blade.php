@extends('layouts/contentNavbarLayout')

@section('title', 'Issue Return Books')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/extended-ui-perfect-scrollbar.js')}}"></script>
@endsection

@section('content')




<hr class="my-5">

<!-- Responsive Table -->
<div class="card mt-3">
  <h5 class="card-header">Issue Return Request</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>#</th>
          <th>Book Title</th>
          <th>Name of Author</th>
          <th>ISBN Number</th>
          <th>Genre</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr>
          <th scope="row">1</th>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>
            <button type="button" class="btn btn-success"><i class="bx bx-like me-1"></i>Accept</button>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>
            <button type="button" class="btn btn-success"><i class="bx bx-like me-1"></i>Accept</button>
          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>
            <button type="button" class="btn btn-success"><i class="bx bx-like me-1"></i>Accept</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<!--/ Responsive Table -->


<div class="mt-5"></div>
@endsection
