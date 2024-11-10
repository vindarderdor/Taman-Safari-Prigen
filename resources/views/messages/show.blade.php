@extends('messages.app')

@section('content')
<div class="chat-list chat active-chat" data-user-id="{{ $message->sender->ID_USER }}">
    <div class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between flex-wrap gap-6">
        <div class="d-flex align-items-center gap-2">
            {{-- <img src="{{ asset('assets/images/profile/user-8.jpg') }}" alt="user" width="48" height="48" class="rounded-circle"> --}}
            <div>
                <h6 class="fw-semibold mb-0">{{ $message->sender->name }}</h6>
                <p class="mb-0">{{ $message->sender->email }}</p>
            </div>
        </div>
        <span class="badge text-bg-primary fs-2 rounded-4 py-1 px-2">
            {{ $message->MESSAGE_STATUS }}
        </span>
    </div>
    <div class="pb-7 mb-7">
        <h4 class="fw-semibold text-dark mb-3">{{ $message->SUBJECT }}</h4>
        {{-- <p class="mb-3 text-dark">Hello {{ auth()->user()->name }},</p> --}}
        <p class="mb-3 text-dark">
            {!! nl2br(e($message->MESSAGE_TEXT)) !!}
        </p>
        {{-- <p class="mb-0 text-dark">Regards,</p>
        <h6 class="fw-semibold mb-0 text-dark pb-1">{{ $message->sender->name }}</h6> --}}
    </div>
    {{-- <div class="mb-3">
        <h6 class="fw-semibold mb-0 text-dark mb-3">Attachments</h6>
        <!-- Add attachments here if your system supports them -->
    </div>
    <d  iv class="mt-4">
        <a href="{{ route('messages.reply', $message->MESSAGE_ID) }}" class="btn btn-primary">Reply</a>
        <a href="{{ route('messages.inbox') }}" class="btn btn-secondary">Back to Inbox</a>
    </div> --}}
    <div class="px-9 py-3 border-top chat-send-message-footer">
        <div class="d-flex align-items-center justify-content-between">
          <ul class="list-unstyled mb-0 d-flex align-items-center gap-7">
            <li>
              <a class="text-dark bg-hover-primary d-flex align-items-center gap-1"
                href="{{ route('messages.reply', $message->MESSAGE_ID) }}">
                <i class="ti ti-arrow-back-up fs-5"></i>
                Reply
              </a>
            </li>
            {{-- <li>
              <a class="text-dark bg-hover-primary d-flex align-items-center gap-1"
                href="javascript:void(0)">
                <i class="ti ti-arrow-forward-up fs-5"></i>
                Forward
              </a>
            </li> --}}
          </ul>
        </div>
      </div>
</div>
@endsection
