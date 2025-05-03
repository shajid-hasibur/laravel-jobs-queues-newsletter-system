@extends('admin.layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add Subscriber</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('subscribers.store') }}" method="POST">
            @csrf
            <div class="form-group col-6">
                <label>Name:</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-6">
                <label>Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-6">
                <label>Phone:</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-6">
                <label>Address:</label>
                <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-6">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection