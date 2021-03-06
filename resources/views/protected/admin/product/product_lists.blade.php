@extends('protected.admin.master')
@section('title', 'Admin Dashboard')
@section('content')
<!-- <hr class=".text-danger"> -->

<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<style>
   form.navbar-form .form-group {
      margin-bottom: 30px;
   }
</style>
@if (session()->has('flash_message'))
      <div  id ="successMessage" class="alert alert-success"  style="width:400px;">
            <p style="color:white;">{{ session('flash_message') }}</p>
      </div>
   @endif
               <!-- <div class="page-bar page-top-bar">
                  <ul class="page-breadcrumb" >
                     <li>
                         <i class="fa fa-home" style="color:black;"></i>
                         <a href="{{URL::route('admin_dashboard')}}" >Home</a>
                         <i class="fa fa-angle-right" style="color:black;"></i>
                     </li>
                     <li>
                         Products
                          <i class="fa fa-angle-right" style="color:black;"></i>
                     </li>
                     <li>
                        Products list
                     </li>
                  </ul>
                  <div class="page-toolbar">
                     <a href="{{URL('admin/dashboard')}}" class="btn green-haze btn-circle pull-right back-btn" style="margin-right:50px;margin-top: 5px;"><i class="fa fa-backward"></i> Back</a>
                  </div>
               </div> -->
                  <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet-title btn-width-title">
                           <div class="caption">
                              All products
                           </div>
                           <div class="header-btn">
                              <a class="add-new-btn" href="#">Add New Product</a>
                           </div>
                        </div>
                        <div class="portlet box grey-cascade">
                            <div class="portlet-title justify-content-start card-title-width-option">
                                <div class="caption">
                                    All products
                                </div>
                                <div class="card-title-option">
                                    <form class="card-title-form">
                                       <div class="btn-group btn-dropdown">
                                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             Bulk Action <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu">
                                             <li><a href="#"> Delete selection</a></li>
                                          </ul>
                                       </div>
                                       <div class="btn-group btn-dropdown custome-dropdown">
                                          <div class="form-group">
                                             <select name="all-sellers" placeholder="All-Sellers" class="form-control">
                                                <option>All Sellers</option>
                                                <option>admin</option>
                                                <option>Mark And Spenser</option>
                                                <option>Disney</option>
                                                <option>zara Fashion</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="btn-group btn-dropdown custome-dropdown">
                                          <div class="form-group">
                                             <select name="all-sellers" placeholder="All-Sellers" class="form-control">
                                                <option>Sort by</option>
                                                <option>Rating (High > Low)</option>
                                                <option>Rating (Low > High)</option>
                                                <option>Num of Sale (Low > High)</option>
                                                <option>Base Price (High > Low)</option>
                                                <option>Base Price (Low > High)</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="btn-group btn-dropdown custome-search">
                                          <div class="form-group">
                                             <input type="text" class="form-control" id="search" name="search" placeholder="Type & Enter">
                                          </div>
                                       </div>
                                    </form>
                                </div>
