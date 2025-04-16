@extends('layouts.admin-master')
@section('title')
    {{ isset($pageTitle) ? $pageTitle : 'Service Create' }}
@endsection
@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">{{ isset($pageTitle) ? $pageTitle : 'Service Create' }}</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ isset($pageTitle) ? $pageTitle : 'Service Create' }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content py-4">
        <div class="container-fluid">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body d-flex justify-content-between align-items-center rounded">
                    <h4 class="card-title mb-0">{{ isset($pageTitle) ? $pageTitle : 'Faq Create' }}</h4>
                    <a href="{{ route('admin.service.index') }}" class="btn btn-warning ms-auto">Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">{{ isset($pageTitle) ? $pageTitle : 'Service Create' }}</h3>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            @if(isset($serviceData))
                            <form method="POST" action="{{ route('admin.service.update', $serviceData->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                        @else
                            <form method="POST" action="{{ route('admin.service.store') }}" enctype="multipart/form-data">
                        @endif
                            @csrf
                        
                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label for="name" class="form-label">Service Name</label>
                                    <input class="form-control" type="text" name="name"
                                        value="{{ old('name', $serviceData->name ?? '') }}" placeholder="Service Name"
                                        {{ isset($serviceData) ? 'readonly' : '' }} id="name" required>
                                </div>
                        
                                <div class="mb-3 col-lg-6">
                                    <label for="service_slug" class="form-label">Service Slug</label>
                                    <input class="form-control" type="text" name="service_slug"
                                        value="{{ old('service_slug', $serviceData->service_slug ?? '') }}" placeholder="Service Slug"
                                        readonly id="service_slug" required>
                                </div>
                        
                                <div class="mb-3 col-lg-6">
                                    <label for="short_description" class="form-label">Short Description</label>
                                    <textarea class="form-control" name="short_description" id="short_description" rows="5"
                                        placeholder="Shortly describe the service">{{ old('short_description', $serviceData->short_description ?? '') }}</textarea>
                                </div>
                        
                                <div class="mb-3 col-lg-12">
                                    <label for="long_description" class="form-label">Long Description</label>
                                    <textarea class="form-control" name="long_description" id="summernote" rows="5"
                                        placeholder="Describe the service">{{ old('long_description', $serviceData->long_description ?? '') }}</textarea>
                                </div>
                        
                                <div class="mb-3 col-lg-6">
                                    <label for="price" class="form-label">Price</label>
                                    <input class="form-control" type="text" name="price"
                                        value="{{ old('price', $serviceData->price ?? '') }}" placeholder="Price" id="price" required>
                                </div>
                        
                                {{-- <div class="mb-3 col-lg-6">
                                    <label for="tax" class="form-label">Tax %</label>
                                    <input class="form-control" type="number" name="tax"
                                        value="{{ old('tax', $serviceData->tax ?? '') }}" placeholder="Tax" id="tax" required>
                                </div> --}}
                        
                                <div class="mb-3 col-lg-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1" {{ (isset($serviceData->status) && $serviceData->status == 1) ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ (isset($serviceData->status) && $serviceData->status == 0) ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                        
                                <div class="mb-3 col-lg-6">
                                    <label for="images" class="form-label">Upload Images</label>
                                    <input class="form-control" type="file" name="images[]" id="images" multiple>
                                    <small class="form-text text-muted">You can upload multiple images.</small>
                                    @if(isset($serviceData) && !empty($serviceData->images))
                                        <div class="mt-2">
                                            @foreach(explode('|', $serviceData->images) as $value)
                                                <img src="{{ $value }}" height="100" width="100" class="me-2 mb-2" />
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        
                            {{-- Key Features --}}
                            <div class="card mt-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Key Features</h5>
                                    <button type="button" class="btn btn-success btn-sm" onclick="addKeyFeature()">Add More</button>
                                </div>
                                <div class="card-body" id="key-feature-container">
                                    @php
                                        $keyFeatures = isset($serviceData->key_feature) ? json_decode($serviceData->key_feature, true) : [['title' => '', 'description' => '']];
                                    @endphp
                                    @foreach($keyFeatures as $feature)
                                        <div class="row mb-3 tax-entry">
                                            <div class="col-lg-6">
                                                <label class="form-label">Title</label>
                                                <input class="form-control" type="text" name="tax_title[]" value="{{ $feature['title'] ?? '' }}" required>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-label">Description</label>
                                                <input class="form-control" type="text" name="tax_description[]" value="{{ $feature['description'] ?? '' }}" required>
                                            </div>
                                            <div class="col-12 mt-2 text-end">
                                                <button type="button" class="btn btn-danger btn-sm" onclick="removeEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        
                            {{-- How It Works --}}
                            <div class="card mt-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">How It Works</h5>
                                    <button type="button" class="btn btn-success btn-sm" onclick="addHowItWorks()">Add More</button>
                                </div>
                                <div class="card-body" id="how-it-works-container">
                                    @php
                                        $howItWorks = isset($serviceData->how_to_work) ? json_decode($serviceData->how_to_work, true) : [['question' => '', 'answer' => '']];
                                    @endphp
                                    @foreach($howItWorks as $step)
                                        <div class="row mb-3 tax-entry">
                                            <div class="col-lg-6">
                                                <label class="form-label">Title</label>
                                                <input class="form-control" type="text" name="question[]" value="{{ $step['question'] ?? '' }}" required>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-label">Description</label>
                                                <input class="form-control" type="text" name="answer[]" value="{{ $step['answer'] ?? '' }}" required>
                                            </div>
                                            <div class="col-12 mt-2 text-end">
                                                <button type="button" class="btn btn-danger btn-sm" onclick="removeEntry(this)">Remove</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        
                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                            </div>
                        </form>
                        

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function addKeyFeature() {
            const container = document.getElementById('key-feature-container');
            const newEntry = document.createElement('div');
            newEntry.className = 'row mb-3 tax-entry';

            newEntry.innerHTML = `
            <div class="col-lg-6">
                <label class="form-label">Title</label>
                <input class="form-control" type="text" name="tax_title[]" placeholder="Enter tax title" required>
            </div>
            <div class="col-lg-6">
                <label class="form-label">Description</label>
                <input class="form-control" type="text" name="tax_description[]" placeholder="Enter description" required>
            </div>
            <div class="col-12 mt-2 text-end">
                <button type="button" class="btn btn-danger btn-sm" onclick="removeEntry(this)">Remove</button>
            </div>
        `;
            container.appendChild(newEntry);
        }

        function addHowItWorks() {
            const container = document.getElementById('how-it-works-container');
            const newEntry = document.createElement('div');
            newEntry.className = 'row mb-3 tax-entry';

            newEntry.innerHTML = `
            <div class="col-lg-6">
                <label class="form-label">Title</label>
                <input class="form-control" type="text" name="question[]" placeholder="Enter title" required>
            </div>
            <div class="col-lg-6">
                <label class="form-label">Description</label>
                <input class="form-control" type="text" name="answer[]" placeholder="Enter description" required>
            </div>
            <div class="col-12 mt-2 text-end">
                <button type="button" class="btn btn-danger btn-sm" onclick="removeEntry(this)">Remove</button>
            </div>
        `;
            container.appendChild(newEntry);
        }

        function removeEntry(button) {
            const entry = button.closest('.tax-entry');
            if (entry) entry.remove();
        }
    </script>


    <script>
        $("#name").on("change", function() {
            var element = $(this);
            $("button[type=submit]").prop("disabled", true);

            $.ajax({
                url: "{{ route('admin.getslug') }}",
                type: "GET",
                data: {
                    title: element.val(),
                },
                dataType: "json",
                success: function(response) {
                    $("button[type=submit]").prop("disabled", false);

                    if (response.status === true) {
                        $("#service_slug").val(response.slug);
                    }
                },
                error: function(jqXHR, exception) {
                    console.error("Something went wrong");
                    $("button[type=submit]").prop("disabled", false);
                },
            });
        });
    </script>
@endsection
