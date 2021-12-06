@extends('layout')
@section('content')
<h1>Metadata List</h1>
<ul class="list-group">
@foreach ($metadatas as $m)
    <a href="{{ '/admin/metadata/'.($m->id - 1)."/update" }}">
        <li class="list-group-item">
            {{ $m->id - 1 }}
            <P>{{ $m->metadata }}</P>
        </li>
    </a>
@endforeach
    <li>{{ $metadatas->links() }}</li>
</ul>

@endsection
