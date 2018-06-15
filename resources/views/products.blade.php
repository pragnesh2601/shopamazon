@extends('layouts.app')

@section('content')
<div class="product-block">
    	<div class="pro-head">
    		<h2>Products</h2>
    	</div>
    	@foreach(array_slice($items, 0, 8) as $item)
    	<div class="col-md-3 product-grid">
    		<div class="product-items">
	    		    <div class="project-eff">
						<div id="nivo-lightbox-demo"><a href="{{$item['LargeImage']['URL']}}"data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></div>     
							<img class="img-responsive" src="{{$item['LargeImage']['URL']}}" alt="" style="object-fit: cover; width: 100%; min-height: 320px; vertical-align:middle; height: 100%;    margin: 10px auto; ">
					</div>
	    		<div class="produ-cost">
	    			<h4>{{substr($item['ItemAttributes']['Title'],0,30)}}</h4>
	    			@if(@isset($item['ItemAttributes']['ListPrice']))
                    <h5>{{$item['ItemAttributes']['ListPrice']['FormattedPrice']}}</h5>
                    @else
                    <h5>EUR 0,00</h5>
                    @endisset
	    		</div>
	    		<div class="price-selet pric-clr1">		    			   
			   		<a class="popup-with-zoom-anim" href="#small-dialog"><b>Add to Cart</b></a>
				</div>
    		</div>
    	</div>
    	@endforeach
    	<!-- <div class="col-md-3 product-grid">
    		<div class="product-items">
	    		   <div class="project-eff">
						<div id="nivo-lightbox-demo"> <p> <a href="images/pro2.jpg"data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></p></div>     
							<img class="img-responsive" src="images/pro2.jpg" alt="">
					</div>
	    		<div class="produ-cost">
	    			<h4>Temporibus autem</h4>
	    			<h5>156 $</h5>
	    		</div>
	    		<div class="price-selet pric-clr2">		    			   
			   		<a class="popup-with-zoom-anim" href="#small-dialog">Buy Now</a>
				</div>
    		</div>
    	</div>
    	<div class="col-md-3 product-grid">
    		<div class="product-items">
	    		<div class="project-eff">
						<div id="nivo-lightbox-demo"> <p> <a href="images/pro3.jpg"data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></p></div>     
							<img class="img-responsive" src="images/pro3.jpg" alt="">
				</div>
	    		<div class="produ-cost">
	    			<h4>Temporibus autem</h4>
	    			<h5>500 $</h5>
	    		</div>
	    		<div class="price-selet pric-clr3">		    			   
			   		<a class="popup-with-zoom-anim" href="#small-dialog">Buy Now</a>
				</div>
    		</div>
    	</div>
    	<div class="col-md-3 product-grid">
    		<div class="product-items">
	    		  <div class="project-eff">
						<div id="nivo-lightbox-demo"> <p> <a href="images/pro4.jpg"data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></p></div>     
							<img class="img-responsive" src="images/pro4.jpg" alt="">
					</div>
	    		<div class="produ-cost">
	    			<h4>Temporibus autem</h4>
	    			<h5>188 $</h5>
	    		</div>
	    		<div class="price-selet pric-clr1">		    			   
			   		<a class="popup-with-zoom-anim" href="#small-dialog">Buy Now</a>
				</div>
    		</div>
    	</div>
    	<div class="col-md-3 product-grid">
    		<div class="product-items">
	    		 <div class="project-eff">
						<div id="nivo-lightbox-demo"> <p> <a href="images/pro5.jpg"data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></p></div>     
							<img class="img-responsive" src="images/pro5.jpg" alt="">
					</div>
	    		<div class="produ-cost">
	    			<h4>Temporibus autem</h4>
	    			<h5>220 $</h5>
	    		</div>
	    		<div class="price-selet pric-clr2">		    			   
			   		<a class="popup-with-zoom-anim" href="#small-dialog">Buy Now</a>
				</div>
    		</div>
    	</div>
    	<div class="col-md-3 product-grid">
    		<div class="product-items">
	    		  <div class="project-eff">
						<div id="nivo-lightbox-demo"> <p> <a href="images/pro6.jpg"data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></p></div>     
							<img class="img-responsive" src="images/pro6.jpg" alt="">
					</div>
	    		<div class="produ-cost">
	    			<h4>Temporibus autem</h4>
	    			<h5>160 $</h5>
	    		</div>
	    		<div class="price-selet pric-clr3">		    			   
			   		<a class="popup-with-zoom-anim" href="#small-dialog">Buy Now</a>
				</div>
    		</div>
    	</div>
    	<div class="col-md-3 product-grid">
    		<div class="product-items">
	    		<div class="project-eff">
						<div id="nivo-lightbox-demo"> <p> <a href="images/pro7.jpg"data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></p></div>     
							<img class="img-responsive" src="images/pro7.jpg" alt="">
				</div>
	    		<div class="produ-cost">
	    			<h4>Temporibus autem</h4>
	    			<h5>350 $</h5>
	    		</div>
	    		<div class="price-selet pric-clr1">		    			   
			   		<a class="popup-with-zoom-anim" href="#small-dialog">Buy Now</a>
				</div>
    		</div>
    	</div>
    	<div class="col-md-3 product-grid">
    		<div class="product-items">
	    		<div class="project-eff">
						<div id="nivo-lightbox-demo"> <p> <a href="images/pro8.jpg"data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></p></div>     
							<img class="img-responsive" src="images/pro8.jpg" alt="">
				</div>
	    		<div class="produ-cost">
	    			<h4>Temporibus autem</h4>
	    			<h5>500 $</h5>
	    		</div>
	    		<div class="price-selet pric-clr2">		    			   
			   		<a class="popup-with-zoom-anim" href="#small-dialog">Buy Now</a>
				</div>
    		</div>
    	</div>
    	<div class="col-md-3 product-grid">
    		<div class="product-items">
	    		<div class="project-eff">
						<div id="nivo-lightbox-demo"> <p> <a href="images/pro9.jpg"data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></p></div>     
							<img class="img-responsive" src="images/pro9.jpg" alt="">
				</div>
	    		<div class="produ-cost">
	    			<h4>Temporibus autem</h4>
	    			<h5>256 $</h5>
	    		</div>
	    		<div class="price-selet pric-clr3">		    			   
			   		<a class="popup-with-zoom-anim" href="#small-dialog">Buy Now</a>
				</div>
    		</div>
    	</div>
    	<div class="col-md-3 product-grid">
    		<div class="product-items">
	    		<div class="project-eff">
						<div id="nivo-lightbox-demo"> <p> <a href="images/pro10.jpg"data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></p></div>     
							<img class="img-responsive" src="images/pro10.jpg" alt="">
				</div>
	    		<div class="produ-cost">
	    			<h4>Temporibus autem</h4>
	    			<h5>548 $</h5>
	    		</div>
	    		<div class="price-selet pric-clr1">		    			   
			   		<a class="popup-with-zoom-anim" href="#small-dialog">Buy Now</a>
				</div>
    		</div>
    	</div>
    	<div class="col-md-3 product-grid">
    		<div class="product-items">
	    		<div class="project-eff">
						<div id="nivo-lightbox-demo"> <p> <a href="images/pro3.jpg"data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></p></div>     
							<img class="img-responsive" src="images/pro3.jpg" alt="">
				</div>
	    		<div class="produ-cost">
	    			<h4>Temporibus autem</h4>
	    			<h5>390 $</h5>
	    		</div>
	    		<div class="price-selet pric-clr2">		    			   
			   		<a class="popup-with-zoom-anim" href="#small-dialog">Buy Now</a>
				</div>
    		</div>
    	</div>
    	<div class="col-md-3 product-grid">
    		<div class="product-items">
	    		<div class="project-eff">
						<div id="nivo-lightbox-demo"> <p> <a href="images/pro12.jpg"data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></p></div>     
							<img class="img-responsive" src="images/pro12.jpg" alt="">
				</div>
	    		<div class="produ-cost">
	    			<h4>Temporibus autem</h4>
	    			<h5>150 $</h5>
	    		</div>
	    		<div class="price-selet pric-clr3">		    			   
			   		<a class="popup-with-zoom-anim" href="#small-dialog">Buy Now</a>
				</div>
    		</div>
    	</div> -->
      <div class="clearfix"> </div>
    </div>
    
			

    @endsection