<!--                                <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                   
                                    <a href="javascript:;" class="remove">
                                    </a>
                                </div>-->
                                 <!-- <a href="{{URL('admin/dashboard/Classifieds (B2b)')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;margin-top: 5px;"><i class="fa fa-backward"></i> Back</a> -->
                            </div>
                            <div class="portlet-body">
                              <!-- <div class="table-toolbar">
                                 <div class="row">
                                    <div class="col-12">
                                       <input type="hidden" name="url" value="{{ URL::to('/') }}">
                                       <form class="navbar-form navbar-left trade_search_form form-inline" method="get" action="{{ URL::to('admin/product-search') }}" role="search">
                                          <div class="form-group">
                                             <input type="text" name="product_name" placeholder="Product Name" class="form-control">
                                          </div>
                                          <div class="form-group">
                                             <input type="text" name="product_id" placeholder="Product Id" class="form-control">
                                          </div>
                                          <div class="form-group">
                                             @if(@$category_list)
                                             <select name="product_category" placeholder=" Product category" class="form-control">
                                                <option value="0">Select Product category</option>
                                                @foreach($category_list as $c)
                                                @if($c->sub_cat)
                                                @foreach($c->sub_cat as $sub)
                                                <option value="{{$sub->name}}">{{$sub->name ?? ''}}</option>
                                                @endforeach
                                                @endif
                                                @endforeach
                                             </select>
                                             @endif
                                             <br><br> -->
                                             <!-- <input type="text" name="product_category" style="height: 34px;" placeholder=" Product category"> -->
                                          <!-- </div>

                                          <div class="form-group">
                                             @if($country_list)
                                             <select name="product_country" placeholder=" Product country" class="form-control">
                                                <option value="0">Select Product country</option>
                                                @foreach($country_list as $co)
                                                <option value="{{$co->name}}">{{$co->name}}</option>
                                                @endforeach
                                             </select>
                                             @endif
                                             <input type="text" placeholder=" Product country">
                                          </div>
                                           <div class="form-group flex-none ">
                                             <input type="submit" class="btn btn-success trade_search_btn btn-primary"  value="SEARCH" />
                                          </div>
                                          <div class="form-group flex-none ">
                                             <button type="button" class="btn btn-success resetval green-btn">RESET</button>
                                          </div>
                                       </form>
                                    </div>
                                </div>
                             </div> -->
                                <!--<h3>All Available Products list-->
          <!-- <span class="pull-right"><label class=" control-label" style="margin-right:10px;"> Search </label><input type="text" class="light-table-filter" data-table="order-table" placeholder="" style=" padding: 5px;font-size: 13px;"></span> -->
      <!--</h3>-->
      <table id ="datavalue" class="admin-table order-table table table-striped table-bordered table-hover th-bg">
         <thead>
            <tr>
               <th>Product Name</th>
               <th>Model</th>
               <th>Brand Name</th>
               <th>Category Name</th>
               <th colspan="2">Action</th>
            </tr>
         </thead>
         <tbody class="trade_table_body">
            @foreach($products as $product)
            <tr>
               <td>{{ $product->product_name['name'] }}</td>
               <td>{{ $product['model'] }}</td>
               <td>{{ $product['brandname'] }}</td>
               <td>{{ $product->category->bdtdcCategory->name ?? ''  }}</td>
               <td  style="white-space: nowrap;">
                  <div class="table-grp-btn">
                     <a href="{{ URL::to('admin/edit-product',$product->id) }}" class="btn btn-xs btn-info edit-icon-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                     <!-- <a href="{{ URL::to('supplier/product_edit',$product->id) }}" class="btn btn-xs btn-info">Edit</a> -->
                     <a onclick="return confirm('Are you sure want to delete the Product?')" class="btn btn-xs btn-danger delete-icon-btn" href="{{ URL::to('admin/productdelete/'.$product->id) }}" class="btn btn-xs btn-info"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                     <!-- <a class="btn btn-xs btn-danger delete_product" data-product_id="{{$product->id}}">Delete</a> -->
                  </div>
               </td>
            </tr>
            @endforeach
            <!-- @if(count($products) > 0) 
               {!!$products->render()!!}
            @endif -->
         </tbody>
      </table>
@if(count($products) > 0) 
   {!!$products->render()!!}
@endif
         </div>
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
  </div>
</div>



