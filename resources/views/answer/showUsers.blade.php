@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">查看回答</div>
                    <div class="panel-body">
                        @foreach($answers as $answer)
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="/questions/{{$answer->question_id}}">
                                            {{$answer->body}}
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