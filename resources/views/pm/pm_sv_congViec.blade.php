@extends('layouts.pm_layout')

@section('content')
    @include('sv.sv_congViec', ['user_type' => 'pm'])
@endsection