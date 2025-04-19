@extends('layouts.admin-master')

@section('title')
Token List
@endsection

@section('content')
<div class="app-content-header bg-light py-3 shadow-sm">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="mb-0">PAN Verification</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">PAN Verification</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content py-4">
    <div class="container-fluid">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body d-flex justify-content-between align-items-center rounded">
                <h4 class="card-title mb-0">Token Management</h4>
            </div>
        </div>
        <!-- Show success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Show error messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm">
                    @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-hover table-striped align-middle mb-0">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Token</th>
                                        <th>Purchase Date</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $key => $Token)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $Token->token }}</td>
                                        <td>{{ (date('d-m-Y',strtotime($Token->created_at))) }}</td>
                                        <td>{{ $Token->status == 'active' ? 'Active' : 'Expired' }}</td>
                                        @if ($Token->status == 'active')
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-info me-2 open-modal-btn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#dlModel"
                                                data-id="{{ $Token->id }}"
                                                data-token="{{ $Token->token }}"
                                                data-service="{{ $Token->service_type }}">
                                                PAN Verify
                                            </button>
                                        </td>
                                        @else
                                        <td class="text-center">
                                            <a href="{{ route('dlreportgenerate', $Token->id) }}" class="btn btn-sm btn-secondary">
                                                Download Report
                                            </a>
                                        </td>                        
                                        @endif
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">No data found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <nav>
                            {{ $data->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Aadhaar OTP Generation -->
<div class="modal fade" id="dlModel" tabindex="-1" aria-labelledby="dlModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dlModelLabel">Driver's License Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Aadhaar OTP Generation Form -->
                <form id="aadhaarOtpForm" action="{{ route('dl-verification') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="driving_license_number" class="form-label">Driving License Number<span class="text-danger">*</span></label>
                        <input type="text" name="driving_license_number" id="driving_license_number" class="form-control" value=""required>
                    </div>
                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">DOB<span class="text-danger">*</span></label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="" placeholder="yyyy-mm-dd" required>
                        <input type="hidden" name="source" id="source" class="form-control" value="2">
                    </div>
                    <!-- Hidden fields for Token and Service Type -->
                    <input type="hidden" name="token" id="modalToken" value="">
                    <input type="hidden" name="service_type" id="modalServiceType" value="DL">

                    <!-- Display Token Info -->
                    <div class="mb-3">
                        <p><strong>Service Type:</strong> <span id="modalServiceTypeDisplay"></span></p>
                        <p><strong>Token:</strong> <span id="modalTokenDisplay"></span></p>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle modal opening
        document.querySelectorAll('.open-modal-btn').forEach(button => {
            button.addEventListener('click', function() {
                const serviceType = this.getAttribute('data-service');
                const token = this.getAttribute('data-token');
                // Set modal values
                // document.getElementById('modalServiceType').value = serviceType;
                document.getElementById('modalToken').value = token;
                document.getElementById('modalServiceTypeDisplay').textContent = serviceType;
                document.getElementById('modalTokenDisplay').textContent = token;
            });
        });
    });
</script>

@endsection