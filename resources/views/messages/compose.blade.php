@extends('messages.app')

@section('content')
<div class="chat-box email-box mh-n100 p-9">
    <form action="{{ route('messages.send') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="to" class="form-label">To:</label>
            <input type="email" class="form-control" id="to" name="to" required>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Subject:</label>
            <input type="text" class="form-control" id="subject" name="subject" required maxlength="300">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message:</label>
            <textarea class="form-control" id="message" name="message" rows="10" required></textarea>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary">Send</button>
            <a href="{{ route('messages.inbox') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
