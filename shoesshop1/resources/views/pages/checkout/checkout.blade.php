@extends('shop_layout')
@section('content')

    <div class="hero-wrap hero-bread" style="background-image: url({{asset('public/frontend/images/bg_6.jpg')}});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{URL::to('/')}}">Trang chủ</a></span> <span>Đặt hàng</span></p>
                    <h1 class="mb-0 bread">Đặt hàng</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            
            <?php
                $content = Cart::content();
            ?>
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">

                        <table class="table">
                            <thead class="thead-primary">
                                 <tr class="text-center">
                                    <th>STT</th>
                                    <th>Hình ảnh</th>
                                    <th>Sản phẩm</th>
                                    <th>Kích cỡ</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    
                                </tr>
                            </thead>

                            @foreach($content as $v_content)<!-- tien -->
                                <tbody>
                                    <tr class="text-center">
                                        <td class="product-price">
                                            <h4>1</h4>
                                        </td>
                                        <td class="image-prod"><div class="img" style="background-image:url({{URL::to('public/upload/product/'.$v_content->options->image)}});" ></div></td>
                                        
                                        <td class="product-name">
                                            <h3>{{$v_content->name}}</h3>
                                            
                                        </td>
                                        <td class="quantity">
                                            <h3>{{$v_content->options->size}}</h3>                                          
                                        </td>
                                        
                                        <td class="price">{{number_format($v_content->price).' '.'vnđ'}}</td>
                                        
                                        <td class="quantity">
                                            <h4>{{$v_content->qty}}</h4>
                                                        {{-- <input type="number" name="cart_quantity" class="quantity form-control input-number" value="{{$v_content->qty}}" min="1" max="100"> --}}       
                                                
                                        </td>
                                        <td class="total">
                                            <p class="cart_total_price">
                                            
                                            <?php
                                            $subtotal = $v_content->price * $v_content->qty;
                                            echo number_format($subtotal).' '.'vnđ';
                                            ?><!-- Tien -->
                                        </p>
                                        </td>
                                        </tr><!-- END TR-->
                                    </tbody>
                            @endforeach 
                        </table>
                    </div>
                </div>
            </div>
             <div class="row mt-5 pt-3 d-flex">
                <div class="col-md-6 d-flex">
                    <div class="cart-detail cart-total bg-light p-3 p-md-4">
                        <h3 class="billing-heading mb-4">Thông tin giao hàng</h3>
                        <form action="{{URL::to('save-checkout-customer')}}" method="post">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <input type="text" name="dh_tenNhan" class="form-control" placeholder="Họ và tên người nhận" required="">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="form-group">
                                    <input type="" name="dh_email" class="form-control" placeholder="Email"{{-- THÊM NÈ --}} required="" title="The domain portion of the email address is invalid (the portion after the @)." pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" >
                                    {{-- @if($errors->first('dh_email'))
                                    <p class="text-primary"> Email nhập sai định dạng!</p>
                                    @endif --}}
                                    {{-- <p class="help is-danger">{{ $errors->first('dh_email') }}</p> --}}
                                    <i class="ik ik-user"></i>
                                </div>
                                
                                <div class="form-group">
                                    <textarea name="dh_diaChiNhan"  class="form-control" rows="3" cols="20" placeholder="Địa chỉ nhận hàng" required></textarea>                
                                </div>
                                <div class="form-group">
                                    <input type="tel" name="dh_dienThoai" class="form-control" placeholder="Điện thoại" required="" {{-- Thêm nè --}} pattern="[0]{1}[0-9]{9}" title="SĐT hợp lệ là số có 10 số và bắt đầu bằng 0">
                                   {{--  @if($errors->first('dh_dienThoai'))
                                    <p class="text-primary"> Số điện thoại không đúng định dạng!</p>
                                    @endif --}}
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="form-group">
                            <label for="exampleInputPassword1">Phương thức vận chuyển</label>
                            <div>
                                {{-- <input type="hidden" value="{{$v_content->rowId}}" id="rowId"> --}}
                                <select {{-- THÊM NÈ --}} required="" id="vc_ma" name="vc_ma" class="form-control m-bot15">
                                <option value="">Chọn phương thức vận chuyển</option>
                                @foreach($ma_vanchuyen as $key => $mavc)
                                
                                <option value="{{$mavc->vc_ma}}">{{$mavc->vc_ten}}</option>
                                @endforeach
                            </select>
                            </div>
                            
                        </div>
                                <div class="form-group">
                                    <textarea name="dh_ghiChu"  class="form-control" rows="3" cols="20" placeholder="Ghi chú giao hàng" required></textarea>                
                                </div>
                                <div class="sign-btn text-center">
                                <button type="submit" class="btn btn-theme btn-primary py-3 px-4">Tiếp tục đến phương thức thanh toán</button>
                                </div>

                            </form> 
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="cart-detail cart-total bg-light p-3 p-md-4">
                        <h3 class="billing-heading mb-4">Tổng tiền giỏ hàng</h3>
                        <p class="d-flex">
                            <span>Thành tiền</span>
                            <span>{{number_format((double)Cart::subtotal(2,'.','')).' VND'}}</span>
                        </p>
                        <p  class="d-flex">
                            <span>Phí giao hàng</span>
                            
                          {{-- <span><input id="price" value="0" type="number" name="price" disabled></span> --}}
                          <?php (int)$phi= 0; ?>
{{-- THÊM NÈ --}}
                          <a id="price" name="price">{{$phi}} VND</a>
                        </p>
                        
                        
                        <hr>
                        <p class="d-flex total-price">
                            <span>Tổng tiền</span>
                            <?php $subtt =(int)Cart::subtotal(2,'.',''); ?> {{-- bo dau hang nghin, chuyen sau thap phan thanh , --}}
{{-- THÊM NÈ --}}
                            <input type="hidden" id="tong" name="tong" value="{{$subtt}}" type="number">
                            <span class="tongtien" id="tongtien">{{number_format($subtt)}} VND</span>

                            {{-- <a id="tongtien" name="tongtien">{{number_format($subtt)}} VND</a> --}}
                        </p>
                    </div>
                </div>
            </div>
           

          
      </div>
<script src="http://www.codermen.com/js/jquery.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.pack.js"></script>
<script type="text/javascript">
     $(document).ready(function(){ 
        $('select[name="vc_ma"]').on('change',function(){
                var vcma = $(this).val();
                console.log(vcma);
                var tongtien = $('#tong').val(); 
                console.log(tongtien);
                if(vcma){
                    $.ajax({
                        url: "{{url('get-price')}}?vcma="+vcma,
                        type: 'GET',
                        contentType: "application/json;charset=utf-8",
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                           $('select[name="value"]').empty();
                             $.each(data, function(key,value){
                               var tongn = parseInt(tongtien)+value;
                                $('a[name="price"]').replaceWith('<a id="price" name="price">'+value.toLocaleString('en-US')+' VND</a>');
                               $('.tongtien').replaceWith(' <span class="tongtien" id="tongtien">'+tongn.toLocaleString('en-US')+' VND</span>');
                                
                             });
                        }
                    });
                }else{
                     $('a[name="price"]').empty();
                }
            });
        });
</script>


    </section> <!-- .section -->

@endsection