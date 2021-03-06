<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>问吧</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 31px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body background="{{asset('images/background.png')}}">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            退出
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a href="{{ url('/login') }}">登陆</a>
                        <a href="{{ url('/register') }}">注册</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <div>
                            <img src="{{\Illuminate\Support\Facades\Auth::user()->avatar}}" width="100px" style="border-radius: 50px"/>
                        </div>
                        {{\Illuminate\Support\Facades\Auth::user()->name}},
                    @endif
                    欢迎来到问吧
                </div>
            @if(\Illuminate\Support\Facades\Auth::check())
                <div class="links">
                    <a href="{{url('/questions')}}">社区首页</a>
                    <a href="{{url('/questions/create')}}">发布问题</a>
                    <a href="{{url('/showUserQuestion')}}">查看自己的问题</a>
                    <a href="{{url('/notifications')}}">系统通知</a>
                    <a href="{{url('/inbox')}}">私信列表</a>
                </div>
                @else
                <div class="links">
                    请先登录
                </div>
                @endif
            </div>
        </div>
    </body>
</html>
