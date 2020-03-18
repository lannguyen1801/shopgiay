@extends('shop_layout')
@section('content')
	<div class="hero-wrap hero-bread" style="background-image: url({{asset('public/frontend/images/bg_6.jpg')}});">
     	<div class="container">
        	<div class="row no-gutters slider-text align-items-center justify-content-center">
          		<div class="col-md-9 ftco-animate text-center">
          			<p class="breadcrumbs"><span class="mr-2"><a href="{{URL::to('/')}}">Trang chủ</a></span> <span>Đơn hàng</span></p>
            		<h1 class="mb-0 bread">Đơn hàng của tôi</h1>
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
						        <th>Mã đơn</th>
						        <th>Người nhận</th>
						        <th>Ngày đặt</th>
						        <th>Tổng tiền</th>
						        <th>Trạng thái</th>
						        <th>Thành tiền</th>
                                <th>Xem chi tiết</th>
						        <th>&nbsp;</th>
						      </tr>
						    </thead>
						    <tbody>
                                <?php {{$i=1;}} ?>
                                @foreach( $status as $key => $status)
								<tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{$status->dh_ma}}</td>
                                    <td>{{$status->dh_tenNhan}}</td>
                                    <td>{{$status->dh_ngayDat}}</td>
                                    <td>{{$status->dh_tongTien}}</td>
                                    <td>{{$status->dh_trangThai}}</td>
                                    <td>{{$status->dh_tongTien}}</td>
                                    <td><a href="{{URL::to('/view-customerdetails/'.$status->dh_ma)}}" class="btn btn-primary py-2 px-3">Xem thêm</a></td>
                                </tr>
                                <?php {{$i++;}} ?>
                                @endforeach
                                </tbody>
						  </table>
					  </div>
    			</div>
    		</div>



	         
	          	</div>
          
      
    </section> <!-- .section -->

@endsection