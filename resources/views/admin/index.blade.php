@extends('layouts.back')

@section('content')
<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Dashboard</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="#">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Pages</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Starter Page</a>
      </li>
    </ul>
  </div>
  <div class="page-category">Inner page content goes here</div>
</div>
@endsection
