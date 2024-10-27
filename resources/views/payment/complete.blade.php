@extends('layouts.public')

@section('content')
    <div class="container-fluid text-center mt-5">
        <h2>Thank you for your payment!</h2>
        <p>Your transaction has been successfully completed.</p>
        <a href="{{ url('/') }}" class="btn btn-info">Go Home</a>
    </div>
@endsection
