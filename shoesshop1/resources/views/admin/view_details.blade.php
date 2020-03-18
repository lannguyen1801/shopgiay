@extends('admin_layout')
@section('content')

<div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-credit-card bg-blue"></i>
                                        <div class="d-inline"> 
                                             @foreach($ten as $key => $ma)
                                            <h5>Chi tiết đơn hàng: Mã {{$ma->dh_ma}}</h5>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="{{URL::to('/dashboard')}}"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item active">
                                               
                                                <a href="#">Quản lý lịch sử</a>
                                                
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Lịch sử mua hàng</li>
                                            <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
								<div class="card">
                                    <div class="card-header d-block">
                                        <h3>Thông tin người nhận</h3>
                                        <?php
                                        $message =Session::get('message');
                                        if($message){
                                          echo '<span class="text-alert">'.$message.'</span>';
                                          Session::put('message', null);
                                        }
                                      ?>
                                    </div>
                                    <div class="card-body p-0 table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Tên người nhận</th>
                                                        <th>Địa chỉ</th>
                                                        <th>Số điện thoại</th>
                                                </thead>
                                                <tbody>
                                                    @foreach( $ten as $key => $dh_ct)
                                                    <tr>
                                                        <td>{{$dh_ct->dh_tenNhan}}</td>
                                                        <td>{{$dh_ct->dh_diaChiNhan}}</td>
                                                        <td>{{$dh_ct->dh_dienThoai}}</td>
                                                    </tr>
                                                    <?php $phivanchuyen=0;?>
                                                        @foreach($vanchuyen as $key => $vc)
                                                        <?php
                                                        
                                                        if($dh_ct->vc_ma==$vc->vc_ma){
                                                            
                                                            $phivanchuyen=$vc->vc_phi;
                                                            
                                                        }
                                                        ?>
                                                        @endforeach

                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header d-block">
                                        <h3>Danh sách sản phẩm</h3>
                                        <?php
                                        $message =Session::get('message');
                                        if($message){
                                          echo '<span class="text-alert">'.$message.'</span>';
                                          Session::put('message', null);
                                        }
                                      ?>
                                    </div>
                                    <div class="card-body p-0 table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Số lượng</th>
                                                        <th>Đơn giá</th>
                                                        <th>Tổng tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <?php {{$i=1;}}
                                                     $sum=0;
                                                      ?>
                                                     
                                                    @foreach( $chitiet_ctsp as $key => $ct_ctsp)
                                                    <tr>
                                                        <th scope="row">{{$i}}</th>
                                                        @foreach($sanpham as $key => $sp)
                                                        <?php
                                                        if($ct_ctsp->sp_ma==$sp->sp_ma){
                                                            ?>
                                                        <td>{{$sp->sp_ten}}</td>
                                                         <td>{{$ct_ctsp->soLuongDat}}</td>
                                                        <td>{{$sp->sp_donGiaBan}}</td>
                                                        
                                                        <td>
                                                            <?php
                                                            $tong= $ct_ctsp->soLuongDat * $sp->sp_donGiaBan;
                                                            echo number_format($tong).' vnd';
                                                            $sum+=$tong;
                                                            ?>
                                                        </td>
                                                        <?php 
                                                        }
                                                        ?>
                                                        @endforeach

                        
                                                    </tr>
                                                    <?php {{$i++;}} ?>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


            <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header d-block">
                                        <h3><b>THANH TOÁN</b></h3>
                                        <h3>Phí vận chuyển: {{$phivanchuyen}}</h3>
                                        <h3>Tổng hóa đơn: {{$sum}}</h3>
                                        <h3><b>Thành tiền: 
                                            <?php
                                                
                                                echo number_format($phivanchuyen+$sum).' vnd';
                                             ?>
                                        </b></h3>
                                        
                                </div>
                            </div>
                        </div>
                    </div>


@endsection