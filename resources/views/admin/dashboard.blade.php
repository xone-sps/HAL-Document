@extends('admin.main')
@section('content')
<section class="content">
<div class="body_scroll">
<div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col">
                         <h2>Hal Logistic Document Management System Dashboard</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item">eCommerce</li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center">
                    <div class="card">
                        <div class="body">                            
                            <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100"></canvas><input type="text" class="knob" value="42" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgcolor="#00adef" readonly="readonly" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; background: none; font: bold 20px Arial; text-align: center; color: rgb(0, 173, 239); padding: 0px; -webkit-appearance: none;"></div>
                            <p>Customers</p>
                            <div class="d-flex bd-highlight text-center mt-4">
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">Direct</small>
                                    <h5 class="mb-0">254</h5>
                                </div>
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">Discovery</small>
                                    <h5 class="mb-0">254</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center">
                    <div class="card">
                        <div class="body">                            
                            <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100"></canvas><input type="text" class="knob" value="81" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgcolor="#ee2558" readonly="readonly" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; background: none; font: bold 20px Arial; text-align: center; color: rgb(238, 37, 88); padding: 0px; -webkit-appearance: none;"></div>
                            <p>Total Orders</p>
                            <div class="d-flex bd-highlight text-center mt-4">
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">Internal</small>
                                    <h5 class="mb-0">34GB</h5>
                                </div>
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">External</small>
                                    <h5 class="mb-0">531GB</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center">
                    <div class="card">
                        <div class="body">                            
                            <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100"></canvas><input type="text" class="knob" value="62" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgcolor="#8f78db" readonly="readonly" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; background: none; font: bold 20px Arial; text-align: center; color: rgb(143, 120, 219); padding: 0px; -webkit-appearance: none;"></div>
                            <p>Investiment</p>
                            <div class="d-flex bd-highlight text-center mt-4">
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">Internal</small>
                                    <h5 class="mb-0">25<small>(-23%)</small></h5>
                                </div>
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">External</small>
                                    <h5 class="mb-0">12<small>(+150%)</small></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center">
                    <div class="card">
                        <div class="body">                            
                            <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100"></canvas><input type="text" class="knob" value="38" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgcolor="#f67a82" readonly="readonly" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; background: none; font: bold 20px Arial; text-align: center; color: rgb(246, 122, 130); padding: 0px; -webkit-appearance: none;"></div>
                            <p>Revenue</p>
                            <div class="d-flex bd-highlight text-center mt-4">
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">Inbound</small>
                                    <h5 class="mb-0">15K</h5>
                                </div>
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">Outbound</small>
                                    <h5 class="mb-0">2K</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
    </div>
</div>
</section>

@endsection