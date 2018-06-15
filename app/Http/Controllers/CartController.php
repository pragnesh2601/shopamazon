<?php

namespace App\Http\Controllers;

use Auth;
use Response;
use DB;
use View;
use AmazonProduct;
use App\Categories;
use App\SubCategories;
use App\Products;
use App\Settings;
use Illuminate\Http\Request;
use ApaiIO\Operations\Search;
use Illuminate\Support\Facades\Input;


class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*$this->middleware('auth');*/
        $setting = Settings::find(1);
    }

    public function postaddtocart(Request $request){
        if( $request->has('id') &&  $request->has('qty') &&  $request->has('byAsin')){ 
            $asin = $request->get('id');

        if($request->session()->has('Cart.'. $asin)){
            $a = $request->session()->get('Cart.'.$asin.'.qty') + 1;
            $request->session()->put('Cart.'.$asin.'.qty', $a);
        }else{
            $product = Products::where('ASIN',$asin)->first();

            $request->session()->put('Cart.'.$asin,$asin);
            $request->session()->put('Cart.'.$asin.'.qty', $request->get('qty'));
            $request->session()->put('Cart.'.$asin.'.asin', $asin);
            $request->session()->put('Cart.'.$asin.'.image', $product->json->LargeImage->URL);
            $request->session()->put('Cart.'.$asin.'.title', $product->json->ItemAttributes->Title);
            if(isset($product->json->ItemAttributes->ListPrice->Amount)){
                $request->session()->put('Cart.'.$asin.'.currencycode', $product->json->ItemAttributes->ListPrice->CurrencyCode);
                $request->session()->put('Cart.'.$asin.'.price', ($product->json->ItemAttributes->ListPrice->Amount / 100.0));
            }
            elseif($product->json->VariationSummary->LowestPrice && $product->json->VariationSummary->HighestPrice){
                $request->session()->put('Cart.'.$asin.'.currencycode', $product->json->ItemAttributes->ListPrice->CurrencyCode);
                $request->session()->put('Cart.'.$asin.'.price', (($product->json->VariationSummary->LowestPrice->Amount / 100.0).'&nsbp;'.$product->json->ItemAttributes->ListPrice->CurrencyCode.'&nsbp;'.($responseItem->VariationSummary->HighestPrice->Amount / 100.0 )));
            }
            else{
                $request->session()->put('Cart.'.$asin.'.currencycode', $product->json->OfferSummary->LowestNewPrice->CurrencyCode);
                $request->session()->put('Cart.'.$asin.'.price', ($product->json->OfferSummary->LowestNewPrice->Amount / 100.0));
            }
        }
            $request->session()->save();
        }

        $retval['code'] = 200;
        $retval['cartCount'] = count($request->session()->get('Cart'));
        $retval['html'] = View::make('partials.cartpartial')->with('setting',$setting)->render();

        return response::json($retval);
        /*if ($responseItem->VariationSummary->LowestPrice && $responseItem->VariationSummary->HighestPrice ){
            $item['rrp'] = ($responseItem->VariationSummary->LowestPrice->Amount / 100.0 ). ' &euro; - ' .($responseItem->VariationSummary->HighestPrice->Amount / 100.0 );
        }

        if ($responseItem->OfferSummary->LowestNewPrice) {
            $item['LowestNewPrice'] = $product->json->OfferSummary->LowestNewPrice->Amount / 100.0;
        }*/

        /*if( $request->has('id') &&  $request->has('qty') &&  $request->has('byAsin')){ 
            $id = $request->get('id');
            $qty = $request->get('qty');
            $byAsin = $request->get('byAsin');
            if(!Auth::check()){
                if($request->session()->has('CartId') && $request->session()->has('HMAC')){
                    $response = AmazonProduct::cartAdd(session('CartId') ,session('HMAC') ,$id, $qty, $byAsin);
                }else{
                    $response = AmazonProduct::createCart($id, $qty, $byAsin);
                    $request->session()->put('CartId',$response['Cart']['CartId']);
                    $request->session()->put('HMAC',$response['Cart']['HMAC']);
                    $request->session()->save();
                    // session(['CartId'=> $response['Cart']['CartId'],'HMAC'=> $response['Cart']['HMAC']]);
                    //$response1 = AmazonProduct::cartAdd(session('CartId') ,session('HMAC') ,$id, $qty, $byAsin);
                }
            }else{
                if(Auth::user()->cart_id =='' || Auth::user()->hmac =='' ){
                    $response = AmazonProduct::createCart($id, $qty, $byAsin);
                    Auth::user()->cart_id = $response['Cart']['CartId'];
                    Auth::user()->hmac = $response['Cart']['HMAC'];
                    Auth::user()->save();
                }else{
                    $response = AmazonProduct::cartAdd(Auth::user()->cart_id ,Auth::user()->hmac ,$id, $qty, $byAsin);
                }
            }
        }else{
            return 'Invalid Parameters';
        }
        dd($response);*/

    }

    public function getcart(Request $request){


        //return back();
        /*if( $request->session()->has('Qty') &&  $request->session()->has('ASIN')){ 


            $details = Products::where('ASIN',$asin)->first();
            $request->session()->put('ASIN',$details->json->ASIN);
            $request->session()->put('Title',$details->json->ItemAttributes->Title);
            $request->session()->put('LargeImage',$details->json->LargeImage->URL);
            $request->session()->put('Qty',$request->get('qty'));
            $request->session()->put('Price',$details->json->OfferSummary->LowestNewPrice->FormattedPrice);
            $response = $request->session()->save();
        }*/

            // dd($request->session()->get('Cart.B00J0S6QZ6'));
        /*if($request->session()->has('CartId') && $request->session()->has('HMAC')){
            $cart_id = session('CartId');
            $hmac = session('HMAC');
            $response = AmazonProduct::cartGet($cart_id ,$hmac);
        }elseif(Auth::check()){
            $cart_id = Auth::user()->cart_id;
            $hmac = Auth::user()->hmac;
            $response = AmazonProduct::cartGet($cart_id ,$hmac);
        }else{
            $response = null;
            $image = null;

        }

        if($response && count($response['Cart']['CartItems']['CartItem']) > 0){
            if(isset($response['Cart']['CartItems']['CartItem']['ASIN'])){
                $asin[] = $response['Cart']['CartItems']['CartItem']['ASIN'];
            }else{
                foreach ($response['Cart']['CartItems']['CartItem'] as $key => $item) {
                    $asin[] = $item['ASIN'];
                }
            }
            $image = AmazonProduct::items($asin)->with('image',$image);
        }*/
        if(count($request->session()->get('Cart'))){
            if(env('AMAZON_COUNTRY') == 'br'){$country = 'https://www.amazon.br/';}
            if(env('AMAZON_COUNTRY') == 'ca'){$country = 'https://www.amazon.ca/';}
            if(env('AMAZON_COUNTRY') == 'cn'){$country = 'https://www.amazon.cn/';}
            if(env('AMAZON_COUNTRY') == 'fr'){$country = 'https://www.amazon.fr/';}
            if(env('AMAZON_COUNTRY') == 'de'){$country = 'https://www.amazon.de/';}
            if(env('AMAZON_COUNTRY') == 'in'){$country = 'https://www.amazon.in/';}
            if(env('AMAZON_COUNTRY') == 'it'){$country = 'https://www.amazon.it/';}
            if(env('AMAZON_COUNTRY') == 'jp'){$country = 'https://www.amazon.co.jp/';}
            if(env('AMAZON_COUNTRY') == 'mx'){$country = 'https://www.amazon.com.mx/';}
            if(env('AMAZON_COUNTRY') == 'es'){$country = 'https://www.amazon.es/';}
            if(env('AMAZON_COUNTRY') == 'uk'){$country = 'https://www.amazon.co.uk/';}
            if(env('AMAZON_COUNTRY') == 'us'){$country = 'https://www.amazon.com/';}
            $cart = $request->session()->get('Cart');
            $counter = 1;
            $purchaseUrl = $country.'gp/aws/cart/add.html?AWSAccessKeyId='.env('AMAZON_API_KEY').'&AssociateTag='.env('AMAZON_ASSOCIATE_TAG');
                foreach ($cart as $key => $value) {
                    $purchaseUrl = $purchaseUrl.'&ASIN.'.$counter;
                    $purchaseUrl = $purchaseUrl.'='.$key;
                    $purchaseUrl = $purchaseUrl.'&Quantity.'.$counter;
                    $purchaseUrl = $purchaseUrl.'='.$value['qty'];
                    $counter++;
                }
            $request->session()->put('purchaseUrl',$purchaseUrl);
            $request->session()->save();
        }
        $setting = Settings::find(1);
        return view('partials.cartpartial')->with('setting',$setting);
    }
    public function deleteitem(Request $request)
    {
        $retval = array();
        $retval['code'] = 400;
        $retval['html'] = 'SomeThing Went Wrong!';
        $asin = $request->get('id');
        $qty = (int)$request->get('qty');
        $setting = Settings::find(1);

        if($request->get('qty') != 0){
            $request->session()->put('Cart.'.$asin.'.qty', $request->get('qty'));
        }else{
            $request->session()->pull('Cart.'. $asin);
        }
            
        $request->session()->save();

        $retval['code'] = 200;
        $retval['cartCount'] = count($request->session()->get('Cart'));
        $retval['html'] = View::make('partials.cartpartial')->with('setting',$setting)->render();

        return response::json($retval);

        //getcart();
        /*if($request->session()->has('CartId') && $request->session()->has('HMAC')){
            $cart_id = session('CartId');
            $hmac = session('HMAC');
        }elseif(Auth::check()){
            $cart_id = Auth::user()->cart_id;
            $hmac = Auth::user()->hmac;
        }
        $response = AmazonProduct::cartModify($cart_id, $hmac, $cartitemId, $qty);
        dd($response);*/
    }

}
