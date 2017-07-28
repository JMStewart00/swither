@extends('layouts.app')

@section('content')
<div class="container">
<h1>Hello</h1>
@foreach ($data as $result)
    <li>{{$result->name}} | {{$result->location->display_address[0]}}</li>

@endforeach
</div>
@endsection
