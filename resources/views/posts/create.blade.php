@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">POST create</div>
          <div class="card-body">
            {{ BootForm::open(['action' => 'POST', 'route' => ['posts.store', $thread]]) }}
            {{ BootForm::text('title', 'タイトル', null, ['placeholder' => '10文字以内']) }}
            {{ BootForm::textarea('description', '本文') }}
            {{ BootForm::submit('submit') }}
            {{ BootForm::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
