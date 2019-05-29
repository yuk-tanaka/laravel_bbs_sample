@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">THREAD edit</div>
          <div class="card-body">
            {{ BootForm::open(['model' => $thread, 'update' => 'threads.update']) }}
            {{ BootForm::text('title', 'タイトル', null, ['placeholder' => '10文字以内']) }}
            {{ BootForm::submit('submit') }}
            {{ BootForm::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
