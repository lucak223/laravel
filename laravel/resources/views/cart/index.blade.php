@extends('template.user')
@section('body')

 
    

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">
                <!-- Cart List Title -->
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">

                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Giá</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                       
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Total</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                <!-- End Cart List Title -->
                <!-- Cart Single List list -->
                 @foreach ($cart as $item)
                <div class="cart-single-list">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href="product-details.html"><img src="assets/images/cart/01.jpg" alt="#"></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <h5 class="product-name"><a href="/detail/{{ $item['slug'] }}">
                              {{ $item['name'] }}</a></h5>
                            <p class="product-des">
                                <span><em>Type:</em> Mirrorless</span>
                                <span><em>Color:</em> Black</span>
                            </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                  @if($item['sale_price'])
                      <del>{{ number_format($item['price']) }}</del>
                      <p>{{ number_format($item['sale_price']) }}</p>
                  @else
                      <p>{{ number_format($item['price']) }}</p>
                  @endif
              </div>
              <div class="col-lg-2 col-md-2 col-12">
    <input class="form-control quantity-change"
           type="number" name="quantity" min="1"
           value="{{ $item['quantity'] }}" data-id="{{ $item['id'] }}">
</div>
              <div class="col-lg-2 col-md-2 col-12">
              <p>{{ number_format($item['total']) }}</p>
              </div>
              <div class="col-lg-1 col-md-2 col-12">
    <a class="remove-item" href="javascript:void(0)"
       data-id="{{ $item['id'] }}">
        <i class="lni lni-close" data-id="{{ $item['id'] }}"></i>
    </a>
</div>
            
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                    <li>Tổng Tiền<span>{{ number_format($totalMoney) }}</span></li>

                                   
                                    </ul>
                                    <div class="button">
                                        <a href="checkout.html" class="btn">Checkout</a>
                                        <a href="product-grids.html" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <form action="/payment" id="frmCreateOrder" method="post">   
        @csrf     
                    <div class="form-group">
                        <label for="amount">Số tiền</label>
                        <input class="form-control" data-val="true" data-val-number="The field Amount must be a number." data-val-required="The Amount field is required." id="amount" max="100000000" min="1" name="amount" type="number" value="{{$totalMoney}}" />
                    </div>
                     <h4>Chọn phương thức thanh toán</h4>
                    <div class="form-group">
                        <h5>Cách 1: Chuyển hướng sang Cổng VNPAY chọn phương thức thanh toán</h5>
                       <input type="radio" Checked="True" id="bankCode" name="bankCode" value="">
                       <label for="bankCode">Cổng thanh toán VNPAYQR</label><br>
                       
                       <h5>Cách 2: Tách phương thức tại site của đơn vị kết nối</h5>
                       <input type="radio" id="bankCode" name="bankCode" value="VNPAYQR">
                       <label for="bankCode">Thanh toán bằng ứng dụng hỗ trợ VNPAYQR</label><br>
                       
                       <input type="radio" id="bankCode" name="bankCode" value="VNBANK">
                       <label for="bankCode">Thanh toán qua thẻ ATM/Tài khoản nội địa</label><br>
                       
                       <input type="radio" id="bankCode" name="bankCode" value="INTCARD">
                       <label for="bankCode">Thanh toán qua thẻ quốc tế</label><br>
                       
                    </div>
                    <div class="form-group">
                        <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                         <input type="radio" id="language" Checked="True" name="language" value="vn">
                         <label for="language">Tiếng việt</label><br>
                         <input type="radio" id="language" name="language" value="en">
                         <label for="language">Tiếng anh</label><br>
                         
                    </div>
                    <button type="submit" class="btn btn-default" href>Thanh toán</button>
                </form>
    @csrf
    <script>
    document.querySelectorAll('.quantity-change').forEach(input => {
        input.addEventListener('change', (event) => {
            let id = event.target.getAttribute('data-id');
            let value = event.target.value;
            fetch(`/cart/${id}`, {
                method: "PATCH",
                headers: {
    'Content-Type': 'application/json',
    'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value,
},
                body: JSON.stringify({
                    quantity: value
                })
            }).then(() => {
                location.reload();
            });
        });
    });
    document.querySelectorAll('.remove-item').forEach(btn => {
    btn.addEventListener('click', (event) => {
        let id = event.target.getAttribute('data-id');
        fetch(`/cart/${id}`, {
            method: "DELETE",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value,
            },
        }).then(() => {
            location.reload();
        });
    });
});

</script>
    <!--/ End Shopping Cart -->
    @endsection('body')