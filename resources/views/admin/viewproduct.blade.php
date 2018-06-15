            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading"><b>Product ASIN No.: {{$item['ASIN']}}</b></div>
                    <div class="panel-body">
                            <div class="col-lg-12">
                                <div class="col-md-6 col-md-offset-3 ">
                                    <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                                        @isset($item['ImageSets'])
                                                <div align="center"><img src="{{$item['ImageSets']['ImageSet'][0]['LargeImage']['URL']}}" alt="" class="img-fluid"></div>
                                        @endisset
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-sm-12 text-center">
                                    <h5>{{strtoupper($item['ItemAttributes']['Title'])}}</h5>
                                    <p class="price text-center"><b>{{$item['OfferSummary']['LowestNewPrice']['FormattedPrice']}}</b></p>
                                    <div class="col-md-6 col-md-offset-3">
                                        &nbsp;<button type="button" onclick="$('#mainPanel').show();$('#renderCode').html('');" class="btn btn-default btn-danger">No, Go Back</button>
                                    <form id="SaveProduct" class="form-inline pull-left" role="form">
                                        <input type="hidden" name="asin" value="{{$item['ASIN']}}">
                                        <input type="hidden" name="json" value="{{serialize($item)}}">
                                        <input type="hidden" name="category_id" value="{{$data->category_id}}">
                                        <input type="hidden" name="sub_category_id" value="{{$data->sub_category_id}}">
                                        <input type="hidden" name="is_featured" value="{{$data->is_featured}}">
                                        <input type="hidden" name="display_home" value="{{$data->display_home}}">
                                        <input type="hidden" name="product_status" value="{{$data->product_status}}">
                                        <button type="button" onclick="SaveProduct();" class="btn btn-default btn-success"><i class="fa fa-shopping-cart"></i> Yes, Add This</button>
                                    </form>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>