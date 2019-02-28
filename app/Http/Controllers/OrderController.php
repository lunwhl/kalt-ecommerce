<?php

namespace App\Http\Controllers;

use Auth;
use Cart;
use App\Order;
use App\Item;
use App\Product;
use App\Common;
use Illuminate\Support\Facades\Mail;
use App\Mail\PurchaseToAdminEmail;
use App\Mail\PurchaseToCustomerEmail;
use Illuminate\Http\Request;
use Billplz\Client;
use Http\Client\Common\HttpMethodsClient;
use Http\Adapter\Guzzle6\Client as GuzzleHttpClient;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use Illuminate\Support\Facades\Input;
use App\Jobs\GeneratePDF;
use PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $rules = array(
        'billing_name' => 'required|string|max:255',
        'billing_address' => 'required|string|max:255',
        'billing_city' => 'required|string|max:255',
        'billing_state' => 'required|string|max:255',
        'billing_postcode' => 'required|string|max:255',
        'billing_email' => 'required|string|email|max:255',
        'billing_phone' => array(
                                'required',
                                'regex:/^(\+?6?01)[0-46-9]-*[0-9]{7,8}$/'
                            ),
        'shipping_name' => 'required_if:different_shipping,true',
        'shipping_address'=> 'required_if:different_shipping,true',
        'shipping_city'=> 'required_if:different_shipping,true',
        'shipping_state'=> 'required_if:different_shipping,true',
        'shipping_postcode'=> 'required_if:different_shipping,true',
        'shipping_email'=> 'required_if:different_shipping,true',
        'shipping_phone'=> array(
                                'required_if:different_shipping,true',
                                'regex:/^(\+?6?01)[0-46-9]-*[0-9]{7,8}$/'
                            ),
    );

    public $messages = array(
        'shipping_name.required_if'=> 'Name is required',
        'shipping_address.required_if'=> 'Address is required',
        'shipping_city.required_if'=> 'City is required',
        'shipping_state.required_if'=> 'State is required',
        'shipping_postcode.required_if'=> 'Postcode is required',
        'shipping_email.required_if'=> 'Email is required',
        'shipping_phone.required_if'=> 'Phone is required'
    );

    public function index()
    {
        return view('order.page');
    }

    public function items()
    {
        $sorting = request()->descending == 'true' ? 'DESC' : 'ASC';
        $skip = (request()->page - 1) * request()->row;
        
        $orders = Auth::user()->orders()->with('items')
                                ->orderBy(request()->sort_by, $sorting)
                                ->skip($skip)
                                ->take(request()->row)
                                ->get();

        return response(['orders' => $orders]);
    }

    public function total()
    {
        $total = Auth::user()->orders()->count();

        return response(['total' => $total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules, $this->messages);

        try {
                $billplz = Client::make('aa1451d2-6df3-4f7c-9d0b-14a098e0bf56');
                $collectionResponse = $this->createCollection($request, $billplz);
                $collectionBill = $this->createBill($request, $billplz, $collectionResponse['id']);
                $redirectUrl = $collectionBill['url'];
                $order = $this->createOrder($request, $collectionResponse['id'], $collectionBill['id']);
                $this->createItem($order);

                Common::deleteCart();
                Cart::destroy();

                return response(['url' => $redirectUrl]);
        }
        catch (\Exception $e) {
            return response(500);
        }
    
    }

    public function createBill($request, $billplz, $collectionId)
    {
        $bill = $billplz->bill();

        $response = $bill->create(
            $collectionId,
            $request->billing_email,
            null,
            $request->billing_name,
            $request->total * 100,
            // 'http://kalt.local//api/order/completed',
            'https://test.kalt.com.my/api/order/completed',
            $request->billing_name . ' bill',
            // ['redirect_url' => 'http://kalt.local//api/order/completed']
            ['redirect_url' => 'https://test.kalt.com.my/api/order/completed']
        );

        return $response->toArray();
    }

    public function createCollection($request, $billplz)
    {
        $billplz->useSandbox();
        $collection = $billplz->collection();
        $response = $collection->create($request->billing_name . ' collection');

        return $response->toArray();
    }

    public function createOrder($request, $billplzCollectionId, $billplzBillId)
    {
        if($request->different_shipping)
            return Order::create([
                        'user_id' => auth()->user()->id,
                        'billing_name'=> $request->billing_name,
                        'billing_company_name'=> $request->billing_company_name,
                        'billing_address'=> $request->billing_address,
                        'billing_city'=> $request->billing_city,
                        'billing_state'=> $request->billing_state,
                        'billing_postcode'=> $request->billing_postcode,
                        'billing_email'=> $request->billing_email,
                        'billing_phone'=> $request->billing_phone,
                        'shipping_name'=> $request->shipping_name,
                        'shipping_company_name'=> $request->shipping_company_name,
                        'shipping_address'=> $request->shipping_address,
                        'shipping_city'=> $request->shipping_city,
                        'shipping_state'=> $request->shipping_state,
                        'shipping_postcode'=> $request->shipping_postcode,
                        'shipping_email'=> $request->shipping_email,
                        'shipping_phone'=> $request->shipping_phone,
                        'subtotal'=> $request->subtotal,
                        'shipping_price'=> $request->shipping_price,
                        'total'=> $request->total,
                        'note'=> $request->note,
                        'pickup'=> $request->pickup,
                        'billplz_collection_id'=> $billplzCollectionId,
                        'billplz_bill_id'=> $billplzBillId
            ]);
        else
            return Order::create([
                        'user_id' => auth()->user()->id,
                        'billing_name'=> $request->billing_name,
                        'billing_company_name'=> $request->billing_company_name,
                        'billing_address'=> $request->billing_address,
                        'billing_city'=> $request->billing_city,
                        'billing_state'=> $request->billing_state,
                        'billing_postcode'=> $request->billing_postcode,
                        'billing_email'=> $request->billing_email,
                        'billing_phone'=> $request->billing_phone,
                        'shipping_name'=> $request->billing_name,
                        'shipping_company_name'=> $request->billing_company_name,
                        'shipping_address'=> $request->billing_address,
                        'shipping_city'=> $request->billing_city,
                        'shipping_state'=> $request->billing_state,
                        'shipping_postcode'=> $request->billing_postcode,
                        'shipping_email'=> $request->billing_email,
                        'shipping_phone'=> $request->billing_phone,
                        'subtotal'=> $request->subtotal,
                        'shipping_price'=> $request->shipping_price,
                        'total'=> $request->total,
                        'note'=> $request->note,
                        'pickup'=> $request->pickup,
                        'billplz_collection_id'=> $billplzCollectionId,
                        'billplz_bill_id'=> $billplzBillId
            ]);
    }

    public function createItem($order)
    {
        $carts = Cart::content();
        foreach($carts as $cart) {
            $item = Item::create([
                       'order_id' => $order->id,
                       'name' => $cart->name,
                       'description' => Product::find($cart->id)->description,
                       'price' => $cart->price,
                       'model' => $cart->options['model'],
                       'image_path' => Product::find($cart->id)->image_path,
                       'qty' => $cart->qty,
                       'installation_type' => $cart->options['installation'],
                       'installation_price' => $cart->options['installationPrice'],
                    ]); 

            $product = Product::find($cart->id);
            $product->sold_qty = $product->sold_qty + $cart->qty;
            $product->save();
        };    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function loadDirect()
    {
        $status = Input::get('billplz')['paid'];
        if($status == 'true'){
            $order = Order::where('user_id', auth()->user()->id)->orderBy('updated_at', 'DESC')->first();
            $order->status = 'paid';
            $order->save();

            $items = Item::where('order_id', $order->id)->get();

            $pdfInvoice = PDF::loadView('pdf.invoice', ['order' => $order, 'items' => $items]);
            $pdfInvoice->save('storage/invoices/'. $order->id . '.pdf');

            $pdfReceipt = PDF::loadView('pdf.receipt', ['order' => $order, 'items' => $items]);
            $pdfReceipt->save('storage/receipts/'. $order->id . '.pdf');

            $pdfDeliverOrder = PDF::loadView('pdf.deliveryOrder', ['order' => $order, 'items' => $items]);
            $pdfDeliverOrder->save('storage/deliveryOrders/'. $order->id . '.pdf');

            Mail::to("info@kalt.com.my")->send(new PurchaseToAdminEmail($order));
            Mail::to($order->billing_email)->send(new PurchaseToCustomerEmail($order));
        }
            
        return view('checkout.thankyou', ['status' => $status]);
    }

    public function thankyou()
    {
        $order = Order::with('items')->where('user_id', auth()->user()->id)->orderBy('updated_at', 'DESC')->first();

        return view('thankyou.page', ['order' => $order]);
    }
}
