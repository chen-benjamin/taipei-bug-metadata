@extends('layout')
@section('content')
<h1>Create Metadata</h1>
<form method="POST" action="/admin/metadata">
    {{ csrf_field() }}
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <div class="mb-3">
        <label for="metadata" class="form-label">Metadata</label>
        <textarea class="form-control" id="metadata" name="metadata" rows="20"></textarea>
    </div>
    <button type="submit" class="btn btn-primary text-white">Submit</button>
</form>
@endsection
