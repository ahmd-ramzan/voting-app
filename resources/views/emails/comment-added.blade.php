<span>A comment was posted on your idea</span>
<br>
{{ $comment->user->name }}
<br>
<b>{{ $comment->idea->title }}</b>
<br>
Comment: {{ $comment->body }}

Thanks,<br>
{{ config('app.name') }}
