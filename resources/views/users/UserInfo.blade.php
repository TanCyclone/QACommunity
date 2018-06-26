@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">查看{{$user->name}}的资料</div>
                    <div class="panel-body">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">头像</label>
                                <span class="form-group">
                                    <img src="{{$user->avatar}}" style="width: 100px"/>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="city" class="col-md-4 control-label">现居城市</label>
                                <span class="form-group">
                                    {{$user->settings['city']}}
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="bio" class="col-md-4 control-label">个人简介</label>
                                 <span class="form-group">
                                         {{$user->settings['bio']}}
                                 </span>
                            </div>
                        @if(user()->id==$user->id)
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button class="btn btn-primary">
                                    更改自己的个人资料
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection