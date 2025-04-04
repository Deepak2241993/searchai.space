@extends('layouts.admin-master')

@section('title', 'User List')

@section('content')
    <div class="card container">
        <div class="card-header bg-primary text-white">
            <h5>Assign Token For User</h5>
        </div>
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <div class="card-body">
            <form action="{{ route('admin.assign-tokens') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? '' }}" readonly>
                    </div>
            
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? '' }}" readonly>
                    </div>
            
                    <div class="mb-3 col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $address['address'] ?? '' }}" readonly>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="service" class="form-label">Service</label>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Service Name</th>
                                <th>Token Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                            <tr>
                                <td>{{ $service->name }}</td>
                                <td>
                                    <input type="hidden" name="service_names[]" value="{{ $service->name }}" />
                                    <input type="hidden" name="user_id" value="{{ $user->id }}" />
                                    <input type="number" min="0" class="form-control" name="tokens_purchased[]" />
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
    </div>
@endsection