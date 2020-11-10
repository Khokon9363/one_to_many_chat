@extends('layouts.app')

@section('content')
<input type="hidden" value="{{ Auth::user()->id }}" id="adminId">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <example-component></example-component>
        </div>
    </div>
</div>
@endsection
