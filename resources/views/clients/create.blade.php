@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white"><h1>Create Client</h1></div>
                <div class="card-body">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="telephone" class="form-label">Phone<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                            <small class="text-muted">Use the format: XXX-XXX-XXXX</small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="address">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" name="address" rows="3" required>{{ old('address') }}</input>
                        </div>

                        <div class="mb-3">
                            <label for="company_logo" class="form-label">Company Logo <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="company_logo" name="company_logo" required>
                            
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Save Client</button>
                            <a href="{{ url('/dashboard') }}" class="btn btn-outline-secondary">Back to Dashboard</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
