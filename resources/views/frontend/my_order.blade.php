<div class="table-responsive">
              
    <table class="table">
       <thead>
          <tr>
           
                                  <th>Order Unique ID</th>
                                  <th>Order By</th>
                                  <th>Total Price</th>
                                  <th>Discount</th>
                                  <th>Tax</th>
                                  <th>Delivery Charge</th>
                                  <th>Payment Method</th>
                                  <th>Payment Status</th>
                                  <th>Order Date</th>
                                  <th>Delivery Status</th>
                                  <th>Delivery Date</th>
                                  <th>View</th>
          </tr>
       </thead>
       <!-- /thead -->
       
       <tbody>
           @foreach($order as $order)
           <tr>
                <td>{{$order->order_unique_id}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->total_price}}</td>
                <td>{{$order->discount}}</td>
                <td>{{$order->tax}}</td>
                <td>{{$order->delivery_charge}}</td>
                <td>{{$order->payment_method}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->order_date}}</td>
                <td>{{$order->delivery_status}}</td>
                <td>{{$order->delivery_date}}</td>
                <td><a href = "{{route('frontend.bill',$order->order_id)}}">View</a></td>
           </tr>
@endforeach
       </tbody>
       <!-- /tbody -->
    </table>
    
    <!-- /table -->
 </div>   