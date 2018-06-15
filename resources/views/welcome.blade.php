@extends('layouts.app')
@section('content')
    <div class="">
        <div class="row justify-content-md-center">
            <div class="col-md-4 my-4">
                <h2 class="text-center"><img src="{{ $setting->getLogo() }}" alt="" class="img-responsive" ><br>{{ $setting->json->search_header_text }}</h2>
            </div>
        </div>
        @include('partials.searchform')
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 my-4">
@isset($items)
          <div class="row">
            
            @foreach(array_slice($items, 0, 8) as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">
              <div class="card h-100">
                <a href="{{url('/'.$slug.'/'.$item['ASIN'])}}"><img style="object-fit: contain; width: 100%; min-height: 240px; max-height: 240px; vertical-align: middle; height: 100%;" class="card-img-top" src="{{$item['LargeImage']['URL']}}" alt=""></a>
                <div class="card-body">
                  <!-- <h4 class="card-title"> -->
                    <a href="{{url('/'.$slug.'/'.$item['ASIN'])}}">{{substr($item['ItemAttributes']['Title'],0,30)}}</a>
                  <!-- </h4> --><br>
                  <small>by @isset($item['ItemAttributes']['Publisher']){{$item['ItemAttributes']['Publisher']}}@endisset
                    @isset($item['ItemAttributes']['Brand']){{$item['ItemAttributes']['Brand']}}@endisset
                  </small>
                </div>
                <div class="card-footer">
                    <div class="float-left col-xs-6 d-inline text-center">
                        <h5>
                            @if(@isset($item['OfferSummary']))
                                {{$item['OfferSummary']['LowestNewPrice']['FormattedPrice']}}
                            @else
                                EUR 0,00
                            @endisset
                        </h5>
                    </div>
                    <div class="float-right col-xs-6 d-inline text-center" onclick="addToCart('{{$item['ASIN']}}',1,true)"><a class="btn btn-sm btn-warning">Add to Cart</a>&nbsp;</div>
                </div>
              </div>
            </div>
            @endforeach
            <nav  class="pull-right" aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
            <div class="clearfix"></div>
            @endisset
          </div>
          <!-- /.row -->
        </div>
        <!-- col-sm-12 -->
        <div class="clearfix"></div>
    </div>
@endsection
