
<center>


<div class="container">
    
    <div class="row justify-content-center">
    <div class="card card-nav-tabs text-center">
  <div class="card-header card-header-primary">
    
  </div>
  <div class="card-body">
    <h4 class="card-title">
        <?php
    $amt = $semester->amount+$semester->amount*3/100;
    ?>
      Paying : <b class="text-success"> {{$amt}} ({{$semester->amount}}+{{$semester->amount*3/100}} ) Rs (3% extra for internet handling charges)</b> 
    </h4>
    <p class="card-text"></p>
    
<form action="/payment/{{$semester->id}}" method="post">
        {{ csrf_field() }}
    <script src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="rzp_live_gRLBUvHd4EH63E"// Your Api kEY
        data-amount="{{ $amt*100 }}"
        data-buttontext="Pay Now"
        data-name="REIMALIE ACADEMY"
        data-description="REIMALIE ACADEMY"
        data-image="" ///Your Company Logo 
        data-prefill.name="{{ Auth::user()->name }}"
        data-prefill.email="{{ Auth::user()->email }}"
        data-prefill.contact="{{ Auth::user()->mobile }}"
        data-theme.color="#F37254"> </script>

    </form>
    
  </div>
  <div class="card-footer text-muted">
   
  </div>
</div>
<style>
  .razorpay-payment-button{
    background-color: #4CAF50 !important; /* Green */
    border: none !important;
    color: white !important;
    padding: 15px 32px !important;
    text-align: center !important;
    text-decoration: none !important;
    display: inline-block !important;
    font-size: 16px !important;
  }
  .razorpay-payment-button:active{
    background-color: #4CAF50 !important; /* Green */
    border: none !important;
    color: white !important;
    padding: 15px 32px !important;
    text-align: center !important;
    text-decoration: none !important;
    display: inline-block !important;
    font-size: 16px !important;
  }
</style>

</div>
</div>
</center>
