@extends('layout')
@section('content')
<h1>Update Metadata</h1>
<form method="POST" action="{{ '/admin/metadata/'.($metadata->id - 1).'/update'}}">
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
        <label for="metadata" class="form-label">Metadata {{ $metadata->id - 1 }}</label>
        <textarea class="form-control" id="metadata" name="metadata" rows="20">{{ $metadata->metadata }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary text-white">Submit</button>
</form>
@endsection