<!--<div class="row">
   <div>
      <input type="hidden" name="url" value="{{ URL::to('/') }}">
      <form class="navbar-form navbar-left trade_search_form form-inline" method="get" action="{{ URL::to('admin/product-search') }}" role="search" style="padding:0;">
         <div class="col-md-2 form-group">
             <label class=" control-label">Product Name: </label><br>
            <input type="text" name="product_name" style="height:34px;" placeholder="">
         </div>
         <div class="col-md-2 form-group">
             <label class=" control-label">Product Id: </label><br>
            <input type="text" name="product_id" style="height: 34px;" placeholder="">
         </div>
         <div class="col-md-2 form-group">
            @if(@$category_list)
            <label class=" control-label"></label><br>
            <select name="product_category" style="height:34px;width:110%;margin-top: 10px;" placeholder=" Product category">
               <option value="0">Select Product category</option>
               @foreach($category_list as $c)
               @if($c->sub_cat)
               @foreach($c->sub_cat as $sub)
               <option value="{{$sub->name}}">{{$sub->name ?? ''}}</option>
               @endforeach
               @endif
               @endforeach
            </select>
            @endif
            <br><br>
             <input type="text" name="product_category" style="height: 34px;" placeholder=" Product category"> 
         </div>

         <div class="col-md-2 form-group">
            @if($country_list)
            <label class=" control-label"></label><br>
            <select name="product_country" style="height:34px;width:110%;margin-top: 10px;" placeholder=" Product country">
               <option value="0">Select Product country</option>
               @foreach($country_list as $co)
               <option value="{{$co->name}}">{{$co->name}}</option>
               @endforeach
            </select>
            @endif
             <input type="text" placeholder=" Product country"> 
         </div>
          <div class="col-md-1 form-group" style="margin-top: 30px;">
            <input type="submit" class="btn btn-success trade_search_btn"  value="SEARCH" />
         </div>
         <div class="col-md-1 form-group" style="margin-top: 30px;">
            <button type="button" class="btn btn-success resetval">RESET</button>
         </div>
      </form>
   </div>
   <div class="col-md-12">
      <h3>All Available Products list
          <span class="pull-right"><label class=" control-label"> Search </label><input type="text" class="light-table-filter" data-table="order-table" placeholder="" style=" padding: 5px;font-size: 13px;"></span>
      </h3>
      <table id ="datavalue" class="order-table table">
         <thead>
            <tr class="test-center">
               <td>Product Name</td>
               <td>Model</td>
               <td>Brand Name</td>
               <td>Category Name</td>
               <td colspan="2">Action</td>
            </tr>
         </thead>
         <tbody class="trade_table_body">
            @foreach($products as $product)
            <tr>
               <td>{{ $product->product_name['name'] }}</td>
               <td>{{ $product['model'] }}</td>
               <td>{{ $product['brandname'] }}</td>
               <td>{{ $product->category->bdtdcCategory->name ?? ''  }}</td>
               <td colspan="2">
                  <a href="{{ URL::to('admin/edit-product',$product->id) }}" class="btn btn-xs btn-info"  style="margin-bottom: 5px;">Edit</a>
                   <a href="{{ URL::to('supplier/product_edit',$product->id) }}" class="btn btn-xs btn-info">Edit</a> 
                  <a class="btn btn-xs btn-danger delete_product" data-product_id="{{$product->id}}">Delete</a>
               </td>
            </tr>
            @endforeach
            @if(count($products) > 0) 
               {!!$products->render()!!}
            @endif
         </tbody>
      </table>

   </div>
</div>
@if(count($products) > 0) 
   {!!$products->render()!!}
@endif
</div>-->

<!-- END PAGE CONTENT-->

