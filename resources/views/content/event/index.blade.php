@extends('content.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4" style="color: #274E13;">Event Management</h1>
    <a href="{{ route('events.create') }}" class="btn btn-success mb-3" style="background-color: #90C659; border-color: #90C659;">Create New Event</a>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->start_date->format('Y-m-d H:i') }}</td>
                    <td>{{ $event->end_date->format('Y-m-d H:i') }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                        <a href="{{ route('events.edit', $event) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $events->links() }}
</div>
@endsection

