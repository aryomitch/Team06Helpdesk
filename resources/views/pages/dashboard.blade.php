@extends('layouts.template')

@section('content')

@extends('layouts.navbar')

@can('isAnalyst')
<h1>Only Analyst can see this</h1>
@endcan

@endsection