@stop
@section('scripts')
<script>
   $('.resetval').click(function(){
      var base_url = '{{URL::to("/")}}';
      window.location.replace(base_url + '/admin/product');

   });
   jQuery(document).ready(function() {
      Metronic.init(); // init metronic core components
      Layout.init(); // init current layout
      Demo.init(); // init demo features
      /* EcommerceProductsEdit.init();*/
   });

   function form_validate(form_id) {
      var error = 0;
      var msg = '';
      var name = $('#name').val();
      var desc = $('#description').val();
      var seo = $('#seo').val();
      var mtitle = $('#meta_title').val();
      var mdesc = $('#meta_description').val();
      var mkey = $('#meta_keywords').val();

      if (name === '') {
         error++;
         $('#name').css('border', '1px solid red');
         msg += error + ". Name Required <br/>";

      }
      if (desc === '') {
         error++;
         $('#description').css('border', '1px solid red');
         msg += error + ". Description Required <br/>";

      }
      if (seo === '') {
         error++;
         $('#seo').css('border', '1px solid red');
         msg += error + ". SEO Required <br/>";

      }
      if (mtitle === '') {
         error++;
         $('#meta_title').css('border', '1px solid red');
         msg += error + ". Meta Title Required <br/>";

      }
      if (mdesc === '') {
         error++;
         $('#meta_description').css('border', '1px solid red');
         msg += error + ". Meta Description Required <br/>";

      }
      if (mkey === '') {
         error++;
         $('#meta_keywords').css('border', '1px solid red');
         msg += error + ". Meta Keywords Required <br/>";

      }
      var allVals = [];
      $('.parent_id_div :checked').each(function() {
         allVals.push($(this).val());
      });

      if (allVals.length != 1) {
         error++;
         $('.parent_id_div').css('border', '1px solid red');
         msg += error + ". Parent Category Must be 1 selected ! <br/>";
      }

      if (error != 0) {

         $('#validation_error').addClass('alert alert-danger');
         $('#validation_error').html(msg);
      } else {

         var formdata = $("#" + form_id).serialize();
         var action = $("#" + form_id).attr('action');
         $.ajax({
            url: action,
            type: "post",
            data: formdata,
            success: function(data) {


               var er = '';
               var obj = $.parseJSON(data);
               if (obj.type === 'success') {
                  $('#validation_error').removeClass('alert alert-danger');
                  $('#validation_error').addClass('alert alert-success');
                  er += obj.text;


               } else {
                  $('#validation_error').addClass('alert alert-danger');
                  $.each(obj.text, function(index, value) {
                     er += value + '<br/>';
                  });

               }
               $('#validation_error').html(er);
            }
         });
      }

      return false;
   }
   // ------------- search filtering ----------- //

   (function(document) {
      'use strict';

      var LightTableFilter = (function(Arr) {

         var _input;

         function _onInputEvent(e) {
            _input = e.target;
            var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
            Arr.forEach.call(tables, function(table) {
               Arr.forEach.call(table.tBodies, function(tbody) {
                  Arr.forEach.call(tbody.rows, _filter);
               });
            });
         }

         function _filter(row) {
            var text = row.textContent.toLowerCase(),
               val = _input.value.toLowerCase();
            row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
         }

         return {
            init: function() {
               var inputs = document.getElementsByClassName('light-table-filter');
               Arr.forEach.call(inputs, function(input) {
                  input.oninput = _onInputEvent;
               });
            }
         };
      })(Array.prototype);

      document.addEventListener('readystatechange', function() {
         if (document.readyState === 'complete') {
            LightTableFilter.init();
         }
      });

   })(document);

 
   $(document).on({click: function(e) {
         e.preventDefault();
         if (confirm('Are you sure, you want to delete the Product details?')) {
            var _this = $(this);
            var product_id = $(this).data('product_id');
            $.post('<?php echo url('/'); ?>/x_product/' + product_id, {
               '_token': '{{csrf_token()}}'
            }, function(r) {
               if (r == 'deleted') {
                  _this.parent().parent().remove();
                  var relode_url = window.location.href;
                  window.location.href = relode_url;
               } else if (parseInt(r) == 'login') {
                  alert('Please Login First.');
               } else {
                  alert('Query failed. Please Login first.');
               }
            });
         }
      }
   }, '.delete_product');   
   
   setTimeout(function() {
        $('#successMessage').fadeOut('fast');
    }, 3000);
</script>
   <!-- END JAVASCRIPTS -->
@stop
