@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">查看{{$questions[0]->user->name}}提出的问题</div>
                    <div class="panel-body">
                        @foreach($questions as $question)
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{$question->user->avatar}}" style="border-radius: 50px" alt="{{$question->user->name}}" width="100px">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="/questions/{{$question->id}}">
                                            {{$question->title}}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection