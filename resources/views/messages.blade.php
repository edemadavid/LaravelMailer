@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Messages') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($messages as $message)
                        <div class="card mb-4 p-2">
                            <p>{{$message}}</p>
                        </div>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
