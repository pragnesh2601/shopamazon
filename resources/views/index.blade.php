@extends('layouts.app')
<!-- dd(Route::currentRouteName()!='guest') -->
@section('content')
    <div class="container-fluid">
        @include('partials.searchform')
        <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 my-4">

            <!-- <h5 class="my-4"></h5> -->
            @include('partials.sidebar')
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 my-4">
        @isset($items)

          <div class="row">
            @foreach($items as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">
              <div class="card h-100">
                <a href="@isset($item['ASIN']){{url('/product/'.$item['ASIN'])}}@endisset"><img style="object-fit: contain; width: 100%; min-height: 240px; max-height: 240px; vertical-align: middle; height: 100%; margin: 10px auto;" class="card-img-top" src="@isset($item['LargeImage']['URL']){{$item['LargeImage']['URL']}}@endisset" alt=""></a>
                <div class="card-body">
                  <!-- <h4 class="card-title"> -->
                    <a href="@isset($item['ASIN']){{url('/product/'.$item['ASIN'])}}@endisset"><small>@isset($item['ItemAttributes']['Title']){{$item['ItemAttributes']['Title']}}@endisset</small></a>
                    <br>
                  <!-- <small>by @isset($item['ItemAttributes']['Publisher']){{$item['ItemAttributes']['Publisher']}}@endisset
                    @isset($item['ItemAttributes']['Brand']){{$item['ItemAttributes']['Brand']}}@endisset
                  </small> -->
                </div>
                <div class="card-footer">
                    <div class="float-left col-xs-6 d-inline text-center">
                        <h5>
                            @if(@isset($item['OfferSummary']['LowestNewPrice']))
                                {{$item['OfferSummary']['LowestNewPrice']['FormattedPrice']}}
                            @else
                                EUR 0,00
                            @endisset
                        </h5>
                    </div>
                    <div class="float-right col-xs-6 d-inline text-center" onclick="addToCart('{{$item['ASIN']}}',1,true)"><a class="btn btn-sm btn-warning"><b>Add to Cart</b></a>&nbsp;</div>
                </div>
              </div>
            </div>
            @endforeach
        

          </div>
          <!-- /.row -->
            <nav  class="pull-right" aria-label="Page navigation example">
                <ul class="pagination">
                        @foreach($items as $key => $item)
                        <li class="page-item">
                            <a class="page-link" href="/search?searchindex={{$requests['Request']['ItemSearchRequest']['SearchIndex']}}&searchterm={{$requests['Request']['ItemSearchRequest']['Keywords']}}&page={{$key+1}}">{{$key+1}}</a>
                        </li>
                        @endforeach
                </ul>
            </nav>
        @endisset
        </div>
        <!-- /.col-lg-9 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->     
@endsection