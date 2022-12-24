
<b>Idea Status Updated</b> <br>

The Idea: {{ $idea->title }}
has been updated to a status of:

{{ $idea->status->name }}

<br>

<a href="{{ route('idea.show', $idea) }}">View Idea</a>

Thanks,<br>
{{ config('app.name') }}
