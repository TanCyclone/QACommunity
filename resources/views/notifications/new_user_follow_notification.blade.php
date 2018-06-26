<li class="notifications {{$notification->read_at?'':'unread'}}">
    <a href="{{ $notification->data['name'] }} ">{{ $notification->data['name'] }} </a>关注了你.
</li>