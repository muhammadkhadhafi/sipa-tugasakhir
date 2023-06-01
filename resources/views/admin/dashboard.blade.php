@extends('layouts.admin.main')

@section('container')
  <h1 class="h1 text-gray-900">Welcome Home</h1>
  <h1 class="h1 text-gray-900">{{ auth()->user()->nama }}</h1>
@endsection
