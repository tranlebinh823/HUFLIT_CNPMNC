@extends('client.master')
@section('module', 'Trang Chủ')
@section('action', '')
@section('content')
    @include('client.blocks.home-section')
    @include('client.blocks.banner-section')
    @include('client.blocks.product-section')
    @include('client.blocks.newsletter-section')

@endsection
