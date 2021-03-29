@extends('layouts.admin')
@section('content')
    <h1 id="name">Hello, <span></span></h1>
@endsection

@push('js')
    <script>
        $(function() {
             $("#name span").html("{{ \Str::random(10) }}");
        });
    </script>
@endpush