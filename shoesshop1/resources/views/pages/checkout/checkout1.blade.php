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
        	
				
          		<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>STT</th>
						        <th>Hình ảnh</th>
						        <th>Sản phẩm</th>
						        <th>Đơn giá</th>
						        <th>Số lượng</th>
						        <th>Thành tiền</th>
						        <th>&nbsp;</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr class="text-center">
						      	<td class="product-price">
						        	<h4>1</h4>
						        </td>
						        <td class="image-prod"><div class="img" style="background-image:url({{URL::to('public/frontend/images/product-3.jpg')}});"></div></td>
						        
						        <td class="product-name">
						        	<h3>Nike Free RN 2019 iD</h3>
						        	<p>Far far away, behind the word mountains, far from the countries</p>
						        </td>
						        
						        <td class="price">$4.90</td>
						        
						         <td class="product-name">
						        	<p>1</p>
						        
					          </td>
						        <td class="total">$4.90</td>
						      </tr><!-- END TR-->
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>

	         <div class="row mt-5 pt-3 d-flex">
	          	<div class="col-md-6 d-flex">
	          		<div class="cart-detail cart-total bg-light p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Thông tin giao hàng</h3>
	          			<form action="{{URL::to('payment')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" name="" class="form-control" placeholder="Email" required="" >
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="" class="form-control" placeholder="Họ và tên" required="">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="form-group">
                                    <textarea name="user_address"  class="form-control" rows="3" cols="20" placeholder="Địa chỉ giao hàng" required></textarea>                
                                </div>
                                <div class="form-group">
                                    <input type="text" name="" class="form-control" placeholder="Điện thoại" required="">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="form-group">
                                    <textarea name="user_address"  class="form-control" rows="3" cols="20" placeholder="Ghi chú giao hàng" required></textarea>                
                                </div>
                                <div class="sign-btn text-center">
                        		<button type="submit" class="btn btn-theme btn-primary py-3 px-4">Tiếp tục đến phương thức thanh toán</button>
                   				</div>

                               
                            </form>
					</div>
	          	</div>
	          
	          </div>
          
      </div>
    </section> <!-- .section -->

@endsection