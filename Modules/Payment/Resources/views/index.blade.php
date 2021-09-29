

@extends('layouts.contentLayoutMaster')
@section('title', $title)
@section('content')
<!-- Basic Tables start -->
<div class="row" id="basic-table">
   <div class="col-12">
       <div class="card">

           <div class="table">
            <div class="content">
                <h1>PayPal Integration Tutorial </h1>
                  
                <table border="0" cellpadding="10" cellspacing="0" align="center">
                    <tr>
                        <td align="center"></td>
                    </tr>

                    <tr>
                    <td align="center">
                        <a href="https://www.paypal.com/in/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" border="0" alt="PayPal Logo">
                        </a>
                    </td>
                    </tr>

                    
                    </table>
        
                <a href="{{ route('payment.gatway') }}" class="btn btn-success">Pay $100 from Paypal</a>
        
            </div>
           </div>
       </div>
   </div>
</div>
<!-- Basic Tables end -->
@endsection









