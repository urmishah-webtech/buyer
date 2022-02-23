@extends('protected.admin.master')
@section('title', 'Admin Dashboard')
@section('content')
@if (session()->has('flash_message'))
   <p>{{ session()->get('flash_message') }}</p>
@endif
<div class="row">
   @foreach($modules as $rowdata)
      @if($rowdata->name == @$content)
         <div class="col-md-12 col-sm-6">
            <!-- BEGIN REGIONAL STATS PORTLET-->
            <!-- <div class="admin-alert-alert">
               <div class="alert alert-danger d-flex align-items-center">
                  Please Configure SMTP Setting to work all email sending functionality,
                  <a class="alert-link ml-2" href="http://localhost/script/script/install/admin/smtp-settings">Configure Now</a>
              </div>
            </div> -->
            <div class="dashboard-pd-sec">
               <div class="row">
                  <div class="col-md-6">
                     <div class="row dash-count">
                        <div class="col-md-6">
                           <div class="dash-count-box bg-grad-1">
                              <div class="dash-count-content">
                                 <div class="dash-count-title">
                                    <span>Total</span>
                                    <span>Customer</span>
                                 </div>
                                 <div class="pd-count">2</div>
                              </div>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                 <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                              </svg>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="dash-count-box bg-grad-2">
                              <div class="dash-count-content">
                                 <div class="dash-count-title">
                                    <span>Total</span>
                                    <span>Order</span>
                                 </div>
                                 <div class="pd-count">46</div>
                              </div>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                 <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                              </svg>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="dash-count-box bg-grad-3">
                              <div class="dash-count-content">
                                 <div class="dash-count-title">
                                    <span>Total</span>
                                    <span>Product category</span>
                                 </div>
                                 <div class="pd-count">249</div>
                              </div>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                 <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                              </svg>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="dash-count-box bg-grad-4">
                              <div class="dash-count-content">
                                 <div class="dash-count-title">
                                    <span>Total</span>
                                    <span>Product brand</span>
                                 </div>
                                 <div class="pd-count">100</div>
                              </div>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                 <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                              </svg>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="dash-card">
                              <div class="card-header">
                                 <h4>Products</h4>
                              </div>
                              <div class="chart-body">
                                 <div class="first" width="400" height="400">
                                    <canvas id="ProductsChart"></canvas>
                                 </div>
                                 <ul class="chart-info">
                                    <li><span class="chart-info-color orange-color"></span><b>Total published products</b></li>
                                    <li><span class="chart-info-color green-color"></span><b>Total sellers products</b></li>
                                    <li><span class="chart-info-color blue-color"></span><b>Total admin products</b></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="dash-card">
                              <div class="card-header">
                                 <h4>Sellers</h4>
                              </div>
                              <div class="chart-body">
                                 <div class="seconds" width="400" height="400">
                                    <canvas id="SellersChart" width="400" height="400"></canvas>
                                 </div>
                                 <ul class="chart-info">
                                    <li><span class="chart-info-color orange-color"></span><b>Total sellers</b></li>
                                    <li><span class="chart-info-color green-color"></span><b>Total approved sellers</b></li>
                                    <li><span class="chart-info-color blue-color"></span><b>Total pending sellers</b></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- <div class="portlet-title">
                  <div class="caption">
                        <span class="caption-subject font-red-sunglo bold uppercase">{!! $rowdata->icon1 !!} {{$rowdata->name}}</span>
                  </div>
                  <div class="actions">
                     <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                     <i class="icon-cloud-upload"></i>
                     </a>
                     <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                     <i class="icon-wrench"></i>
                     </a>
                     <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;">
                     </a>
                     <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                     <i class="icon-trash"></i>
                     </a>
                  </div>
               </div> -->
               <!-- <div class="portlet-body">
                  <div class="resp-tabs-container dashboard-icon">
                     <div>
                        <fieldset>
                           @foreach($rowdata->childrens as $child)
                           <div class="tools-icon">
                              <a href="{{URL::to($child['slug'],null) }}">
                                 <div class="{{ $child['css_class'] }}"> {!! $child->icon1 !!} </div>
                                 {!! $child->icon2 !!} {{$child->name}}
                              </a>
                           </div>
                           @endforeach
                        </fieldset>
                     </div>
                  </div>
               </div> -->
            </div>
            <div class="dash-pd-sale-stock">
               <div class="row">
                  <div class="col-md-6">
                     <div class="dash-card">
                        <div class="card-header">
                           <h4>Category wise product sale</h4>
                        </div>
                        <div class="chart-body">
                           <ul class="chart-info">
                              <li>
                                 <span class="chart-info-color blue-color"></span>
                                 <b>Number of sale</b>
                              </li>
                           </ul>
                           <canvas id="PdSaleChart" width="500" height="455"></canvas>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="dash-card">
                        <div class="card-header">
                           <h4>Category wise product stock</h4>
                        </div>
                        <div class="chart-body">
                           <ul class="chart-info">
                              <li>
                                 <span class="chart-info-color red-color"></span>
                                 <b>Number of Stock</b>
                              </li>
                           </ul>
                           <canvas id="PdStockChart" width="500" height="455"></canvas>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="top-products-sec dash-card">
               <div class="card-header">
                  <h4>Top 12 Products</h4>
               </div>
               <div class="card-body">
                  <div class="top-products-slider">
                     <div>
                        <a class="top-pd">
                           <img src="{{ url('assets/blank-img.jpg') }}">
                           <div class="top-pd-details">
                              <span class="pd-price">$600.000</span>
                              <span class="pd-name">Analog Black Dial Men's Watch-32-BK-CK</span>
                           </div>
                        </a>
                     </div>
                     <div>
                        <a class="top-pd">
                           <img src="{{ url('assets/blank-img.jpg') }}">
                           <div class="top-pd-details">
                              <span class="pd-price">$600.000</span>
                              <span class="pd-name">Analog Black Dial Men's Watch-32-BK-CK</span>
                           </div>
                        </a>
                     </div>
                     <div>
                        <a class="top-pd">
                           <img src="{{ url('assets/blank-img.jpg') }}">
                           <div class="top-pd-details">
                              <span class="pd-price">$600.000</span>
                              <span class="pd-name">Analog Black Dial Men's Watch-32-BK-CK</span>
                           </div>
                        </a>
                     </div>
                     <div>
                        <a class="top-pd">
                           <img src="{{ url('assets/blank-img.jpg') }}">
                           <div class="top-pd-details">
                              <span class="pd-price">$600.000</span>
                              <span class="pd-name">Analog Black Dial Men's Watch-32-BK-CK</span>
                           </div>
                        </a>
                     </div>
                     <div>
                        <a class="top-pd">
                           <img src="{{ url('assets/blank-img.jpg') }}">
                           <div class="top-pd-details">
                              <span class="pd-price">$600.000</span>
                              <span class="pd-name">Analog Black Dial Men's Watch-32-BK-CK</span>
                           </div>
                        </a>
                     </div>
                     <div>
                        <a class="top-pd">
                           <img src="{{ url('assets/blank-img.jpg') }}">
                           <div class="top-pd-details">
                              <span class="pd-price">$600.000</span>
                              <span class="pd-name">Analog Black Dial Men's Watch-32-BK-CK</span>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      @endif
   @endforeach
   <div class="clearfix">
   </div>
