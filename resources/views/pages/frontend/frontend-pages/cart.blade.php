@extends('layouts.frontend.master')
@section('title', trans('frontend.shopist_cart_title') .' < '. get_site_title() )

@section('content')
  @include('frontend-templates.cart.topdeals')	
@endsection  