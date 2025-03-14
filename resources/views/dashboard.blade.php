@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Dashboard</h1>
                <a href="{{ url('/clients/add') }}" class="btn btn-primary">+ Create Client</a>
            </div>
            <p>Welcome to your dashboard. Here you can manage your account, your clients and much more.</p>

            <div class="clients-container mt-4">
                @if(isset($clients) && count($clients) > 0)
                <div class="row">
                    @foreach($clients as $client)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                @if($client->company_logo)
                                <img src="{{ asset('storage/' . $client->company_logo) }}" alt="{{ $client->name }} Logo" class="img-fluid mb-3" style="max-height: 100px;">
                                @else
                                <div class="no-logo bg-light p-4 mb-3">No Logo Available</div>
                                @endif
                                <h4 class="card-title">{{ $client->name }}</h4>
                                <p class="card-text">{{ $client->email }}</p>
                                <p class="card-text">{{ $client->telephone }}</p>
                                <p class="card-text">{{ $client->address }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="alert alert-info">
                    No clients have been added yet. Click the "Create Client" button to add your first client.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

