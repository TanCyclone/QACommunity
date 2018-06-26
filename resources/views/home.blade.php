@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">通知</div>
                <div class="panel-body">
				@if(Auth::user()->is_active==1)
                   激活成功，你已成为社区正式用户！
                    <script>
                       setTimeout(function () {
                           window.location.href='/'
                       },2000)
                    </script>
				   @else
				   已向您的邮箱发送了激活邮件，请前往邮箱中通过点击链接来激活成为社区正式用户！
                    {{\Illuminate\Support\Facades\Auth::logout()}}
                @endif
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