</div>
</div>
<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-login"></i></a>
<div class="page-quick-sidebar-wrapper">
   <div class="page-quick-sidebar">
      <div class="nav-justified">
         <ul class="nav nav-tabs nav-justified">
            <li class="active">
               <a href="#quick_sidebar_tab_1" data-toggle="tab">
               Users <span class="badge badge-danger">2</span>
               </a>
            </li>
            <li>
               <a href="#quick_sidebar_tab_2" data-toggle="tab">
               Alerts <span class="badge badge-success">7</span>
               </a>
            </li>
            <li class="dropdown">
               <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
               More<i class="fa fa-angle-down"></i>
               </a>
               <ul class="dropdown-menu pull-right" role="menu">
                  <li>
                     <a href="#quick_sidebar_tab_3" data-toggle="tab">
                     <i class="icon-bell"></i> Alerts </a>
                  </li>
                  <li>
                     <a href="#quick_sidebar_tab_3" data-toggle="tab">
                     <i class="icon-info"></i> Notifications </a>
                  </li>
                  <li>
                     <a href="#quick_sidebar_tab_3" data-toggle="tab">
                     <i class="icon-speech"></i> Activities </a>
                  </li>
                  <li class="divider">
                  </li>
                  <li>
                     <a href="#quick_sidebar_tab_3" data-toggle="tab">
                     <i class="icon-settings"></i> Settings </a>
                  </li>
               </ul>
            </li>
         </ul>
         <div class="tab-content">
            <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
               <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                  <h3 class="list-heading">Staff</h3>
                  <ul class="media-list list-items">
                     <li class="media">
                        <div class="media-status">
                           <span class="badge badge-success">8</span>
                        </div>
                        <img class="media-object" src="../../assets/admin/layout/img/avatar3.jpg" alt="...">
                        <div class="media-body">
                           <h4 class="media-heading">Bob Nilson</h4>
                           <div class="media-heading-sub">
                              Project Manager
                           </div>
                        </div>
                     </li>
                     <li class="media">
                        <img class="media-object" src="../../assets/admin/layout/img/avatar1.jpg" alt="...">
                        <div class="media-body">
                           <h4 class="media-heading">Nick Larson</h4>
                           <div class="media-heading-sub">
                              Art Director
                           </div>
                        </div>
                     </li>
                     <li class="media">
                        <div class="media-status">
                           <span class="badge badge-danger">3</span>
                        </div>
                        <img class="media-object" src="../../assets/admin/layout/img/avatar4.jpg" alt="...">
                        <div class="media-body">
                           <h4 class="media-heading">Deon Hubert</h4>
                           <div class="media-heading-sub">
                              CTO
                           </div>
                        </div>
                     </li>
                     <li class="media">
                        <img class="media-object" src="../../assets/admin/layout/img/avatar2.jpg" alt="...">
                        <div class="media-body">
                           <h4 class="media-heading">Ella Wong</h4>
                           <div class="media-heading-sub">
                              CEO
                           </div>
                        </div>
                     </li>
                  </ul>
                  <h3 class="list-heading">Customers</h3>
                  <ul class="media-list list-items">
                     <li class="media">
                        <div class="media-status">
                           <span class="badge badge-warning">2</span>
                        </div>
                        <img class="media-object" src="../../assets/admin/layout/img/avatar6.jpg" alt="...">
                        <div class="media-body">
                           <h4 class="media-heading">Lara Kunis</h4>
                           <div class="media-heading-sub">
                              CEO, Loop Inc
                           </div>
                           <div class="media-heading-small">
                              Last seen 03:10 AM
                           </div>
                        </div>
                     </li>
                     <li class="media">
                        <div class="media-status">
                           <span class="label label-sm label-success">new</span>
                        </div>
                        <img class="media-object" src="../../assets/admin/layout/img/avatar7.jpg" alt="...">
                        <div class="media-body">
                           <h4 class="media-heading">Ernie Kyllonen</h4>
                           <div class="media-heading-sub">
                              Project Manager,<br>
                              SmartBizz PTL
                           </div>
                        </div>
                     </li>
                     <li class="media">
                        <img class="media-object" src="../../assets/admin/layout/img/avatar8.jpg" alt="...">
                        <div class="media-body">
                           <h4 class="media-heading">Lisa Stone</h4>
                           <div class="media-heading-sub">
                              CTO, Keort Inc
                           </div>
                           <div class="media-heading-small">
                              Last seen 13:10 PM
                           </div>
                        </div>
                     </li>
                     <li class="media">
                        <div class="media-status">
                           <span class="badge badge-success">7</span>
                        </div>
                        <img class="media-object" src="../../assets/admin/layout/img/avatar9.jpg" alt="...">
                        <div class="media-body">
                           <h4 class="media-heading">Deon Portalatin</h4>
                           <div class="media-heading-sub">
                              CFO, H&D LTD
                           </div>
                        </div>
                     </li>
                     <li class="media">
                        <img class="media-object" src="../../assets/admin/layout/img/avatar10.jpg" alt="...">
                        <div class="media-body">
                           <h4 class="media-heading">Irina Savikova</h4>
                           <div class="media-heading-sub">
                              CEO, Tizda Motors Inc
                           </div>
                        </div>
                     </li>
                     <li class="media">
                        <div class="media-status">
                           <span class="badge badge-danger">4</span>
                        </div>
                        <img class="media-object" src="../../assets/admin/layout/img/avatar11.jpg" alt="...">
                        <div class="media-body">
                           <h4 class="media-heading">Maria Gomez</h4>
                           <div class="media-heading-sub">
                              Manager, Infomatic Inc
                           </div>
                           <div class="media-heading-small">
                              Last seen 03:10 AM
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
               <div class="page-quick-sidebar-item">
                  <div class="page-quick-sidebar-chat-user">
                     <div class="page-quick-sidebar-nav">
                        <a href="javascript:;" class="page-quick-sidebar-back-to-list"><i class="icon-arrow-left"></i>Back</a>
                     </div>
                     <div class="page-quick-sidebar-chat-user-messages">
                        <div class="post out">
                           <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg"/>
                           <div class="message">
                              <span class="arrow"></span>
                              <a href="javascript:;" class="name">Bob Nilson</a>
                              <span class="datetime">20:15</span>
                              <span class="body">
                              When could you send me the report ? </span>
                           </div>
                        </div>
                        <div class="post in">
                           <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar2.jpg"/>
                           <div class="message">
                              <span class="arrow"></span>
                              <a href="javascript:;" class="name">Ella Wong</a>
                              <span class="datetime">20:15</span>
                              <span class="body">
                              Its almost done. I will be sending it shortly </span>
                           </div>
                        </div>
                        <div class="post out">
                           <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg"/>
                           <div class="message">
                              <span class="arrow"></span>
                              <a href="javascript:;" class="name">Bob Nilson</a>
                              <span class="datetime">20:15</span>
                              <span class="body">
                              Alright. Thanks! :) </span>
                           </div>
                        </div>
                        <div class="post in">
                           <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar2.jpg"/>
                           <div class="message">
                              <span class="arrow"></span>
                              <a href="javascript:;" class="name">Ella Wong</a>
                              <span class="datetime">20:16</span>
                              <span class="body">
                              You are most welcome. Sorry for the delay. </span>
                           </div>
                        </div>
                        <div class="post out">
                           <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg"/>
                           <div class="message">
                              <span class="arrow"></span>
                              <a href="javascript:;" class="name">Bob Nilson</a>
                              <span class="datetime">20:17</span>
                              <span class="body">
                              No probs. Just take your time :) </span>
                           </div>
                        </div>
                        <div class="post in">
                           <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar2.jpg"/>
                           <div class="message">
                              <span class="arrow"></span>
                              <a href="javascript:;" class="name">Ella Wong</a>
                              <span class="datetime">20:40</span>
                              <span class="body">
                              Alright. I just emailed it to you. </span>
                           </div>
                        </div>
                        <div class="post out">
                           <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg"/>
                           <div class="message">
                              <span class="arrow"></span>
                              <a href="javascript:;" class="name">Bob Nilson</a>
                              <span class="datetime">20:17</span>
                              <span class="body">
                              Great! Thanks. Will check it right away. </span>
                           </div>
                        </div>
                        <div class="post in">
                           <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar2.jpg"/>
                           <div class="message">
                              <span class="arrow"></span>
                              <a href="javascript:;" class="name">Ella Wong</a>
                              <span class="datetime">20:40</span>
                              <span class="body">
                              Please let me know if you have any comment. </span>
                           </div>
                        </div>
                        <div class="post out">
                           <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg"/>
                           <div class="message">
                              <span class="arrow"></span>
                              <a href="javascript:;" class="name">Bob Nilson</a>
                              <span class="datetime">20:17</span>
                              <span class="body">
                              Sure. I will check and buzz you if anything needs to be corrected. </span>
                           </div>
                        </div>
                     </div>
                     <div class="page-quick-sidebar-chat-user-form">
                        <div class="input-group">
                           <input type="text" class="form-control" placeholder="Type a message here...">
                           <div class="input-group-btn">
                              <button type="button" class="btn blue"><i class="icon-paper-clip"></i></button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
               <div class="page-quick-sidebar-alerts-list">
                  <h3 class="list-heading">General</h3>
                  <ul class="feeds list-items">
                     <li>
                        <div class="col1">
                           <div class="cont">
                              <div class="cont-col1">
                                 <div class="label label-sm label-info">
                                    <i class="fa fa-shopping-cart"></i>
                                 </div>
                              </div>
                              <div class="cont-col2">
                                 <div class="desc">
                                    New order received with <span class="label label-sm label-danger">
                                    Reference Number: DR23923 </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col2">
                           <div class="date">
                              30 mins
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="col1">
                           <div class="cont">
                              <div class="cont-col1">
                                 <div class="label label-sm label-success">
                                    <i class="fa fa-user"></i>
                                 </div>
                              </div>
                              <div class="cont-col2">
                                 <div class="desc">
                                    You have 5 pending membership that requires a quick review.
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col2">
                           <div class="date">
                              24 mins
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="col1">
                           <div class="cont">
                              <div class="cont-col1">
                                 <div class="label label-sm label-danger">
                                    <i class="fa fa-bell-o"></i>
                                 </div>
                              </div>
                              <div class="cont-col2">
                                 <div class="desc">
                                    Web server hardware needs to be upgraded. <span class="label label-sm label-warning">
                                    Overdue </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col2">
                           <div class="date">
                              2 hours
                           </div>
                        </div>
                     </li>
                     <li>
                        <a href="javascript:;">
                           <div class="col1">
                              <div class="cont">
                                 <div class="cont-col1">
                                    <div class="label label-sm label-default">
                                       <i class="fa fa-briefcase"></i>
                                    </div>
                                 </div>
                                 <div class="cont-col2">
                                    <div class="desc">
                                       IPO Report for year 2013 has been released.
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col2">
                              <div class="date">
                                 20 mins
                              </div>
                           </div>
                        </a>
                     </li>
                  </ul>
                  <h3 class="list-heading">System</h3>
                  <ul class="feeds list-items">
                     <li>
                        <div class="col1">
                           <div class="cont">
                              <div class="cont-col1">
                                 <div class="label label-sm label-info">
                                    <i class="fa fa-shopping-cart"></i>
                                 </div>
                              </div>
                              <div class="cont-col2">
                                 <div class="desc">
                                    New order received with <span class="label label-sm label-success">
                                    Reference Number: DR23923 </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col2">
                           <div class="date">
                              30 mins
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="col1">
                           <div class="cont">
                              <div class="cont-col1">
                                 <div class="label label-sm label-success">
                                    <i class="fa fa-user"></i>
                                 </div>
                              </div>
                              <div class="cont-col2">
                                 <div class="desc">
                                    You have 5 pending membership that requires a quick review.
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col2">
                           <div class="date">
                              24 mins
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="col1">
                           <div class="cont">
                              <div class="cont-col1">
                                 <div class="label label-sm label-warning">
                                    <i class="fa fa-bell-o"></i>
                                 </div>
                              </div>
                              <div class="cont-col2">
                                 <div class="desc">
                                    Web server hardware needs to be upgraded. <span class="label label-sm label-default ">
                                    Overdue </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col2">
                           <div class="date">
                              2 hours
                           </div>
                        </div>
                     </li>
                     <li>
                        <a href="javascript:;">
                           <div class="col1">
                              <div class="cont">
                                 <div class="cont-col1">
                                    <div class="label label-sm label-info">
                                       <i class="fa fa-briefcase"></i>
                                    </div>
                                 </div>
                                 <div class="cont-col2">
                                    <div class="desc">
                                       IPO Report for year 2013 has been released.
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col2">
                              <div class="date">
                                 20 mins
                              </div>
                           </div>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
               <div class="page-quick-sidebar-settings-list">
                  <h3 class="list-heading">General Settings</h3>
                  <ul class="list-items borderless">
                     <li>
                        Enable Notifications <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                     </li>
                     <li>
                        Allow Tracking <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                     </li>
                     <li>
                        Log Errors <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                     </li>
                     <li>
                        Auto Sumbit Issues <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                     </li>
                     <li>
                        Enable SMS Alerts <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                     </li>
                  </ul>
                  <h3 class="list-heading">System Settings</h3>
                  <ul class="list-items borderless">
                     <li>
                        Security Level
                        <select class="form-control input-inline input-sm input-small">
                           <option value="1">Normal</option>
                           <option value="2" selected>Medium</option>
                           <option value="e">High</option>
                        </select>
                     </li>
                     <li>
                        Failed Email Attempts <input class="form-control input-inline input-sm input-small" value="5"/>
                     </li>
                     <li>
                        Secondary SMTP Port <input class="form-control input-inline input-sm input-small" value="3560"/>
                     </li>
                     <li>
                        Notify On System Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                     </li>
                     <li>
                        Notify On SMTP Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                     </li>
                  </ul>
                  <div class="inner-content">
                     <button class="btn btn-success"><i class="icon-settings"></i> Save Changes</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- END QUICK SIDEBAR -->
@stop
@section('script')
<script>

	jQuery(document).ready(function() {  
	   Metronic.init(); // init metronic core componets
	   Layout.init(); // init layout
	   Demo.init(); // init demo features 
	   QuickSidebar.init(); // init quick sidebar
	   Index.init();   
	   Index.initDashboardDaterange();
	   Index.initJQVMAP(); // init index page's custom scripts
	   Index.initCalendar(); // init index page's custom scripts
	   Index.initCharts(); // init index page's custom scripts
	   Index.initChat();
	   Index.initMiniCharts();
	   Tasks.initDashboardWidget();
	});
</script>
@stop