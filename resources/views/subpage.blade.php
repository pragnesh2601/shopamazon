@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('partials.searchform')
        <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 my-4">

            <!-- <h5 class="my-4"></h5> -->
            @include('partials.sidebar')
        </div>
  <!-- LEFT COLUMN-->
    <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 my-4">
      <h5 class="text-center">@isset($item->json->ItemAttributes->Title){{strtoupper($item->json->ItemAttributes->Title)}}@endisset</h5>
      <p class="lead"></p>
      <p class="goToDescription text-center"><a href="#CustomerReviews" class="scroll-to text-uppercase">Scroll to Customer Reviews </a></p>
      <div id="productMain" class="row mb-5">
        <div class="col-lg-6 col-md-6 col-sm-6 col-md-12">
          <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
            @isset($item->json->ImageSets)
              @foreach($item->json->ImageSets->ImageSet as $key => $image)
                <div class="mb-3"><img src="{{$image->LargeImage->URL}}" alt="" class="img-fluid image"></div>
              @endforeach
            @endisset
          </div>
          <div data-slider-id="1" class="owl-thumbs text-center">
            @isset($item->json->ImageSets)
              @foreach($item->json->ImageSets->ImageSet as $key => $image)
                <button class="owl-thumb-item mb-1"><img src="{{$image->TinyImage->URL}}" width="80px" height="80px" alt="" class=""></button>
              @endforeach
            @endisset
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-md-12">
          <div class="card h-100">
            <!-- <button href="{{$item['ItemLinks']['ItemLink']['0']['URL']}}" type="submit" data-toggle="tooltip" data-placement="top" title="{{$item['ItemLinks']['ItemLink']['0']['Description']}}" class="btn btn-sm btn-defalut float-right"><i class="fa fa-heart-o"></i></button> -->
            <!--<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
            <div class="card-body">
              @if(@isset($item->json->ItemAttributes->Feature->EditorialReviews))
                <h4 class="card-title">{{$item->json->EditorialReviews->EditorialReview->Source}}</h4>
                <ul class="card-text text-justify">
                  @foreach($item->json->ItemAttributes->Feature as $feature)
                    <li>{{$feature}}</li>
                  @endforeach
                </ul>
              @else
                <h4 class="card-title">{{__('Product Features')}}</h4>
                <ul class="card-text text-justify">
                  @isset($item->json->ItemAttributes->Feature)
                  @foreach($item->json->ItemAttributes->Feature as $feature)
                    <li>{{$feature}}</li>
                  @endforeach
                  @endisset
                </ul>
              @endisset
              <p></p>
              @isset($item->json->ItemAttributes->Author)
                <h4 class="card-title">Author details</h4>
                @foreach($item->json->ItemAttributes->Author as $Author)
                <blockquote class="blockquote">
                  <p class="card-text text-justify mb-0"><em>{{$Author}}</em></p>
                </blockquote>
                @endforeach
              @endisset
            </div>
            <div class="card-footer">
              <div class="float-left col-xs-6 d-inline text-center">
                <h4>
                  @if(@isset($item->json->OfferSummary->LowestNewPrice))
                    {{$item->json->OfferSummary->LowestNewPrice->FormattedPrice}}
                  @else
                      EUR 0,00
                  @endisset
                </h4>
              </div>
              <div class="float-right col-xs-3 d-inline text-center">
                @if(!empty($item->json->Variations))
                <a href="{{$item->json->DetailPageURL}}" class="btn btn-sm btn-warning">View Variations</a>&nbsp;
                @else
                <a href="{{$item->json->DetailPageURL}}" target="_blank" class="btn btn-sm btn-warning">View on Amazon</a>&nbsp;
                @endif
              </div>
              <div class="float-right col-xs-3 d-inline text-center">
                <a href="#" class="btn btn-sm btn-warning" onclick="addToCart('{{$item->json->ASIN}}',1,true)">Add to Cart</a>&nbsp;
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
      <div id="CustomerReviews" class="row">
        <iframe class="force-overflow" src="{{$item->json->CustomerReviews->IFrameURL}}" frameborder="0" scrolling="no" onload="resizeIframe(this)" style="width:100%; display:block; height:100%; min-height:65em; max-height:100em; border:none; margin:0; padding:0; overflow:auto; z-index:0;" width="100%"></iframe>
          <script>
            function resizeIframe(obj) {
              obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
            }
          </script>
        <div class="clearfix"></div>
      </div>
  </div>
  <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
@endsection