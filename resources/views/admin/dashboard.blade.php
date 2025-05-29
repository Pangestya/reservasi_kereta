@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard USER') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <h2>Dashboard Admin</h2>
                    <p>Total Reservasi: {{ $totalReservations }}</p>
                    <p>Jumlah Pengguna Terdaftar: {{ $totalUsers }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection