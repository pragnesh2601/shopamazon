<div class="col-xs-12">
    <h4 class="text-center">Shopping Cart</h4>
@if(count(Session::get('Cart')))
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th colspan="2">Product</th>
                <th>Quantity</th>
                <th>Unit price</th>
                <!-- <th>Discount</th> -->
                <th colspan="2">Total</th>
            </tr>
        </thead>
        <tbody>
            @php($total = 0)
            @foreach(Session::get('Cart') as $key => $value)
                <tr>
                    <td>
                        <a href="#">
                            <img src="{{$value['image']}}" class="img-square img-responsive" width="50px" height="50px" alt="">
                        </a>
                    </td>
                    <td><a href="{{url('/product/'.$value['asin'])}}"><small>{{ strtoupper($value['title']) }}</small></a></td>
                    <td>
                        <input type="number" value="{{$value['qty']}}" onchange="ItemDelete('{{ $value['asin'] }}', this.value)" class="form-control quantity" style="width: 70px;">
                    </td>
                    <td>{{ $value['currencycode'].' '.$value['price']}}</td>
                    @php($total = $total + ($value['price']*$value['qty']))
                    <!-- <td>0.00</td> -->
                    <td>{{ $value['currencycode'].' '.$value['price']*$value['qty'] }}</td>
                    <td><a href="#" onclick="ItemDelete('{{ $value['asin'] }}', 0)"><i class="fa fa-trash-o"></i></a></td>
                </tr>
            @endforeach         
        </tbody>
        <tfoot>
            <tr>
                <th class="text-right" colspan="4">Total</th>
                <th colspan="2">{{$value['currencycode'].' '.$total}}</th>
            </tr>
        </tfoot>
    </table>
</div>

<!-- /.table-responsive -->
<div class="box-footer">
    <div class="col-sm-12">
        <a class="btn btn-sm btn-primary pull-left" href="{{url('/cart')}}"><i class="fa fa-home"></i> Go to Cart</a>&nbsp;&nbsp;
        <button class="btn btn-sm btn-default" onclick="getCart()"><i class="fa fa-refresh"></i> Refresh Cart</button>
        <a target="_blank" href="{{Session::get('purchaseUrl')}}" class="btn btn-sm btn-warning pull-right">Proceed to checkout <i class="fa fa-chevron-right"></i></a>
    </div>
</div>
@else
<div class="col-xs-12 text-center">
    <h5 class="cart-empty">Your cart is empty</h5>
        <img class="cartPartialImage hidden" src="{{ asset('images/empty-basket.png')}}" alt="" />
</div>

<small class="disclaimer">The price and availability of items at {{ config('app.name', 'Laravel') }} are subject to change. The Cart is a temporary place to store a list of your items and reflects each item's most recent price. Do you have a gift card or promotional code? We'll ask you to enter your claim code when it's time to pay. <a href="{{url('/')}}">Shopping Now !!</a></small>

</div>
@endif