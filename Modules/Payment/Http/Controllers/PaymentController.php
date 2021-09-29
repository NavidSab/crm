<?php  
  namespace Modules\Payment\Http\Controllers;

  use Illuminate\Http\Request;
  use Modules\Payment\Services\PayPal as PayPalClient;
  use Modules\Payment\Http\Facades\PayPal;

  use Illuminate\Routing\Controller;

  class PaymentController extends Controller
  {



    public $title;
    public $description;
    public function __construct(){
        $this->title='Payment';
        $this->description='description';
        $this->middleware('auth');
    }

    
    public function index()
    {
        $title='Payment';
        $description='Payment Action';
        return view('payment::index',compact('title','description'));

    }
      /**
       * Responds with a welcome message with instructions
       *
       * @return \Illuminate\Http\Response
       */
      public function payment()
      {
        $config = [
            'mode'    => 'live',
            'live' => [
                'client_id'         => 'some-client-id',
                'client_secret'     => 'some-client-secret',
                'app_id'            => 'APP-80W284485P519543T',
            ],
        
            'payment_action' => 'Sale',
            'currency'       => 'USD',
            'notify_url'     => 'https://your-app.com/paypal/notify',
            'locale'         => 'en_US',
            'validate_ssl'   => true,
        ];
        $provider = new PayPalClient;
        $provider->setApiCredentials($config);
        $provider->setCurrency('EUR');
        $response=$provider->createOrder([
            "intent"=> "CAPTURE",
            "purchase_units"=> [
                "amount"=> [
                  "currency_code"=> "USD",
                  "value"=> "100.00"
                ]
            ]
        ]);

        
          return redirect($response['paypal_link']);
      }
     
      /**
       * Responds with a welcome message with instructions
       *
       * @return \Illuminate\Http\Response
       */
      public function cancel()
      {
          dd('Your payment is canceled. You can create cancel page here.');
      }
    
      /**
       * Responds with a welcome message with instructions
       *
       * @return \Illuminate\Http\Response
       */
      public function success(Request $request)
      {
          $response = $provider->getExpressCheckoutDetails($request->token);
    
          if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
              dd('Your payment was successfully. You can create success page here.');
          }
    
          dd('Something is wrong.');
      }
  }