<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Invoice</title>
	
	<link href="{{ asset( 'backend/css/bootstrap.min.css' ) }}" rel="stylesheet">
	<link href="{{ asset( 'backend/css/font-awesome.min.css' ) }}" rel="stylesheet">
	<link href="{{ asset( 'backend/css/invoice.css' ) }}" rel="stylesheet">
	
</head>

<body>
	
	<div class="container-fluid invoice-container">

        <header>
            <div class="row align-items-center">
                <div class="col-sm-7 text-center text-sm-start mb-3 mb-sm-0"> <img id="logo" src="{{asset('backend/logo/logo.png')}}" title="Koice" alt="Elit-Hotel" /> </div>
                <div class="col-sm-5 text-center text-sm-end">
                    <h4 class="mb-0">Invoice</h4>
                    <p class="mb-0">Invoice Number - {{$details[0]->order_unique_id}}</p>
                </div>
            </div>
            <hr>
        </header>


        <main>
            <div class="row">
                <div class="col-sm-6 mb-3"> <strong>Name:</strong> <span>{{$details[0]->name}}</span> </div>
                <div class="col-sm-6 mb-3 text-sm-end"> <strong>Order Date:</strong> <span>{{$details[0]->order_date}}</span> </div>
            </div>
            <hr class="mt-0">
            <div class="row">
                <div class="col-sm-5"> <strong>Tour Destination:</strong>
                    <address>
                    Destination<br />
        </address>
                </div>
                <div class="col-sm-7">
                    <div class="row">
                        <div class="col-sm-4"> <strong>Address:</strong>
                            <p>{{substr($details[0]->address)}}</p> </div>
                        </div>
                        <div class="col-sm-4"> <strong>Number of Days:</strong>
                            <p>5 Days</p>
                        </div>
                        <div class="col-sm-4"> <strong>Number Of Children:</strong>
                            <p>5</p>
                        </div>
						<div class="col-sm-4"> <strong>Number Of Adult Members:</strong>
                            <p>12</p>
                        </div>
                        <div class="col-sm-4"> <strong>Booking ID:</strong>
                            <p>Order ID</p>
                        </div>
                        <div class="col-sm-4"> <strong>Payment Mode:</strong>
                            <p>Online Mode</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="card-header">
                                <tr>
                                    <td class="col-6"><strong>Description</strong></td>
                                    <td class="col-4 "><strong>Rate</strong></td>
                                    <td class="col-2 "><strong>Amount</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-6">Adult Charges</td>
                                    <td class="col-4">&#8377; Rs.123</td>
                                    <td class="col-2">&#8377; Rs. 123456</td>
                                </tr>
                                <tr>
                                    <td>Children Charges</td>
                                    <td class="col-2">&#8377; Rs.9087</td>
                                    <td>&#8377; Rs. 34546</td>
                                </tr>
                               
                               
                            </tbody>
                            <tfoot class="card-footer">
                            <tr>
                                    <td colspan="2"><strong>Sub Total:</strong></td>
                                    <td>&#8377; Rs. 098</td>
                                </tr>
                            <tr>
                                    <td>Coupon Code</td>
                                    <td> Soumya123 </td>
                                    <td>-&#8377; Rs. 9876</td>
                                </tr>
                               
                                <tr>
                                    <td colspan="2" class="border-bottom-0"><strong>Total:</strong></td>
                                    <td class="border-bottom-0">&#8377; Rs. 1234</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <p class="text-1 text-muted"><strong>Please Note:</strong> Amount payable is inclusive of central & state goods & services Tax act applicable slab rates. Please ask Hotel for invoice at the time of check-out.</p>
        </main>
        <!-- Footer -->
        <footer class="text-center">
            <hr>
            <p><strong>TEVILY</strong><br> 4th Floor, Plot No.22, Above Public Park, 145 Murphy Canyon Rd,<br> Suite 100-18, San Diego CA 2028. </p>
            <hr>
            <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p>
            <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a> 
				
				
				
			
				
				
				
				
			</div>
        </footer>
    </div>
	
    <p class="text-center d-print-none"><a href="#">&laquo; Back to My Account</a></p>
	
	
</body>
</html>
