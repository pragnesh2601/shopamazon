@extends('layouts.app')
<!-- dd(Route::currentRouteName()!='guest') -->
@section('content')
    <div class="container-fluid">
    @include('partials.searchform')
      <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 my-4">
            @include('partials.sidebar')
        </div>
        <!-- /.col-lg-2 -->
        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 my-4">
          @if(count($items))
          <div class="row items">
            @foreach($items as $item)
            <div class="col-lg-3 item col-md-4 col-sm-6 col-xs-12 mb-4">
              <div class="card h-100">
                <a href="@isset($item->asin){{url('/product/'.$item->asin)}}@endisset">
                  <img class="card-img-top" src="@isset($item->json->LargeImage->URL){{$item->json->LargeImage->URL}}@endisset" alt="">
                </a>
                <div class="card-body">
                    <a href="@isset($item->asin){{url('/product/'.$item->asin)}}@endisset">
                      <small>
                        @isset($item->json->ItemAttributes->Title){{$item->json->ItemAttributes->Title}}@endisset
                      </small>
                    </a>
                </div>
                <div class="card-footer">
                    <div class="float-left col-xs-6 d-inline text-center">
                        <h5>
                            @if(@isset($item->json->OfferSummary->LowestNewPrice))
                                {{$item->json->OfferSummary->LowestNewPrice->FormattedPrice}}
                            @else
                                EUR 0,00
                            @endisset
                        </h5>
                    </div>
                    <div class="float-right col-xs-6 d-inline text-center" onclick="addToCart('{{$item->asin}}',1,true)"><a class="btn btn-sm btn-warning add-to-cart"><b>Add to Cart</b></a>&nbsp;</div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
            <div class="clearfix"></div>
            <div class="pull-right">
              {{ $items->links() }}
            </div>
          <!-- /.row -->
            @else
            <div class="row">
              <div class="clearfix"></div>
              <div class="col-md-12 text-center"><h2> There are no Products Available.</h2></div>
              <div class="clearfix"></div>
              <div class="col-md-12 text-center"><img src="{{asset('images/404.png')}}" class="img-thumbnail" alt=""></div>
            </div>
            @endif
        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->     
@endsection