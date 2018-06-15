@extends('layouts.app')
@section('content')
<div class="product-block">
    <div class="container">
        <div class="row my-4" id="cartpagePartial">
            @include('partials.cartpartial')
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
@endsection