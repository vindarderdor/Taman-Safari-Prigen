@extends('messages.app')

@section('content')
<div class="chat-box email-box mh-n100 p-9">
    <div class="mb-4">
        <h5>Original Message</h5>
        <div class="card">
            <div class="card-body">
                <p><strong>From:</strong> {{ $originalMessage->sender->NAMA_USER }}</p>
                <p><strong>Subject:</strong> {{ $originalMessage->SUBJECT }}</p>
                <p><strong>Date:</strong> {{ $originalMessage->CREATE_DATE }}</p>
                <hr>
                <p>{{ $originalMessage->MESSAGE_TEXT }}</p>
            </div>
        </div>
    </div>

    <form action="{{ route('messages.send') }}" method="POST">
        @csrf
        <input type="hidden" name="to" value="{{ $originalMessage->sender->email }}">
        <div class="mb-3">
            <label for="subject" class="form-label">Subject:</label>
            <input type="text" class="form-control" id="subject" name="subject" value="Re: {{ $originalMessage->SUBJECT }}" required maxlength="300">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message:</label>
            <textarea class="form-control" id="message" name="message" rows="10" required></textarea>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary">Send Reply</button>
            <a href="{{ route('messages.show', $originalMessage->MESSAGE_ID) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
