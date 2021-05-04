@extends('app')

@section('title', 'マイページ')

@section('content')
@include('nav')

    
  <div class="container">
    <div class="card mt-3">
      <div class="card-body d-flex flex-row">
        <i class="fas fa-user-circle fa-3x mr-1"></i>
        <div>
          <div class="font-weight-bold">
            ユーザー
          </div>
          <div class="font-weight-lighter">
            2020/2/1 12:00
          </div>
        </div>
      </div>
      <div class="card-body pt-0 pb-2">
        <h3 class="h4 card-title">
          
        </h3>
        <div class="card-text">
          XXXX
        </div>
      </div>
    </div>
  </div>
  //React
  <div id="conditionlist">
    a
  </div>
@endsection
