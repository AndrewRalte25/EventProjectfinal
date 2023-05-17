<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;
use App\Models\Ticket;
use Razorpay\Api\Api;

use Illuminate\Support\Facades\App;

class RazorpayController extends Controller
{
    public function razorpay()
    {        
        $cates = Category::get();
        $events = Event::get();
        return view('Userdis', compact('Hotel','Event'));
    }

    public function payment(Request $request)
{           
    
    $input = $request->all();  
    
    $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
    $payment = $api->payment->fetch($input['razorpay_payment_id']);
    if (count($input) && !empty($input['razorpay_payment_id'])) {
        try {
            $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
        } 
        catch (\Exception $e) {
            Session::put('error', $e->getMessage());
            return redirect()->back();
        }
    }
    if(count($input) && !empty($input['razorpay_payment_id'])) {
        try {
           
            $eventPayment = new Ticket();
            $eventPayment->eventname = $request->eventname;
            $eventPayment->name = $request->name;
            $eventPayment->email = $request->email;
            $eventPayment->price = $request->price/100;
            $eventPayment->tax = 0;
            $eventPayment->mode = "online";
            $eventPayment->rzp_id = $request->razorpay_payment_id;
            $eventPayment->event_id=$request->event_id;
            $eventPayment->paymentdetails = "Event booking";
            $eventPayment->status = $response['status'];
            // dd($eventPayment);
            $eventPayment->save();

          
        } catch (\Exception $e) {
            return  $e->getMessage();
            Session::put('error',$e->getMessage());
            return redirect()->back();
        }
    }
    
  
    return redirect('/invoice/'.$eventPayment->id);
    
 }  


public function invoice($id)
{   $order = Ticket::where('id', $id)->first();
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadView('invoice', compact('order'))->setOptions(['defaultFont' => 'sans-serif']);
    $pdf->setPaper(array(0, 0, 396, 612));
    return $pdf->stream();
    
     
}



}