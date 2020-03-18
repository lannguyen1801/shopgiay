@extends('shop_layout')
@section('content')
 <div class="hero-wrap hero-bread" style="background-image: url({{URL::to('public/frontend/images/bg_6.jpg')}});">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{URL::to('/')}}">Trang chủ</a></span> <span>Khách hàng</span></p>
            <h1 class="mb-0 bread">Thông tin khách hàng</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section ftco-cart">
			<div class="container">
    		<div class="row justify-content-start">
    			<div class="col col-lg-12 col-md-12 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3 class="billing-heading mb-4">Thông tin khách hàng</h3>
    					<?php
    $message =Session::get('message');
    if($message){
      echo '<span class="text-alert">'.$message.'</span>';
      Session::put('message', null);
    }
  ?>
    					@foreach($nguoi_dung as $key => $ndma)
    					<p class="d-flex">
    						<span>Mã khách hàng</span>
    						<span>{{$ndma->nd_ma}}</span>
    					</p>
	          			<p class="d-flex">
    						<span>Họ và tên</span>
    						<span>{{$ndma->nd_ten}}</span>
    					</p>
    					<p class="d-flex">
    						<span>Email</span>
    						<span>{{$ndma->nd_email}}</span>
    					</p>
    					<p class="d-flex">
    						<span>Số điện thoai</span>
    						<span>{{$ndma->nd_dienThoai}}</span>
    					</p>
    					<p class="d-flex">
    						<span>Giới tính</span>
    					
    						@if($ndma->nd_gioiTinh==0)
    							<span>Nữ</span>
    						@else
    							<span>Nam</span>
    						@endif
    						
    					</p>
    					<p class="d-flex">
    						<span>Ngày sinh</span>
    						<span>{{$ndma->nd_ngaySinh}}</span>
    					</p>
    					<p class="d-flex">
    						<span>Địa chỉ</span>
    						<span>{{$ndma->nd_diaChi}}</span>
    					</p>
    					@endforeach
    				</div>
    				<p class="text-center"><a href="{{URL::to('/chinhsua-thongtin')}}" class="btn btn-primary py-3 px-4">Chỉnh sửa thông tin</a></p>
    			</div>
    		</div>
			</div>
		</section>
    
@endsection

