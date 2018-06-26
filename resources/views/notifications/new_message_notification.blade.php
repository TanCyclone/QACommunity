<li class="notifications {{$notification->read_at?'':'unread'}}">
    <a href="/notifications/{{$notification->id}}?redirect_url=/inbox/{{$notification->data['dialog']}}">{{ $notification->data['name'] }} 给你发了一条私信.</a>
</li>