@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <ul>
          <li><a href="{{route('threads.create')}}">新規作成</a></li>
        </ul>
        <div class="card">
          <div class="card-header">THREAD index</div>
          <div class="card-body">
            @foreach($threads as $thread)
              <div class="card">
                <div class="card-header">スレッド名：{{$thread->title}}</div>
                <div class="card-body">
                  <ul>
                    <li>投稿者名：{{$thread->user->name}}</li>
                    <li>作成日：{{$thread->created_at->format('Y-m-d h:i:s')}}</li>
                    <li>更新日：{{$thread->updated_at->format('Y-m-d h:i:s')}}</li>
                  </ul>
                  <ul>
                    <li><a href="{{route('posts.create', $thread)}}">POST新規作成</a></li>
                    <li><a href="{{route('threads.edit', $thread)}}">変更</a></li>
                    <li>
                      {{ BootForm::open(['method' => 'DELETE', 'route' => ['threads.destroy', $thread]]) }}
                      {{ BootForm::submit('削除', ['class' => 'btn btn-danger']) }}
                      {{ BootForm::close() }}
                    </li>
                  </ul>
                  @foreach($thread->posts as $post)
                    <ul>
                      <li>投稿者名：{{$post->user->name}}</li>
                      <li>タイトル：{{$post->title}}</li>
                      <li>本文：{!! $post->description !!}</li>
                      <li>作成日：{{$post->created_at->format('Y-m-d h:i:s')}}</li>
                      <li>更新日：{{$post->updated_at->format('Y-m-d h:i:s')}}</li>
                    </ul>
                    <ul>
                      <li>
                        {{ BootForm::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post]]) }}
                        {{ BootForm::submit('削除', ['class' => 'btn btn-danger']) }}
                        {{ BootForm::close() }}
                      </li>
                    </ul>
                  @endforeach
                </div>
              </div>
              <hr>
            @endforeach
          </div>
        </div>
        <hr>
        {!! $threads->links() !!}
      </div>
    </div>
  </div>
@endsection
