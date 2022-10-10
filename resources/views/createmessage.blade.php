@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Create Messages') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('createmessage')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email Subject</label>
                            <input type="text" name="subject" class="form-control" id="exampleFormControlInput1" placeholder="Subject of the email">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Body of the email</label>
                            <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="5"></textarea>
                        </div>

                        <button class="btn btn-primary" type="submit">Preview</button>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
