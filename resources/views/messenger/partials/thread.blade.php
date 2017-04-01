<tr>
    <td class="col-sm-7 tdHead">
        <a href="{{ route('messages.show', $thread->id) }}">
            {{ ucwords($thread->subject) }}
        </a>
    </td>
    <td class="col-sm-2">
        <i class="fa fa-inbox" aria-hidden="true"></i> {{ $thread->userUnreadMessagesCount(Auth::id()) }}
    </td>
    <td class="col-sm-3">{{ $thread->creator()->username }}</td>
</tr>