
<form action = "{{route('frontend.update_cart')}}" method = "POST">
@csrf
<table>
                     <thead>
                        <tr>
                           <th class="cart-romove item">Remove</th>
                           <th class="cart-description item">Image</th>
                           <th class="cart-product-name item">Product Name</th>
                           <th class="cart-qty item">Quantity</th>
                           <th class="cart-sub-total item">Product Price</th>
                           <th class="cart-total last-item">Grandtotal</th>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <td colspan="7">
                              <div >
                                 <span class="">
                                 <a href="{{route('frontend.index')}}" >Continue Shopping</a>
                                 <button type = "submit" name = "btn_update"  >Update shopping cart</button>
                                 
                                 </span>
                              </div>
                              <!-- /.shopping-cart-btn -->
                           </td>
                        </tr>
                     </tfoot>
<?php $subtotal = 0; ?>
@foreach($product as $pro)


                     <tr>
                           <td class="romove-item"><a href="{{route('frontend.delete_item',$pro['cart']->pro_id)}}" title="cancel" class="icon">Delete</a></td>
                           <td class="cart-image">
                              <a class="entry-thumbnail" href="">
                              <img src="{{asset('admin/img/'.$pro['cart']->pro_image)}}" alt="">
                              </a>
                           </td>
                           <td class="cart-product-name-info">
                              <h4 class='cart-product-description'><a href="detail.html">{{$pro['cart']->pro_name}}</a></h4>
                              <div class="row">
                                 <div class="col-sm-4">
                                    <div class="rating rateit-small"></div>
                                 </div>
                                 <div class="col-sm-8">
                                    <div class="reviews">
                                       (06 Reviews)
                                    </div>
                                 </div>
                              </div>
                              <!-- /.row -->
                           </td>
                           <td class="cart-product-quantity">
                              <div class="quant-input">
                                 <input type="number" name = "{{$pro['key']}}" value="{{$pro['value']}}">
                              </div>
                           </td>
                           <td class="cart-product-sub-total"><span class="cart-sub-total-price">$ {{$pro['cart']->pro_price}}</span></td>
                           <?php $total = ($pro['cart']->pro_price * $pro['value']); $subtotal += $total; ?>
                           <td class="cart-product-grand-total"><span class="cart-grand-total-price">$ {{$total}}</span></td>
                        </tr>


@endforeach

                     </table>
</form>

                     <div class="cart-sub-total">
                              Subtotal    <span class="inner-left-md"><?php echo (" $ ".$subtotal); $_SESSION['subtotal'] = $subtotal?></span>
                           </div>

                           
                              <a href = "{{route('frontend.checkout')}}"  name = "btn_check" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a><br><br><br>



                             

