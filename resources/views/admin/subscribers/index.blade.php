@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Subscribers</h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div>{{ session('success') }}</div>
            @endif

            <a href="{{ route('subscribers.create') }}">Add New Subscriber</a>

            <table border="1" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>Name</th><th>Email</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscribers as $subscriber)
                        <tr>
                            <td>{{ $subscriber->name }}</td>
                            <td>{{ $subscriber->email }}</td>
                            <td>
                                <a href="{{ route('subscribers.edit', $subscriber) }}"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('subscribers.destroy', $subscriber) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="ml-1" type="submit" onclick="return confirm('Delete this subscriber?')" style="border: none; background: none; padding: 0; cursor: pointer;">
                                        <i class="fas fa-trash"></i>
                                      </button>                                      
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
