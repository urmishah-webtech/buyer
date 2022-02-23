@extends('fontend.master-dashboard')
@section('page_css')
<link property='stylesheet' href="{!! asset('css/dashboard.css') !!}" rel="stylesheet">
<link property='stylesheet' href="{!! asset('assets/fontend/bdtdccss/why-bdtdc.css') !!}" rel="stylesheet">

@endsection
@section('content')
<div id="ajax_status" class="hide_this text-center">
   <img src="{{ URL::asset('uploads/ajax_loading.gif') }}" class="img-responsive" alt="">
</div>

<div class="full-width-container">
   @if(count($errors) > 0)
   <div class="alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
         <li>{!! $error !!}</li>
         @endforeach
      </ul>
   </div>
      @endif
<!--       <ul class="text-danger backend_error" style="border: 1px solid #ddd;display: none;padding: 10px 20px;">

      </ul>
 -->      <!-- END PAGE HEADER-->
      <!-- BEGIN PAGE CONTENT-->
   <div class="seller-dashboard">

      <div class="seller-dashboard-left">
         @include('fontend.layouts.dashboard-aside')
      </div>

      <div class="seller-dashboard-right">
         <div class="seller-dashboard-breadcrumb">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                     <div class="sdb-inner">
                        <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                           <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                              <a itemprop="url" href="{{ URL::to('company/dashboard') }}" itemprop="item">
                                 <span itemprop="name"><i class="fa fa-home" style="color:black;"></i> Dashboard </span><i class="fa fa-angle-right"></i>
                              </a>
                              <meta itemprop="position" content="1" />
                           </li>
                           <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                              <a itemprop="url" href="{{ URL::to('dashboard/product') }}">
                                 <span itemprop="name">Manage Products </span>
                              </a>
                              <meta itemprop="position" content="2" />
                           </li>

                           <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                              <a itemprop="url" href="#"> 
                                 <i class="fa fa-angle-right"></i> 
                                 <span itemprop="name">Edit Product</span> 
                                 <i class="fa fa-angle-right"></i>
                              </a>
                              <meta itemprop="position" content="3" />
                           </li>
                        </ul>
                     
                        <a href="{{URL::to('dashboard/product')}}" class="goBack back-btn"><i class="fa fa-backward"></i> Go Back</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <h3 class="h3">Product Edit Form</h3>
         <div class="col-md-8">
            <div class="page-content">
               <?php
      	 	      use App\Model\BdtdcCategory;
                 $user_id = \Sentinel::getUser()->id;
                 $bdtdc_product_to_category = App\Model\BdtdcProductToCategory::where('product_id',$product->id)->first();
                 $company = App\Model\BdtdcCompany::where('id',$bdtdc_product_to_category->company_id)->first();
                 $wholesale=$company->wholesale;
                  //print_r($wholesale);
               ?>
               <input type="hidden" name="hidden_payment_tearms" value="{{ $product->payment_method }}">
               <?php
      			?>
               @if (Sentinel::check())
               <?php
                    $role = App\Model\Role_user::where('user_id',Sentinel::getUser()->id)->first();
                  ?>
               @if($role->role_id ==2)
               <form action="{{ URL::to('admin/product-update', $product->id) }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8" class="product_info_form form-row-seperated">
               @else
               <form action="{{ URL::to('supplier/product_update', $product->id) }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8" class="product_info_form form-row-seperated">
               @endif
               @endif
               {!! csrf_field() !!}
               <?php $product_parent_id = $products?$products->category_id:0?>
               <input type="hidden" name="hidden_categorie" value="{{ $product_parent_id }}">
               <input type="hidden" name="bdtdc_limited_time_offers_id" value="<?php if(isset($bdtdc_limited_lime_offers[0]->id)){echo $bdtdc_limited_lime_offers[0]->id;} ?>">
                     <!-- <ul class="nav nav-tabs product_create_tab" role="tablist">
      				<li class="active"><a data-toggle="tab" href="#product_details_tab_content">Product Details</a></li>
      				<li><a data-toggle="tab" href="#product_image_tab_content">Product Image</a></li>
      			</ul> -->
               <div class="">
                  <!-------------PRODUCT-DETAILS-TAB-CONTENT;------------------>
                  <div id="product_details_tab_content" class="">
                     <div class="sd-card">
                        <h4 class="card-title">Product Information</h4>
                        <div class="sd-card-body">
                           <div class="margin_top1">
                              <div class="form-group row">
                                 <div class="col-md-3 col-from-label">
                                    <label>Product Name</label>
                                 </div>
                                 <div class="col-md-8">
                                    <div class="form-filed">
                                       <input type="hidden" name="base_url" class="form-control" value="{{ URL::to('/',null) }}">
                                       <input type="text" name="product_name" validation="validated_true" class="form-control validate" placeholder="Product Name" value="{{ old('product_name',$supplier_product->name) }}">
                                       <div class="form-filed-error">
                                          <p class="empty_error hidden_icon"><i class="fa fa-times-circle" aria-hidden="true"></i> Please enter a Product Name</p>
                                          <i class="fa fa-check-square btn btn-sm btn-success hidden_icon validated_true"></i>
                                          <i class="fa fa-exclamation-triangle btn btn-sm btn-danger hidden_icon validated_false"></i>
                                          <span class="text-danger validation_message"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @if($wholesale==1)

                           <div class="margin_top1">
                              <div class="col-md-2">
                                 <span>Wholesale product:</span>
                              </div>
                              <div class="col-md-10">
                                 <label><input type="checkbox" name="is_wholesale_product" class="" value="true" <?php if(isset($bdtdc_product_to_wholesale_category[0]->product_id)){echo "checked";} ?>>Make wholesale product</label><br>
                                 <label><input type="checkbox" name="is_limited_time_offer" id="limited_time_offer" class="" value="true">Make Limited time offer for this product</label>
                              </div>
                           </div>
                           <div class="margin_top1 limited_offer_div" style="display: none;">
                              <div style="text-align:right;padding-right:0px" class="col-md-2">
                                 <label for="">Limited time offer: </label>
                              </div>
                              <div class="col-md-7">
                                 <table class="table">
                                    <tr>
                                       <td>Percentage: </td>
                                       <td>
                                          <div class="input-group" style="width:150px;">
                                             <input validation="validated_false" class="form-control check_number" style="height:27px;padding-bottom:1%;font-size:12px;width:150px;" type="text" name="percentage" aria-describedby="percentage-addon" value="<?php if(isset($bdtdc_limited_lime_offers[0])){echo $bdtdc_limited_lime_offers[0]->profit_percentage;}else{echo '';} ?>">
                                             <span class="input-group-addon" style="color:black;" id="percentage-addon">%</span>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>From: </td>
                                       <td>
                                          <input class="form-control span2" id="dpd1" style="height:27px;padding-bottom:1%;font-size:12px;width:150px;" type="text" name="offer_from" placeholder="yyyy-mm-dd" value="<?php if(isset($bdtdc_limited_lime_offers[0])){echo date("Y-m-d",strtotime($bdtdc_limited_lime_offers[0]->start_date));}else{echo '';} ?>">
                                       </td>
                                       <td>To: </td>
                                       <td>
                                          <input class="form-control span2" id="dpd2" style="height:27px;padding-bottom:1%;font-size:12px;width:150px;" type="text" name="offer_to" placeholder="yyyy-mm-dd" value="<?php if(isset($bdtdc_limited_lime_offers[0])){echo date("Y-m-d",strtotime($bdtdc_limited_lime_offers[0]->end_date));}else{echo '';} ?>">
                                       </td>
                                       <!-- <td>
         			      							<div class="col-xs-3 validation_status">
         					                            <i class="fa fa-check-square btn btn-sm btn-success hidden_icon validated_true"></i>
         					                            <i class="fa fa-exclamation-triangle btn btn-sm btn-danger hidden_icon validated_false"></i>
         					                            <span class="text-danger validation_message"></span>
         				                        	</div>
         			                        	</td> -->
                                    </tr>
                                 </table>
                              </div>
                           </div>
                           @endif
                           <div class="margin_top1">
                              <div class="form-group row">
                                 <div  class="col-md-3 col-from-label">
                                    <label>Category</label>
                                 </div>
                                 <div class="col-md-8">
                                    <div class="row">
                                       <div class="col-md-6 col-from-label">
                                          <label>Parent</label>
                                          <div class="form-filed">
                                             <select name="parent_category" class="form-control" >
                                                <option value="0">----Please Select----</option>
                                                @foreach(\App\Model\BdtdcCategory::where('parent_id',0)->get() as $v)
                                                @if($v->id == $parent_id)
                                                <option value="{{ $v->id }}" selected="selected">{{ trim($v->name) }}</option>
                                                @else
                                                <option value="{{ $v->id }}">{{ trim($v->name) }}</option>
                                                @endif
                                                @endforeach
                                             </select>
                                             <div class="form-filed-error">
                                                <p class="empty_error hidden_icon parent_cat_error"><i class="fa fa-times-circle" aria-hidden="true"></i> Please Select Parent Category</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6 col-from-label">
                                          <label>Sub</label>
                                          <div class="form-filed">
                                             <select name="sub_category" class="form-control">
                                                <option value="0">Select a sub category</option>

                                                @foreach(\App\Model\BdtdcCategory::where('parent_id',$parent_id)->get() as $v)
                                                @if($v->id == $product_parent_id)
                                                <option value="{{ $v->id }}" selected="selected">{{ trim($v->name) }}</option>
                                                @else
                                                <option value="{{ $v->id }}">{{ trim($v->name) }}</option>
                                                @endif
                                                @endforeach
                                             </select>
                                             <div class="form-filed-error">
                                                <p class="empty_error hidden_icon sub_cat_error"><i class="fa fa-times-circle" aria-hidden="true"></i> Please Select Sub-Category</p>
                                             </div>
                                          </div>
                                       </div>   
                                       <div class="col-md-12">
                                          <span class="help-block">select only one category </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="margin_top1">
                              <div class="form-group row">
                                 <div class="col-md-3 col-from-label">
                                    <label for="">Meta Keyword</label>
                                 </div>
                                 <div class="col-md-8">
                                    <div class="form-filed">
                                       <textarea class="form-control maxlength-handler validate" validation="validated_true" name="product_meta_keywords" maxlength="255">{{ $supplier_product->meta_keyword }}</textarea>
                                       <div class="form-filed-error">
                                          <p class="empty_error hidden_icon"><i class="fa fa-times-circle" aria-hidden="true"></i> Please type some Meta Keyword</p>
                                          <div class="validation_status">
                                             <i class="fa fa-check-square btn btn-sm btn-success hidden_icon validated_true"></i>
                                             <i class="fa fa-exclamation-triangle btn btn-sm btn-danger hidden_icon validated_false"></i>
                                             <span class="text-danger validation_message"></span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="margin_top1">
                              <div class="form-group row">
                                 <div class="col-md-3 col-from-label">
                                    <label for="">Tag</label>
                                 </div>
                                 <div class="col-md-8">
                                    <div class="form-filed">
                                       <textarea class="form-control maxlength-handler validate" validation="validated_true" name="product_meta_tag" maxlength="255">{{ $supplier_product->tag }}</textarea>
                                       <div class="form-filed-error">
                                          <p class="empty_error hidden_icon"><i class="fa fa-times-circle" aria-hidden="true"></i> Please type Meta Tags Separated by comma (,)</p>
                                          <i class="fa fa-check-square btn btn-sm btn-success hidden_icon validated_true"></i>
                                          <i class="fa fa-exclamation-triangle btn btn-sm btn-danger hidden_icon validated_false"></i>
                                          <span class="text-danger validation_message"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-------------PRODUCT-IMAGE-TAB-CONTENT;------------------>
                     <div id="product_image_tab_content">
                        <div class="sd-card">
                           <h4 class="card-title">
                              Product Images
                           </h4>
                           <div class="sd-card-body">
                              <div class="form-group row">
                                 <div class="col-md-3 col-from-label">
                                    <label>Choose Product Image</label>
                                 </div>
                                 <div class="col-md-8">
                                    <div class="image_container">
                                       <input type="file" name="product_images[]" class="p_add_img img_1">
                                    </div>
                                    <span class="text-muted">(Max: 2MB, only jpg or png files are allowed. Maximum six images are allowed. Recommanded WxH 1000x1000 pixel)</span>
                                    <p class="image_required_error hidden_icon">
                                       <i class="fa fa-times-circle" aria-hidden="true"></i> Please insert at least one product image
                                    </p>
                                    <p class="image_attachment_error hidden_icon">
                                       <i class="fa fa-times-circle" aria-hidden="true"></i> 
                                       <span>Please fix image error</span>
                                    </p>
                                    <div class="col-xs-12 img_preview">
                                       <!----PREVIEW IMAGE HANDELED BY JAVASCRIPT--------- -->
                                       @if($product_images)
                                       @if(count($product_images)>0)
                                       @foreach($product_images as $img)
                                       <div class="col-sm-3 img_container">
                                          <div class="col-xs-12 text-center">
                                             <i class="fa fa-remove btn btn-xs btn-danger remove_img" data-img_target="0" data-img_id="{{$img->id}}"></i>
                                          </div>
                                          <div class="col-xs-12">
                                             <a target="_blank" title="{{$img->image}}" href="{{URL::to($img->image,null)}}"><img src="{{URL::to($img->image,null)}}" alt="" class="img-responsive"></a>
                                          </div>
                                          <div class="col-xs-12">
                                             <p title="{{ $img->image }}" class="img_details">Name: <a target="_blank" href="{{URL::to($img->image,null)}}"><span class="text-muted img_name">...{{ substr($img->image,-42) }}</span></a></p>
                                          </div>
                                       </div>
                                       @endforeach
                                       @endif
                                       @endif
                                    </div>
                                    <div id="deleted_p_image">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="atributes-details">
                        <div class="sd-card">
                           <h4 class="card-title">Attributes Details</h4>
                           <div class="sd-card-body">
                              <div class="margin_top1">
                                 <div class="form-group row">
                                    <div class="col-md-3 col-from-label">
                                       <label for="">Model/HS </label>
                                    </div>
                                    <div class="col-md-8">
                                       <div class="form-filed">
                                          <input type="text" name="product_model" validation="validated_true" class="form-control validate" placeholder="Model" value="{{ $supplier_product->model }}">
                                          <div class="form-filed-error">
                                             <p class="empty_error hidden_icon"><i class="fa fa-times-circle" aria-hidden="true"></i> Please type product Model/HS number</p>
                                             <div class="validation_status">
                                                <i class="fa fa-check-square btn btn-sm btn-success hidden_icon validated_true"></i>
                                                <i class="fa fa-exclamation-triangle btn btn-sm btn-danger hidden_icon validated_false"></i>
                                                <span class="text-danger validation_message"></span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="margin_top1">
                                 <div class="form-group row">
                                    <div class="col-md-3 col-from-label">
                                       <label for="">Brand Name </label>
                                    </div>
                                    <div class="col-md-8">
                                       <div class="form-filed">
                                          <input type="text" name="brand_name" validation="validated_true" class="form-control validate" value="{{ $supplier_product->brandname }}">
                                          <div class="form-filed-error">
                                             <p class="empty_error hidden_icon"><i class="fa fa-times-circle" aria-hidden="true"></i> Please type brand name</p>
                                             <div class="validation_status">
                                                <i class="fa fa-check-square btn btn-sm btn-success hidden_icon validated_true"></i>
                                                <i class="fa fa-exclamation-triangle btn btn-sm btn-danger hidden_icon validated_false"></i>
                                                <span class="text-danger validation_message"></span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="margin_top1">
                                 <div class="form-group row">
                                    <div class="col-md-3 col-from-label">
                                       <label for="">Place of Origin</label>
                                    </div>
                                    <div class="col-md-8">
                                       <select name="country" class="form-control validate validate_place_origin" validation="<?php if($supplier_product->location == 0){echo 'validated_false';}else{echo 'validated_true';} ?>">
                                          <option value="0" <?php if($supplier_product->location == 0){echo 'selected';} ?>>--- Select Place of Origin ---</option>
                                          @foreach(\App\Model\BdtdcCountry::get() as $bc)
                                          <option value="{{ $bc->id }}" <?php if($supplier_product->location == $bc->id){echo 'selected';} ?>>{{ trim($bc->name) }}</option>
                                          @endforeach
                                       </select>
                                       <p class="place_origin_error hidden_icon"><i class="fa fa-times-circle" aria-hidden="true"></i> Please Select product place of origin</p>
                                       <!-- {-!! Form::select( 'country',\App\Model\BdtdcCountry::lists('name','id'), $supplier_product->location,array('class'=>'form-control validate','validation'=>'validated_true','style'=>'height:29px;padding-bottom:1%;padding-top:0px;font-size:12px')) !!-} -->
                                       <div class="validation_status">
                                          <i class="fa fa-check-square btn btn-sm btn-success hidden_icon validated_true"></i>
                                          <i class="fa fa-exclamation-triangle btn btn-sm btn-danger hidden_icon validated_false"></i>
                                          <span class="text-danger validation_message"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="attribute_area margin_top1">
                                 <div class="form-group row">
                                    <div class="col-md-3 col-from-label">
                                       <label for="">Attributes </label>
                                    </div>
                                    <div class="col-md-8">
                                       <div class="row">
                                             <?php $i_remove = 1; $attribute_found = false;?>
                                             @foreach($attributes as $attr)
                                             <?php if(isset($attr->bdtdcAttribute->id)) { ?>
                                             <?php $attribute_found = true; ?>
                                                <div class="col-md-6">
                                                   <label>Name</label>
                                                   <input name="attr_id[]" type="hidden" value="{{ $attr->bdtdcAttribute->id }}"><input type="text" name="product_attr_name[]" value="{{ $attr->bdtdcAttribute->name ?? '' }}" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                   <label>Value</label>
                                                
                                                   <input type="text" name="product_attr_value[]" value="{{ $attr->bdtdcAttribute->value ?? ''  }}" class="form-control">
                                                
                                                <?php if($i_remove == 1){ ?>
                                                
                                                   <button class="btn btn-primary btn-xs add_more_attribute_btn_for_edit"><i class="fa fa-plus"></i></button> 
                                                
                                                <?php } ?>

                                                <?php if($i_remove != 1){ ?>
                                                
                                                   <button class="btn btn-danger btn-xs remove_attributes" check_btn="attribute" deleted_attr_id="{{ $attr->bdtdcAttribute->id }}">
                                                      <i class="fa fa-minus"></i>
                                                   </button> 
                                                <?php } ?>

                                                </div>
                                             <?php  $i_remove++; ?>
                                             <?php } ?>
                                             @endforeach

                                             @if(!$attribute_found)
                                                <input name="attr_id[]" value="0" type="hidden">
                                                <div class="col-md-5 col-from-label">
                                                   <label>Name</label>
                                                   <input name="product_attr_name[]" class="form-control" type="text">
                                                </div>
                                                <div class="col-md-5 col-from-label">
                                                   <label>Value</label>
                                                   <input name="product_attr_value[]" class="form-control" type="text">
                                                </div>
                                                <div class="col-2">
                                                      <button class="btn btn-primary btn-xs add_more_attribute_btn_for_edit"><i class="fa fa-plus"></i></button>
                                                </div>
                                             @endif
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="Trade-details">
                        <div class="sd-card">
                        <h4 class="card-title">Trade Details</h4>
                        <div class="sd-card-body">
                           <div class="attribute_area margin_top1">
                              <div class="form-group row">
                                 <div class="col-md-3 col-from-label">
                                    <label for="">Trade Details </label>
                                 </div>
                                 <div class="col-md-8">
                                    <label><input type="radio" name="base" value="based_quantity" <?php if(count($product_price) > 0){if(trim($product_price[0]->currency) == ''){echo "checked";}}else{if(count($product_price) == 0){echo "checked";}} ?> /> Based on Quantity
                                    </label>
                                    <label>
                                       <input type="radio" name="base" id="based_FOB_id" value="based_FOB" <?php if(count($product_price) > 0){if($product_price[0]->currency != ''){echo "checked";}} ?> /> FOB
                                    </label>
                                    @if(count($product_price) > 0)
                                    <div class="table quantity_base">
                                       <div class="row">
                                          <div class="col-md-12">
                                             <label>Unit Type:</label>
                                             <select class="form-control" name="unit_type" id="sel1">
                                                @foreach($units as $u)
                                                @if($u->id == $product->unit_type_id)
                                                <option value="{!! $u->id !!}" selected>{!! $u->name !!}</option>
                                                @else
                                                <option value="{!! $u->id !!}">{!! $u->name !!}</option>
                                                @endif

                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       @if($product_price[0]->currency == '')
                                       <?php $i_remove_moq = 1; ?>
                                       @foreach($product_price as $p)
                                       <tr>
                                          <td>MOQ <span></span></td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="hidden" name="product_price_id[]" value="{{ $p->id }}">
                                             <input type="text" name="product_MOQ[]" value="{{ $p->product_MOQ }}" class="form-control">
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>FOB Price: </td>
                                       </tr>
                                          <?php
         		      						      $fob_price_array = explode('-', $p->product_FOB)
         		      						   ?>
                                       <tr>
                                          <td>
                                             <input type="text" name="product_FOB_from[]" class="form-control check_number" value="<?php if(isset($fob_price_array[0])){echo $fob_price_array[0];} ?>" placeholder="From">
                                          </td>
                                          <td>-</td>
                                          <td>
                                             <input type="text" name="product_FOB_to[]" class="form-control check_number" placeholder="To" value="<?php if(isset($fob_price_array[1])){echo $fob_price_array[1];} ?>">
                                          </td>
                                          <td>
                                             <i class="fa fa-plus btn btn-xs btn-primary add_price_btn"></i>
                                             <?php if($i_remove_moq != 1){ ?>
                                             <i class="fa fa-minus btn btn-xs btn-danger remove_attributes" check_btn="trade" deleted_attr_id="{{ $p->id }}"></i>
                                             <?php } ?>
                                          </td>
                                       </tr>
                                       <?php $i_remove_moq++; ?>
                                       @endforeach
                                       @else
                                       <div class="row">
                                          <div class="col-md-12">
                                             <label>MOQ: <span></span></label>
                                             <input type="hidden" name="product_price_id[]" value="<?php if(isset($product_price[0])){echo $product_price[0]->id;} ?>">
                                             <input type="hidden" name="product_price_id_FOB[]" value="<?php if(isset($product_price[0])){echo $product_price[0]->id;} ?>">
                                             <input type="text" name="product_MOQ[]" class="form-control" value="<?php if(isset($product_price[0])){echo $product_price[0]->product_MOQ;} ?>">
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <label>FOB Price: </label>
                                          </div>
                                          <?php
         			      						   $fob_price_array = explode('-', $product_price[0]->product_FOB);
         			      						?>
                                          <div class="col-md-5">
                                             <input type="text" name="product_FOB_from[]" class="form-control" placeholder="From" value="<?php if(isset($fob_price_array[0])){echo $fob_price_array[0];} ?>">
                                          </div>
                                          <div class="col-md-1">-</div>
                                          <div class="col-md-5">
                                             <input type="text" name="product_FOB_to[]" class="form-control" placeholder="To" value="<?php if(isset($fob_price_array[1])){echo $fob_price_array[1];} ?>">
                                          </div>
                                          <div class="col-md-1">
                                             <i class="fa fa-plus btn btn-xs btn-primary add_price_btn"></i>
                                          </div>
                                       </div>
                                       @endif
                                    </div>
                                    @else
                                    <table class="table quantity_base">
                                       <tbody>
                                          <tr>
                                             <input type="hidden" name="product_price_id[]" value="0">
                                             <td>Unit Type: </td>
                                             <td>
                                                <select class="form-control" name="unit_type" id="sel1">
                                                   @foreach($units as $u)
                                                   <option value={!! $u->id !!}>{!! $u->name !!}</option>
                                                   @endforeach
                                                </select>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>MOQ: <span></span></td>
                                             <td>
                                                <input type="text" name="product_MOQ[]" class="form-control"></td>
                                             <td>FOB Price: </td>
                                             <td>
                                                <input type="text" name="product_FOB_from[]" class="form-control check_number" placeholder="From">
                                             </td>
                                             <td>-</td>
                                             <td>
                                                <input type="text" name="product_FOB_to[]" class="form-control check_number" placeholder="To">
                                             </td>
                                             <td><i class="fa fa-plus btn btn-xs btn-primary add_price_btn"></i></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    @endif
                                    @if(count($product_price) > 0)
                                    <div class="table FOB_base" style="display: none;">
                                          <div class="form-group row">
                                             <div class="col-md-12 col-from-label">
                                                <label>Currency </label>
                                                <input type="hidden" name="product_price_id_FOB[]" value="<?php if(isset($product_price[0])){echo $product_price[0]->id;} ?>"></input>
                                                <select name="currencies" class="form-control">
                                                   <option value="">Select currency</option>
                                                   <option value="USD">America (United States) Dollars – USD</option>
                                                   <option value="AFN">Afghanistan Afghanis – AFN</option>
                                                   <option value="ALL">Albania Leke – ALL</option>
                                                   <option value="DZD">Algeria Dinars – DZD</option>
                                                   <option value="ARS">Argentina Pesos – ARS</option>
                                                   <option value="AUD">Australia Dollars – AUD</option>
                                                   <option value="ATS">Austria Schillings – ATS</option>
                                                   <option value="BSD">Bahamas Dollars – BSD</option>
                                                   <option value="BHD">Bahrain Dinars – BHD</option>
                                                   <option value="BDT">Bangladesh Taka – BDT</option>
                                                   <option value="BBD">Barbados Dollars – BBD</option>
                                                   <option value="BEF">Belgium Francs – BEF</option>
                                                   <option value="BMD">Bermuda Dollars – BMD</option>
                                                   <option value="BRL">Brazil Reais – BRL</option>
                                                   <option value="BGN">Bulgaria Leva – BGN</option>
                                                   <option value="CAD">Canada Dollars – CAD</option>
                                                   <option value="XOF">CFA BCEAO Francs – XOF</option>
                                                   <option value="XAF">CFA BEAC Francs – XAF</option>
                                                   <option value="CLP">Chile Pesos – CLP</option>
                                                   <option value="CNY">China Yuan Renminbi – CNY</option>
                                                   <option value="RMB - CNY">RMB (China Yuan Renminbi) – CNY</option>
                                                   <option value="COP">Colombia Pesos – COP</option>
                                                   <option value="XPF">CFP Francs – XPF</option>
                                                   <option value="CRC">Costa Rica Colones – CRC</option>
                                                   <option value="HRK">Croatia Kuna – HRK</option>
                                                   <option value="CYP">Cyprus Pounds – CYP</option>
                                                   <option value="CZK">Czech Republic Koruny – CZK</option>
                                                   <option value="DKK">Denmark Kroner – DKK</option>
                                                   <option value="DEM">Deutsche (Germany) Marks – DEM</option>
                                                   <option value="DOP">Dominican Republic Pesos – DOP</option>
                                                   <option value="NLG">Dutch (Netherlands) Guilders – NLG</option>
                                                   <option value="XCD">Eastern Caribbean Dollars – XCD</option>
                                                   <option value="EGP">Egypt Pounds – EGP</option>
                                                   <option value="EEK">Estonia Krooni – EEK</option>
                                                   <option value="EUR">Euro – EUR</option>
                                                   <option value="FJD">Fiji Dollars – FJD</option>
                                                   <option value="FIM">Finland Markkaa – FIM</option>
                                                   <option value="FRF*">France Francs – FRF*</option>
                                                   <option value="DEM">Germany Deutsche Marks – DEM</option>
                                                   <option value="XAU">Gold Ounces – XAU</option>
                                                   <option value="GRD">Greece Drachmae – GRD</option>
                                                   <option value="GTQ">Guatemalan Quetzal – GTQ</option>
                                                   <option value="NLG">Holland (Netherlands) Guilders – NLG</option>
                                                   <option value="HKD">Hong Kong Dollars – HKD</option>
                                                   <option value="HUF">Hungary Forint – HUF</option>
                                                   <option value="ISK">Iceland Kronur – ISK</option>
                                                   <option value="XDR">IMF Special Drawing Right – XDR</option>
                                                   <option value="INR">India Rupees – INR</option>
                                                   <option value="IDR">Indonesia Rupiahs – IDR</option>
                                                   <option value="IRR">Iran Rials – IRR</option>
                                                   <option value="IQD">Iraq Dinars – IQD</option>
                                                   <option value="IEP*">Ireland Pounds – IEP*</option>
                                                   <option value="ILS">Israel New Shekels – ILS</option>
                                                   <option value="ITL*">Italy Lire – ITL*</option>
                                                   <option value="JMD">Jamaica Dollars – JMD</option>
                                                   <option value="JPY">Japan Yen – JPY</option>
                                                   <option value="JOD">Jordan Dinars – JOD</option>
                                                   <option value="KES">Kenya Shillings – KES</option>
                                                   <option value="KRW">Korea (South) Won – KRW</option>
                                                   <option value="KWD">Kuwait Dinars – KWD</option>
                                                   <option value="LBP">Lebanon Pounds – LBP</option>
                                                   <option value="LUF">Luxembourg Francs – LUF</option>
                                                   <option value="MYR">Malaysia Ringgits – MYR</option>
                                                   <option value="MTL">Malta Liri – MTL</option>
                                                   <option value="MUR">Mauritius Rupees – MUR</option>
                                                   <option value="MXN">Mexico Pesos – MXN</option>
                                                   <option value="MAD">Morocco Dirhams – MAD</option>
                                                   <option value="NLG">Netherlands Guilders – NLG</option>
                                                   <option value="NZD">New Zealand Dollars – NZD</option>
                                                   <option value="NOK">Norway Kroner – NOK</option>
                                                   <option value="OMR">Oman Rials – OMR</option>
                                                   <option value="PKR">Pakistan Rupees – PKR</option>
                                                   <option value="XPD">Palladium Ounces – XPD</option>
                                                   <option value="PEN">Peru Nuevos Soles – PEN</option>
                                                   <option value="PHP">Philippines Pesos – PHP</option>
                                                   <option value="XPT">Platinum Ounces – XPT</option>
                                                   <option value="PLN">Poland Zlotych – PLN</option>
                                                   <option value="PTE">Portugal Escudos – PTE</option>
                                                   <option value="QAR">Qatar Riyals – QAR</option>
                                                   <option value="RON">Romania New Lei – RON</option>
                                                   <option value="ROL">Romania Lei – ROL</option>
                                                   <option value="RUB">Russia Rubles – RUB</option>
                                                   <option value="SAR">Saudi Arabia Riyals – SAR</option>
                                                   <option value="XAG">Silver Ounces – XAG</option>
                                                   <option value="SGD">Singapore Dollars – SGD</option>
                                                   <option value="SKK">Slovakia Koruny – SKK</option>
                                                   <option value="SIT">Slovenia Tolars – SIT</option>
                                                   <option value="ZAR">South Africa Rand – ZAR</option>
                                                   <option value="KRW">South Korea Won – KRW</option>
                                                   <option value="ESP">Spain Pesetas – ESP</option>
                                                   <option value="XDR">Special Drawing Rights (IMF) – XDR</option>
                                                   <option value="LKR">Sri Lanka Rupees – LKR</option>
                                                   <option value="SDD">Sudan Dinars – SDD</option>
                                                   <option value="SEK">Sweden Kronor – SEK</option>
                                                   <option value="CHF">Switzerland Francs – CHF</option>
                                                   <option value="TWD">Taiwan New Dollars – TWD</option>
                                                   <option value="THB">Thailand Baht – THB</option>
                                                   <option value="TTD">Trinidad and Tobago Dollars – TTD</option>
                                                   <option value="TND">Tunisia Dinars – TND</option>
                                                   <option value="TRY">Turkey New Lira – TRY</option>
                                                   <option value="AED">United Arab Emirates Dirhams – AED</option>
                                                   <option value="GBP">United Kingdom Pounds – GBP</option>
                                                   <option value="USD">United States Dollars – USD</option>
                                                   <option value="VEB">Venezuela Bolivares – VEB</option>
                                                   <option value="VND">Vietnam Dong – VND</option>
                                                   <option value="ZMK">Zambia Kwacha – ZMK</option>
                                                </select>
                                             </div>
                                          </div>
                                             <?php
            			      						   $fob_price_array = explode('-', $product_price[0]->product_FOB);
            			      						?>
                                             <div class="row">
                                                <div class="col-md-5">
                                                   <input type="text" name="currency_from" class="form-control check_number" placeholder="Price From" value="<?php if(isset($fob_price_array[0])){echo $fob_price_array[0];} ?>">
                                                </div>
                                                <div class="col-md-2">-</div>
                                                <div class="col-md-5">
                                                   <input type="text" name="currency_to" class="form-control check_number" placeholder="Price To" value="<?php if(isset($fob_price_array[1])){echo $fob_price_array[1];} ?>">
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-12 col-from-label">
                                                   <label>Per Unit</label>
                                                   <select class="form-control" name="unit_type_FOB" id="sel1">
                                                      @foreach($units as $u)
                                                      @if($u->id == $product->unit_type_id)
                                                      <option value="{!! $u->id !!}" selected>{!! $u->name !!}</option>
                                                      @else
                                                      <option value="{!! $u->id !!}">{!! $u->name !!}</option>
                                                      @endif

                                                      @endforeach
                                                   </select>
                                                </div>
                                             </div>
                                          <div class="row">
                                             <div class="col-md-12 col-from-label">
                                                <label>MOQ <span></span></label>
                                                <input type="text" name="product_MOQ_FOB" class="form-control" value="<?php if(isset($product_price[0])){echo $product_price[0]->product_MOQ;} ?>">
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-md-12 col-from-label">
                                                <label>Discounted Price <span></span></label>
                                                <input type="text" name="discounted_price" class="form-control check_number" value="<?php if(isset($product_price[0])){echo $product_price[0]->discounted_price;} ?>">
                                             </div>
                                          </div>
                                    </div>
                                    @else


                                    <table class="table FOB_base" style="display: none;">
                                       <tbody>
                                          <tr>
                                             <td>Currency </td>
                                             <td>
                                                <input type="hidden" name="product_price_id_FOB[]" value="0">
                                                <select name="currencies">
                                                   <option value="">Select currency</option>
                                                   <option value="USD">America (United States) Dollars – USD</option>
                                                   <option value="AFN">Afghanistan Afghanis – AFN</option>
                                                   <option value="ALL">Albania Leke – ALL</option>
                                                   <option value="DZD">Algeria Dinars – DZD</option>
                                                   <option value="ARS">Argentina Pesos – ARS</option>
                                                   <option value="AUD">Australia Dollars – AUD</option>
                                                   <option value="ATS">Austria Schillings – ATS</option>
                                                   <option value="BSD">Bahamas Dollars – BSD</option>
                                                   <option value="BHD">Bahrain Dinars – BHD</option>
                                                   <option value="BDT">Bangladesh Taka – BDT</option>
                                                   <option value="BBD">Barbados Dollars – BBD</option>
                                                   <option value="BEF">Belgium Francs – BEF</option>
                                                   <option value="BMD">Bermuda Dollars – BMD</option>
                                                   <option value="BRL">Brazil Reais – BRL</option>
                                                   <option value="BGN">Bulgaria Leva – BGN</option>
                                                   <option value="CAD">Canada Dollars – CAD</option>
                                                   <option value="XOF">CFA BCEAO Francs – XOF</option>
                                                   <option value="XAF">CFA BEAC Francs – XAF</option>
                                                   <option value="CLP">Chile Pesos – CLP</option>
                                                   <option value="CNY">China Yuan Renminbi – CNY</option>
                                                   <option value="RMB - CNY">RMB (China Yuan Renminbi) – CNY</option>
                                                   <option value="COP">Colombia Pesos – COP</option>
                                                   <option value="XPF">CFP Francs – XPF</option>
                                                   <option value="CRC">Costa Rica Colones – CRC</option>
                                                   <option value="HRK">Croatia Kuna – HRK</option>
                                                   <option value="CYP">Cyprus Pounds – CYP</option>
                                                   <option value="CZK">Czech Republic Koruny – CZK</option>
                                                   <option value="DKK">Denmark Kroner – DKK</option>
                                                   <option value="DEM">Deutsche (Germany) Marks – DEM</option>
                                                   <option value="DOP">Dominican Republic Pesos – DOP</option>
                                                   <option value="NLG">Dutch (Netherlands) Guilders – NLG</option>
                                                   <option value="XCD">Eastern Caribbean Dollars – XCD</option>
                                                   <option value="EGP">Egypt Pounds – EGP</option>
                                                   <option value="EEK">Estonia Krooni – EEK</option>
                                                   <option value="EUR">Euro – EUR</option>
                                                   <option value="FJD">Fiji Dollars – FJD</option>
                                                   <option value="FIM">Finland Markkaa – FIM</option>
                                                   <option value="FRF*">France Francs – FRF*</option>
                                                   <option value="DEM">Germany Deutsche Marks – DEM</option>
                                                   <option value="XAU">Gold Ounces – XAU</option>
                                                   <option value="GRD">Greece Drachmae – GRD</option>
                                                   <option value="GTQ">Guatemalan Quetzal – GTQ</option>
                                                   <option value="NLG">Holland (Netherlands) Guilders – NLG</option>
                                                   <option value="HKD">Hong Kong Dollars – HKD</option>
                                                   <option value="HUF">Hungary Forint – HUF</option>
                                                   <option value="ISK">Iceland Kronur – ISK</option>
                                                   <option value="XDR">IMF Special Drawing Right – XDR</option>
                                                   <option value="INR">India Rupees – INR</option>
                                                   <option value="IDR">Indonesia Rupiahs – IDR</option>
                                                   <option value="IRR">Iran Rials – IRR</option>
                                                   <option value="IQD">Iraq Dinars – IQD</option>
                                                   <option value="IEP*">Ireland Pounds – IEP*</option>
                                                   <option value="ILS">Israel New Shekels – ILS</option>
                                                   <option value="ITL*">Italy Lire – ITL*</option>
                                                   <option value="JMD">Jamaica Dollars – JMD</option>
                                                   <option value="JPY">Japan Yen – JPY</option>
                                                   <option value="JOD">Jordan Dinars – JOD</option>
                                                   <option value="KES">Kenya Shillings – KES</option>
                                                   <option value="KRW">Korea (South) Won – KRW</option>
                                                   <option value="KWD">Kuwait Dinars – KWD</option>
                                                   <option value="LBP">Lebanon Pounds – LBP</option>
                                                   <option value="LUF">Luxembourg Francs – LUF</option>
                                                   <option value="MYR">Malaysia Ringgits – MYR</option>
                                                   <option value="MTL">Malta Liri – MTL</option>
                                                   <option value="MUR">Mauritius Rupees – MUR</option>
                                                   <option value="MXN">Mexico Pesos – MXN</option>
                                                   <option value="MAD">Morocco Dirhams – MAD</option>
                                                   <option value="NLG">Netherlands Guilders – NLG</option>
                                                   <option value="NZD">New Zealand Dollars – NZD</option>
                                                   <option value="NOK">Norway Kroner – NOK</option>
                                                   <option value="OMR">Oman Rials – OMR</option>
                                                   <option value="PKR">Pakistan Rupees – PKR</option>
                                                   <option value="XPD">Palladium Ounces – XPD</option>
                                                   <option value="PEN">Peru Nuevos Soles – PEN</option>
                                                   <option value="PHP">Philippines Pesos – PHP</option>
                                                   <option value="XPT">Platinum Ounces – XPT</option>
                                                   <option value="PLN">Poland Zlotych – PLN</option>
                                                   <option value="PTE">Portugal Escudos – PTE</option>
                                                   <option value="QAR">Qatar Riyals – QAR</option>
                                                   <option value="RON">Romania New Lei – RON</option>
                                                   <option value="ROL">Romania Lei – ROL</option>
                                                   <option value="RUB">Russia Rubles – RUB</option>
                                                   <option value="SAR">Saudi Arabia Riyals – SAR</option>
                                                   <option value="XAG">Silver Ounces – XAG</option>
                                                   <option value="SGD">Singapore Dollars – SGD</option>
                                                   <option value="SKK">Slovakia Koruny – SKK</option>
                                                   <option value="SIT">Slovenia Tolars – SIT</option>
                                                   <option value="ZAR">South Africa Rand – ZAR</option>
                                                   <option value="KRW">South Korea Won – KRW</option>
                                                   <option value="ESP">Spain Pesetas – ESP</option>
                                                   <option value="XDR">Special Drawing Rights (IMF) – XDR</option>
                                                   <option value="LKR">Sri Lanka Rupees – LKR</option>
                                                   <option value="SDD">Sudan Dinars – SDD</option>
                                                   <option value="SEK">Sweden Kronor – SEK</option>
                                                   <option value="CHF">Switzerland Francs – CHF</option>
                                                   <option value="TWD">Taiwan New Dollars – TWD</option>
                                                   <option value="THB">Thailand Baht – THB</option>
                                                   <option value="TTD">Trinidad and Tobago Dollars – TTD</option>
                                                   <option value="TND">Tunisia Dinars – TND</option>
                                                   <option value="TRY">Turkey New Lira – TRY</option>
                                                   <option value="AED">United Arab Emirates Dirhams – AED</option>
                                                   <option value="GBP">United Kingdom Pounds – GBP</option>
                                                   <option value="USD">United States Dollars – USD</option>
                                                   <option value="VEB">Venezuela Bolivares – VEB</option>
                                                   <option value="VND">Vietnam Dong – VND</option>
                                                   <option value="ZMK">Zambia Kwacha – ZMK</option>
                                                </select>
                                             </td>
                                             <td>
                                                <input type="text" name="currency_from" class="form-control check_number" placeholder="Price From">
                                             </td>
                                             <td>-</td>
                                             <td>
                                                <input type="text" name="currency_to" class="form-control check_number" placeholder="Price To">
                                             </td>
                                             <td>Per Unit: </td>
                                             <td>
                                                <select class="form-control" name="unit_type_FOB" id="sel1">
                                                   @foreach($units as $u)
                                                   <option value={!! $u->id !!}>{!! $u->name !!}</option>
                                                   @endforeach
                                                </select>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>MOQ: <span></span></td>
                                             <td><input type="text" name="product_MOQ_FOB" class="form-control"></td>
                                          </tr>
                                          <tr>
                                             <td>Discounted Price: <span></span></td>
                                             <td><input type="text" name="discounted_price" class="form-control check_number"></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    @endif
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     </div>

                     <div class="margin_top1">
                        <div class="sd-card">
                           <h4 class="card-title">
                              Logistic info
                           </h4>
                           <!-- <div class="form-control height-auto"> -->
                           <!-- <ul class="list-unstyled">
   								<li> -->
                           <div class="sd-card-body">
                              <div class="form-group row">
                                 <div class="col-md-3 col-from-label">
                                    <label>Processing time</label>
                                 </div>
                                 <div class="col-md-8">
                                     <input validation="validated_true" class="form-control validate check_integer" maxlength="4" max="9999" type="text" name="processing_time" value="<?php if(isset($bdtdc_logistic_infos[0])){echo $bdtdc_logistic_infos[0]->processing_time;}else{echo '';} ?>">
                                    <p class="empty_error hidden_icon">
                                    <i class="fa fa-times-circle" aria-hidden="true"></i> Please enter processing time or put 0 to ignore</p>
                                    <div class="col-xs-3 validation_status">
                                    <i class="fa fa-check-square btn btn-sm btn-success hidden_icon validated_true"></i>
                                    <i class="fa fa-exclamation-triangle btn btn-sm btn-danger hidden_icon validated_false"></i>
                                    <span class="text-danger validation_message"></span>
                                    </div>
                                 </div>
                              </div>

                              <div class="form-group row">
                                 <div class="col-md-3 col-from-label">
                                    <label>Port</label>
                                 </div>
                                 <div class="col-md-8">
                                    <input validation="validated_true" class="form-control validate" type="text" name="port" value="<?php if(isset($bdtdc_logistic_infos[0])){echo $bdtdc_logistic_infos[0]->port;}else{echo '';} ?>">
                                    <p class="empty_error hidden_icon"><i style="color:red;" class="fa fa-times-circle" aria-hidden="true"></i> Please Enter port or put 0 to ignore</p>
                                    <div class="col-xs-3 validation_status">
                                       <i class="fa fa-check-square btn btn-sm btn-success hidden_icon validated_true"></i>
                                       <i class="fa fa-exclamation-triangle btn btn-sm btn-danger hidden_icon validated_false"></i>
                                       <span class="text-danger validation_message"></span>
                                    </div>
                                 </div>

                              </div>

                              <div class="form-group row">
                                 <div class="col-md-3 col-from-label">
                                    <label>Supply ability</label>
                                 </div>
                                 <div class="col-md-8">
                                    <input validation="validated_true" class="form-control validate check_integer" maxlength="9" max="999999999" type="text" name="supply_ability" value="<?php if(isset($bdtdc_logistic_infos[0])){echo $bdtdc_logistic_infos[0]->supply_ability;}else{echo '';} ?>">
                                    <p class="empty_error hidden_icon"><i style="color:red;" class="fa fa-times-circle" aria-hidden="true"></i> Please enter supply ability or put 0 to ignore</p>
                                    <div class="col-xs-3 validation_status">
                                       <i class="fa fa-check-square btn btn-sm btn-success hidden_icon validated_true"></i>
                                       <i class="fa fa-exclamation-triangle btn btn-sm btn-danger hidden_icon validated_false"></i>
                                       <span class="text-danger validation_message"></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="margin_top1">
                        <div class="sd-card">
                           <h4 class="card-title">
                              Product Group
                           </h4>
                           <div class="sd-card-body">
                              <div class="form-group row">
                                 <div class="col-md-3"></div>
                                 <div class="col-md-8">
                                    <p class="summary">Grouping your products makes it easier for buyers to find them</p>
                                 </div> 
                              </div>
                              <div class="form-group row">
                                 <div class="col-md-3 col-from-label">
                                    <label>Group Name</label>
                                 </div>
                                 <div class="col-md-8">
                                    <select style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%" class="form-control" name="product_groups" id="sel1">
                                       @foreach($product_groups as $u)
                                       @if($supplier_product->product_groups == $u->id)
                                       <option value="{!! $u->id !!}" selected>{!! $u->name !!}</option>
                                       @else
                                       <option value="{!! $u->id !!}">{!! $u->name !!}</option>
                                       @endif
                                       @endforeach
                                    </select>
                                    <p class="product_group_error hidden_icon" style="margin-top: 4px;padding: 2px 4px;font-size: 12px;color: #333;border: 1px solid #ffd4d2;background-color: #ffefee;"><i style="color:red;" class="fa fa-times-circle" aria-hidden="true"></i> Please select a product group (add new if not available)</p>
                                    <span class="group_name_form_opener"> 
                                       <i style="font-size: 25px;color: #19446F;" class="btn btn-xs fa fa-plus-square"></i>
                                    </span>
                                    <div class="add_group_name_form_area">
                                       <div class="col-md-10">
                                          <input type="text" name="add_group_name[]" placeholder="Group Name" class="form-control">
                                          <a href="" class="btn btn-success btn-sm product_group_submit_btn">Save</a>
                                       </div>
                                       <div class="text-right">
                                          <a class="btn btn-xs btn-danger group_name_from_remover" href="">
                                             <i class="fa fa-remove"></i>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="margin_top1">
                        <div class="sd-card">
                           <h4 class="card-title">
                              Payments Details
                           </h4>
                           <div class="sd-card-body">
                              <div class="form-group row">
                                 <div class="col-md-3 col-from-label">
                                    <label>Group Name</label>
                                 </div>
                                 <div class="col-md-8">
                                    <div class="form-control height-auto">
                                       <ul class="list-unstyled">
                                          <li>
                                             <label><input class="" type="checkbox" name="payment[]" value="L/C"> L/C</label>
                                             <label><input class="" type="checkbox" name="payment[]" value="Paypal"> Paypal</label>
                                             <label><input class="" type="checkbox" name="payment[]" value="D/A"> D/A</label>
                                             <label><input class="" type="checkbox" name="payment[]" value="Western Union"> Western Union</label>
                                             <label><input class="" type="checkbox" name="payment[]" value="D/P"> D/P</label>
                                             <label><input class="" type="checkbox" name="payment[]" value="MoneyGram"> MoneyGram</label>
                                             <label><input class="" type="checkbox" name="payment[]" value="Cash"> Cash</label>
                                             <label><input class="" type="checkbox" name="payment[]" value="Escrow"> Escrow</label>
                                             <label><input class="" type="checkbox" name="payment[]" value="T/T"> T/T</label>
                                             <label><input class="" type="checkbox" name="payment[]" value="others" id="others_id"> Others</label>
                                             <div id="others_area" style="display:none;border: 1px solid rgb(23, 175, 186);padding: 10px;"><input type="text" name="others_payment" placeholder="Other Payments Method" class="form-control" style="height:30px;font-size:12px;margin-bottom: 1%">
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                    <span class="help-block">
                                       select one or more options 
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="margin_top1">
                        <div class="sd-card">
                           <h4 class="card-title">
                              Packages And Delivery Details
                           </h4>
                           <div class="sd-card-body">
                              <div class="form-group row">
                                 <div class="col-md-3 col-from-label">
                                    <label>Packages And Delivery</label>
                                 </div>
                                 <div class="col-md-8">
                                    <textarea class="form-control maxlength-handler validate" validation="validated_true" name="packages_delivery" maxlength="1000">{{ $supplier_product->delivery }}</textarea>
                                    <p class="empty_error hidden_icon" style="margin-top: 4px;padding: 2px 4px;font-size: 12px;color: #333;border: 1px solid #ffd4d2;background-color: #ffefee;"><i style="color:red;" class="fa fa-times-circle" aria-hidden="true"></i> Please give product packages and delivery information</p>
                                    <i class="fa fa-check-square btn btn-sm btn-success hidden_icon validated_true"></i>
                                    <i class="fa fa-exclamation-triangle btn btn-sm btn-danger hidden_icon validated_false"></i>
                                    <span class="text-danger validation_message"></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="margin_top1">
                        <div class="sd-card">
                           <h4 class="card-title">
                              Product Description
                           </h4>
                           <div class="sd-card-body">
                              <div class="form-group row">
                                 <div class="col-md-3 col-from-label">
                                    <label>Product Details</label>
                                 </div>
                                 <div class="col-md-9">
                                    <textarea id="editor" class="form-control product_desc" validation="validated_true" name="product_description">{{ $supplier_product->description }}</textarea>
                                    <p class="empty_error hidden_icon" style="margin-top: -24px;padding: 2px 4px;font-size: 12px;color: #333;border: 1px solid #ffd4d2;background-color: #ffefee;"><i style="color:red;" class="fa fa-times-circle" aria-hidden="true"></i> Please type some product details</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="row margin_top1" style="margin-top: 30px;">
                        <div style="text-align:right;padding-right:0px" class="col-md-2">
                           <label for=""></label>
                        </div>
                        <div class="col-md-7">
                           <div style="">
                              <label>
                                 <input type="checkbox" name="terms_condition" value="terms" checked> I accept with the <a target="_blank" href="{{ URL::to('product_listing_policy',null) }}">terms and conditions.</a>
                                 <p class="term_condition_error hidden_icon" style="margin-top: 4px;padding: 2px 4px;font-size: 12px;color: #333;border: 1px solid #ffd4d2;background-color: #ffefee;"><i style="color:red;" class="fa fa-times-circle" aria-hidden="true"></i> Please accept the terms and conditions.</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xs-12 bg-info" style="padding:1%;padding-left:18%;margin-bottom:2%;margin-top:4%">
                  <input type="submit" class="btn btn-primary btn-lg btn-join product_update_submit_btn" value="Update">
                  <a class="btn btn-primary btn-lg btn-join" href="{!! URL::to('dashboard/product') !!}">Cancel</a>
               </div>
                     {!! Form::close() !!}
            </div>
         </div>
         <div class="col-md-4">
            <div style="z-index: 0;margin: 0px; background-color: #fff; width: 100%" class="box">
               <div style="padding-left:4px;width:100%;padding-top:2px;padding-bottom:30px">
                  <div style="border-bottom: 1px solid rgba(204, 204, 204, 0.62)">
                     <h4 style="text-align: left;padding-left: 15px">Tips & Helps</h4>
                  </div>
                  <ul style=" padding-left: 10px;" class="">
                     <!-- <li class="navigation-menu-list-li"><a itemprop="url"  href="{{ URL::to('account-settings',null) }}" class="navigation-menu-list-li-a">Account Settings</a></li> -->
                     <div style="border-bottom: 1px solid rgba(204, 204, 204, 0.62)">
                        <h4 style="text-align: left;padding-left: 5px">For Buyer</h4>
                     </div>
                     <li class="navigation-menu-list-li" style="padding: 5px;">
                        <a itemprop="url" href="{{ URL::to('ServiceChannel/pages/for_buyer',35)}}" class="navigation-menu-list-li-a">Help Center for Buyers</a>
                     </li>
                     @foreach($pages as $page)
                     @if($page->prefix == 'BuyerChannel' )
                     <li class="navigation-menu-list-li" style="padding: 5px;">
                        <a itemprop="url" href="{{ URL::to($page->prefix.'/pages/'.$page->sort_name,$page->id)}}" class="navigation-menu-list-li-a">{{ $page->name }}</a>
                     </li>
                     @endif
                     @endforeach
                  </ul>
               </div>
            </div>
            <div style="width: 100%;z-index: 9;margin: 0px;background-color: #fff;margin-top: 5%" class="box">
               <div style="padding-left:4px;width:100%;padding-top:2px;padding-bottom:30px">
                  <div style="border-bottom: 1px solid rgba(204, 204, 204, 0.62)">
                     <h4 style="text-align: left;padding-left: 15px">For Supplier</h4>
                  </div>
                  <ul style="    padding-left: 10px;" class="">
                     <!-- <li class="navigation-menu-list-li"><a itemprop="url"  href="{{ URL::to('account-settings',null) }}" class="navigation-menu-list-li-a">Account Settings</a></li> -->
                     <li class="navigation-menu-list-li" style="padding: 5px;"><a itemprop="url" href="{{ URL::to('ServiceChannel/pages/for_buyer',35)}}" class="navigation-menu-list-li-a">Help Center for Suppliers</a></li>
                     @foreach($pages as $page)
                     @if($page->prefix == 'SupplierChannel' )
                     <li class="navigation-menu-list-li" style="    padding: 5px;"><a itemprop="url" href="{{ URL::to($page->prefix.'/pages/'.$page->sort_name,$page->id)}}" class="navigation-menu-list-li-a">{{ $page->name }}</a></li>
                     @endif
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@stop
@section('scripts')

<script src="{{asset('assets/global/plugins/ckeditor/ckeditor.js')}}"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
	(function() {
	   function ajax_success_message(str) {
	      $('#ajax_status').html(str).fadeOut(1500, function() {
	         $('#ajax_status').addClass('hide_this');
	      });
	   }

	   /************* Payment Method Update ****************/
	   var cat_id, cat_arr, parent_cat, chield_cat;
	   cat_id = $('[name="hidden_categorie"]').val();
	   // alert (cat_id);
	   cat_arr = cat_id.split(",");
	   parent_cat = cat_arr[0];
	   $('[name="categories[]"][value="' + cat_id + '"]').prop('checked', true);

	   var method = $('[name="hidden_payment_tearms"]').val();
	   var payment_array = ["L/C", "Paypal", "D/A", "Western Union", "D/P", "MoneyGram", "Cash", "Escrow", "T/T"];
	   method_arr = method.split(",");
	   for (i = 0; i < method_arr.length; i++) {
	      $('[name="payment[]"][value="' + method_arr[i] + '"]').prop('checked', true);
	   }
	   for (var j = 0; j < method_arr.length; j++) {
	      var others_found = payment_array.indexOf(method_arr[j]);
	      if (payment_array.indexOf(method_arr[j]) == -1) {
	         $('[name="payment[]"][value="others"]').prop('checked', true);
	         $('[name="others_payment"]').val(method_arr[j]);
	         $('#others_area').show(500);
	      }
	   }

	   /************* CHANGE SUB-CATEGORY *************/
	   $(document).on({
	      change: function() {
	         var id = $(this).val();
	         if (parseInt(id) == 0) {
	            $('.parent_cat_error').show();
	            $('.sub_cat_error').show();
	         } else {
	            $('.parent_cat_error').hide();
	         }
	         var url = $('[name="base_url"]').val() + "/get_sub_category/" + id;
	         var template = "<option value='0'>Select a sub category</option>";
	         $.get(url).done(function(r) {
	            $.each(r, function(i, v) {
	               if (id == 0) {
	                  template += '';
	               } else {
	                  template += "<option value=" + v.id + ">" + $.trim(v.name) + "</option>";
	               }
	            });
	            $('[name="sub_category"]').html(template);
	         })
	      }
	   }, '[name="parent_category"]');

	   $(document).on({
	      change: function() {
	         var id = $(this).val();
	         if (parseInt(id) == 0) {
	            $('.sub_cat_error').show();
	         } else {
	            $('.sub_cat_error').hide();
	         }
	      }
	   }, '[name="sub_category"]');
	   /************* CHANGE SUB-CATEGORY END *************/

	   /*************PRODUCT ATTRIBUTES ADD *************/
	   $(document).on({
	      click: function(e) {
	         e.preventDefault();
	         // alert (5);
	         var target_area, data_template, prev_name, prev_value;

	         prev_name = $(this).closest('tr').find('[name="product_attr_name[]"]').val();
	         prev_value = $(this).closest('tr').find('[name="product_attr_value[]"]').val();
	         data_template = '<tr>\
	                                        <input type="hidden" name="attr_id[]" value="0">\
	                                        <td>Name:</td>\
	                                        <td><input style="height:27px;padding-bottom:1%;font-size:12px" type="text" name="product_attr_name[]" class="form-control"></td>\
	                                        <td>Value:</td>\
	                                        <td><input style="height:27px;padding-bottom:1%;font-size:12px" type="text" name="product_attr_value[]" class="form-control"></td>\
	                                        <td> <button class="btn btn-danger btn-xs remove_attributes"><i class="fa fa-minus" style="padding:2px;"></i></button> </td>\
	                                    </tr>';
	         (prev_name.length > 0 && prev_value.length > 0) ? $('.copied_template').append(data_template): alert('Please fill attribute name and value first');
	      }
	   }, '.add_more_attribute_btn_for_edit');
	   /*************PRODUCT ATTRIBUTES ADD end*************/

	   /*************ADD PRICE MOQ && FOB *************/
	   $(document).on({
	      click: function(e) {
	         template = '<tr>\
	                                        <input type="hidden" name="product_price_id[]" value="0">\
	                                        <td>MOQ: <span></span></td>\
	                                        <td>\
	                                            <input style="height:27px;padding-bottom:1%;font-size:12px" type="text" name="product_MOQ[]" value="" class="form-control">\
	                                        </td>\
	                                         <td> FOB Price: </td>\
	                                         <td>\
	                                            <input style="height:27px;padding-bottom:1%;font-size:12px;width:100px;" type="text" name="product_FOB_from[]" placeholder="From" class="form-control check_number">\
	                                        </td>\
	                                        <td style="text-align:center;">-</td>\
	                                        <td>\
	                                            <input style="height:27px;padding-bottom:1%;font-size:12px;width:100px;" type="text" name="product_FOB_to[]" class="form-control check_number" placeholder="To">\
	                                        </td>\
	                                        <td><i class="fa fa-plus btn btn-xs btn-primary add_price_btn"></i> <i class="fa fa-minus btn btn-xs btn-danger remove_attributes"></i></td>\
	                                    </tr>';
	         $(this).closest('tbody').append(template);

	      }
	   }, '.add_price_btn');
	   /*************ADD PRICE MOQ && FOB *************/

	   $(document).on({
	      click: function(e) {
	         e.preventDefault();
	         var deleted_attr_id = $(this).attr('deleted_attr_id');
	         // alert (deleted_attr_id);
	         if (deleted_attr_id != 'undefined') {
	            if ($(this).attr('check_btn') == 'attribute') {
	               $(this).parent().parent().parent().parent().append('<input type="hidden" name="deleted_attr_id[]" value="' + deleted_attr_id + '">');
	            } else if ($(this).attr('check_btn') == 'trade') {
	               $(this).parent().parent().parent().parent().append('<input type="hidden" name="deleted_trade_id[]" value="' + deleted_attr_id + '">');
	            }
	         }
	         $(this).closest('tr').remove();
	      }
	   }, '.remove_attributes');

	   /*************PRODUCT GROUP FORM OPENER*************/
	   $(document).on({
	      click: function() {
	         $('.add_group_name_form_area').show(300)
	      }
	   }, '.group_name_form_opener');

	   /*************PRODUCT GROUP FORM REMOVER*************/
	   $(document).on({
	      click: function(e) {
	         e.preventDefault();
	         $('.add_group_name_form_area').hide(300)
	      }
	   }, '.group_name_from_remover');

	   /*************PRODUCT GROUP FORM SUBMIT*************/
	   $(document).on({
	      click: function(e) {
	         e.preventDefault();
	         var url = window.location.origin + "/add_product_group/" + $("[name='add_group_name[]']:first").val();
	         $('.group_name_from_remover').click();
	         $.get(url, function(r) {
	            $('.table select[name="product_groups"]:first').append("<option value='" + r.id + "'>" + r.name + "</option>");
	         });
	      }
	   }, '.product_group_submit_btn');


	   /*************FORM VALIDATION *************/
	   $(document).on({
	      blur: function() {
	         var relative_row = $(this).parent().parent();
	         if (!$.trim(this.value).length) {
	            $(this).attr('validation', 'validated_false');
	            relative_row.find('.validated_true').hide(500);
	            relative_row.find('.validated_false').show(500);
	            relative_row.find('.empty_error').show(500);
	         } else {
	            $(this).attr('validation', 'validated_true');
	            relative_row.find('.empty_error').hide(500);
	            relative_row.find('.validated_false').hide(500);
	            relative_row.find('.validated_true').show(500);
	            $(this).attr('style', "border:1px solid #e5e5e5");
	         }
	         return;
	      }
	   }, '.validate');


	   $(document).on({
	      blur: function() {
	         var relative_row = $(this).parent().parent();
	         if ($(this).val() == 0) {
	            $(this).attr('validation', 'validated_false');
	            relative_row.find('.validated_true').hide(500);
	            relative_row.find('.validated_false').show(500);
	            relative_row.find('.empty_error').show(500);
	         } else {
	            $(this).attr('validation', 'validated_true');
	            relative_row.find('.empty_error').hide(500);
	            relative_row.find('.validated_false').hide(500);
	            relative_row.find('.validated_true').show(500);
	            $(this).attr('style', "border:1px solid #e5e5e5");
	         }
	         return;
	      }
	   }, '.validate_place_origin');

	   $(document).on({
	      click: function(e) {
	         if ($('[name="terms_condition"]').prop('checked') == true) {
	            $('[name="terms_condition"]').css('box-shadow', '');
	            $('[name="terms_condition"]').parent().css('color', 'inherit');
	            $('.term_condition_error').hide();
	         } else {
	            $('[name="terms_condition"]').focus();
	            $('[name="terms_condition"]').css('box-shadow', '0px 0px 3px 1px red');
	            $('[name="terms_condition"]').parent().css('color', 'red');
	            $('.term_condition_error').show();
	         }
	      }
	   }, '[name="terms_condition"]');

	   $(document).on({
	      keyup: function(event) {
	         // Allow: backspace, delete, tab, escape, and enter
	         if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
	            // Allow: Ctrl+V
	            (event.ctrlKey == true && (event.which == '118' || event.which == '86')) ||
	            // Allow: Ctrl+c
	            (event.ctrlKey == true && (event.which == '99' || event.which == '67')) ||
	            // Allow: Ctrl+A
	            (event.keyCode == 65 && event.ctrlKey === true) ||
	            // Allow: home, end, left, right
	            (event.keyCode >= 35 && event.keyCode <= 39)) {
	            // let it happen, don't do anything
	            return;
	         }

	         var currentEl = $(this);
	         var value = $(currentEl).val();

	         // remove letters...
	         value = value.replace(/[^0-9.-]/g, "");

	         var hasDecPlace = value.match(/\./);

	         // separate integer from decimal places:
	         var pieces = value.split('.');
	         var integer = pieces[0].replace('-', '');
	         var decPlaces = ""
	         if (pieces.length > 1) {
	            pieces.shift();
	            decPlaces = pieces.join('').replace('-', '');
	         }

	         // handle numbers greater than 12.00... :
	         if (parseInt(integer) > 100000 || parseInt(integer) === 100000 && parseInt(decPlaces) > 0) {
	            integer = "100000";
	            decPlaces = getZeroedDecPlaces(decPlaces);
	            alert("number must be between 0.00 and 100000.00");
	         } // ...and less than 0:
	         else if (parseInt(integer) < 0) {
	            integer = "0";
	            decPlaces = getZeroedDecPlaces(decPlaces);
	            alert("number must be between 0.00 and 100000.00");
	         }

	         // handle more than two decimal places:
	         if (decPlaces.length > 2) {
	            decPlaces = decPlaces.substr(0, 2);
	            alert("number cannot have more than two decimal places");
	         }

	         var newVal = hasDecPlace ? integer + '.' + decPlaces : integer;

	         $(currentEl).val(newVal);
	      }
	   }, '.check_number');

	   function getZeroedDecPlaces(decPlaces) {
	      if (decPlaces === '') return '';
	      else if (decPlaces.length === 1) return '0';
	      else if (decPlaces.length >= 2) return '00';
	   }

	   $(document).on({
	      keyup: function(event) {
	         // Allow: backspace, delete, tab, escape, and enter
	         if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
	            // Allow: Ctrl+V
	            (event.ctrlKey == true && (event.which == '118' || event.which == '86')) ||
	            // Allow: Ctrl+c
	            (event.ctrlKey == true && (event.which == '99' || event.which == '67')) ||
	            // Allow: Ctrl+A
	            (event.keyCode == 65 && event.ctrlKey === true) ||
	            // Allow: home, end, left, right
	            (event.keyCode >= 35 && event.keyCode <= 39)) {
	            // let it happen, don't do anything
	            return;
	         }
	         var o = $(this);
	         o.val(o.val().replace(/[^\d]/g, ""));
	         if (o.val().length > o.maxLength) {
	            o.val(o.value.slice(0, o.maxLength))
	         }
	      }
	   }, '.check_integer');

	   $(document).on({
	      change: function() {
	         if ($(this).val() == 0) {
	            $(this).attr('validation', 'validated_false');
	            $('.place_origin_error').show();
	         } else {
	            $(this).attr('validation', 'validated_true');
	            $('.place_origin_error').hide();
	         }
	      }
	   }, '[name="country"]');



	   /*************PRODUCT IMAGE UPLOAD *************/
	   var img_id_no = 1;
	   $(document).on({
	      change: function() {

	         var template, size = "",
	            name = "",
	            sliced_name = "",
	            type = "",
	            src = "",
	            reader, animation, animation_end, img_file;

	         if (this.files && this.files[0]) {

	            name = this.files[0].name;
	            sliced_name = this.files[0].name.slice(-15)
	            type = this.files[0].type;
	            size = this.files[0].size;
	            img_file = this.files[0];
	            $('.image_attachment_error').hide();

	            if ($('.img_container').length >= 6) {
	               $('.img_' + img_id_no).val('');
	               $('.image_attachment_error span').text('Maximum six product images are allowed. Delete product(s) to add more');
	               $('.image_attachment_error').show();
	            } else if (type == 'image/jpeg' || type == 'image/png') {
	               if (size > 2097152) {
	                  $('.img_' + img_id_no).val('');
	                  $('.image_attachment_error span').text('Maximum file size 2MB.');
	                  $('.image_attachment_error').show();
	               } else {
	                  reader = new FileReader();
	                  animation = "animated flip";
	                  animation_end = "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
	                  reader.readAsDataURL(img_file);
	                  reader.onload = function(e) {
	                     src = e.target.result;
	                     template = '<div style="border-right: 1px solid #ddd" class="col-sm-3 img_container">\
			                                    <div class="col-xs-12 text-center" style="margin-bottom: 1%">\
			                                        <i class="fa fa-remove btn btn-xs btn-danger remove_img" data-img_target="img_' + img_id_no + '" data-img_id="0"></i>\
			                                    </div>\
			                                    <div class="col-xs-12">\
			                                        <img src="' + src + '" alt="" class="img-responsive" style="height:102px;width:100%">\
			                                    </div>\
			                                    <div class="col-xs-12" style="padding-top: 2%">\
			                                        <p class="img_details" title="' + name + '">Name: <span class="text-muted img_name">...' + sliced_name + '</span></p>\
			                                        <p class="img_details">Size: <span class="text-muted img_size">' + size + '</span></p>\
			                                        <p class="img_details">Type: <span class="text-muted img_type">' + type + '</span></p>\
			                                    </div>\
			                                </div>';
	                     $('.img_preview').append(template);
	                     $('.image_required_error').hide();
	                     $('.img_' + img_id_no).hide();
	                     img_id_no++;
	                     $('.image_container').append('<input type="file" name="product_images[]" class="p_add_img img_' + img_id_no + '">');
	                  }
	               }
	            } else {
	               $('.img_' + img_id_no).val('');
	               $('.image_attachment_error span').text('Only jpg or png files are allowed.');
	               $('.image_attachment_error').show();
	            }
	         }

	      }
	   }, '.p_add_img');


	   /*************PRODUCT IMAGE REMOVE *************/
	   $(document).on({
	      click: function(e) {
	         var target_img_class = $(this).attr('data-img_target');
	         var img_id = $(this).attr('data-img_id');
	         if (target_img_class == 0 && img_id > 0) {
	            $('#deleted_p_image').append('<input type="hidden" name="deleted_p_image_id[]" value="' + img_id + '">');
	         } else {
	            $('.' + target_img_class).remove();
	         }
	         $(this).closest('.img_container').remove();
	      }
	   }, '.remove_img');


	   /************* ERROR SHOW HIDE ****************/
	   function hide_error() {
	      $('.backend_error').hide();
	   }

	   /*************PRODUCT FORM SUBMIT*************/
	   $(document).on({
	      click: function(e) {
	         e.preventDefault();
	         var product_name_val = $.trim($('[name="product_name"]').val());
	         var parent_cat_id = $('[name="parent_category"]').val();
	         var sub_cat_id = $('[name="sub_category"]').val();
	         $('.validate[validation="validated_true"]').attr('style', "border:1px solid #e5e5e5");

	         if (product_name_val == '') {
	            $('[name="product_name"]').attr('style', "border:1px solid red");
	            $('[name="product_name"]').focus();
	            $('[name="product_name"]').parent().children('.empty_error').show();
	         } else if (parent_cat_id == 0) {
	            $('[name="parent_category"]').focus();
	            $('.parent_cat_error').show();
	         } else if (sub_cat_id == 0) {
	            $('.parent_cat_error').hide();
	            $('[name="sub_category"]').focus();
	            $('.sub_cat_error').show();
	         } else if ($('.img_container').length == 0) {
	            $('.sub_cat_error').hide();
	            $('.img_1').focus();
	            $('.image_required_error').show();
	         } else if ($('[name="country"]').val() == 0) {
	            $('.image_required_error').hide();
	            $('[name="country"]').focus();
	            $('.place_origin_error').show();
	         } else if ($('[name="product_groups"]').val() == null || $('[name="product_groups"]').val() == 'undefined' || $('[name="product_groups"]').val() == 0) {
	            $('.place_origin_error').hide();
	            $('[name="product_groups"]').focus();
	            $('.product_group_error').show();
	         } else if (CKEDITOR.instances.editor.getData() == '') {
	            $('.product_group_error').hide();
	            $('.cke_wysiwyg_frame').css('border', '1px solid red');
	            $('[name="product_description"]').parent().children('.empty_error').show();
	         } else if ($('.validate[validation="validated_false"]').length > 0) {
	            $('[name="product_description"]').parent().children('.empty_error').hide();
	            $('.cke_wysiwyg_frame').css('border', '1px solid #d1d1d1');
	            $('.validate[validation="validated_false"]').attr('style', "border:1px solid red");
	            $('.validate[validation="validated_false"]').focus();
	         } else if ($('[name="terms_condition"]').prop('checked') == false) {
	            $('[name="terms_condition"]').focus();
	            $('[name="terms_condition"]').parent().css('color', 'red');
	            $('.term_condition_error').show();
	         } else if (parseInt(parent_cat_id) != 0 && parseInt(sub_cat_id) != 0) {
	            if ($('[name="terms_condition"]').prop('checked') == true) {
	               var form = $('.product_info_form');
	               form.submit();
	               // alert ('ok');
	               /*$.post(form.attr('action'),form.serialize()+'&'+$.param({ 'product_description': CKEDITOR.instances.editor.getData() }),function(r){
	                    	if(r.success == true){
	                    		swal({
	                              title: "Product Updated",
	                              timer: 2000,
	                              showConfirmButton: false,
	                              imageUrl: "https://cdn2.iconfinder.com/data/icons/toolbar-signs-4/512/success_ok_check_yes_accept-512.png",
	                              showCancelButton: true
	                            });
	                            window.location.href = window.location.origin+'/dashboard/product';
	                    	}else{
	                    		var template = '';
	                        	$.each(r,function(i,v){
					              	template += '<li> * '+v+'</li>';
					            });
					            $('.backend_error').html(template);
					            window.scrollTo(0, 0);
					            $('.backend_error').show();
					            // setTimeout(hide_error, 9000);
	                    	}
	                    });*/
	            } else {
	               alert("You must accept the terms and conditions.");
	            }
	         } else {
	            $('.backend_error').html('* Please Select a parent category and a sub-category first');
	            window.scrollTo(0, 0);
	            $('.backend_error').show();
	            // setTimeout(hide_error, 9000);
	         }
	      }
	   }, '.product_update_submit_btn');




	   $('.hidden_icon').hide();
	   $('.add_group_name_form_area').hide();

	   CKEDITOR.replace('editor', {
	      extraPlugins: 'uploadimage,image2,colordialog',
	      height: 300,

	      // Upload images to a CKFinder connector (note that the response type is set to JSON).
	      uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

	      // Configure your file manager integration. This example uses CKFinder 3 for PHP.
	      filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
	      filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
	      filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	      filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

	      // The following options are not necessary and are used here for presentation purposes only.
	      // They configure the Styles drop-down list and widgets to use classes.

	      stylesSet: [{
	            name: 'Narrow image',
	            type: 'widget',
	            widget: 'image',
	            attributes: {
	               'class': 'image-narrow'
	            }
	         },
	         {
	            name: 'Wide image',
	            type: 'widget',
	            widget: 'image',
	            attributes: {
	               'class': 'image-wide'
	            }
	         }
	      ],

	      // Load the default contents.css file plus customizations for this sample.
	      contentsCss: [CKEDITOR.basePath + 'contents.css', 'assets/css/widgetstyles.css'],

	      // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
	      // resizer (because image size is controlled by widget styles or the image takes maximum
	      // 100% of the editor width).
	      image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
	      image2_disableResizer: true



	   });

	   /*$('.product_desc').jqte();
	   // settings of status
	   var jqteStatus = true;
	   $(".status").click(function(){
	   	jqteStatus = jqteStatus ? false : true;
	   	$('.jqte-test').jqte({"status" : jqteStatus})
	   });*/

	   $('[name="base"]').click(function() {
	      if ($(this).val() == 'based_FOB') {
	         $('.quantity_base').hide(300);
	         $('.FOB_base').show(500);
	      } else {
	         $('.quantity_base').show(500);
	         $('.FOB_base').hide(300);
	      }
	   });

	   if (document.getElementById('based_FOB_id').checked) {
	      $('.quantity_base').hide(300);
	      $('.FOB_base').show(500);
	   } else {
	      $('.quantity_base').show(500);
	      $('.FOB_base').hide(300);
	   }

	   $('[value="others"]').click(function() {
	      // if ($('[value="others"]').is(':checked')){
	      if (document.getElementById('others_id').checked) {
	         //if($('[value="others"]').checked){
	         $('#others_area').show(500);
	      } else {
	         $('#others_area').hide(300);
	      }
	   });

	   $('[name="is_limited_time_offer"]').click(function() {
	      if (document.getElementById('limited_time_offer').checked) {
	         // if ($('[name="is_limited_time_offer"]').is(':checked')){
	         //if($('[value="others"]').checked){
	         $('.limited_offer_div').show(500);
	      } else {
	         $('.limited_offer_div').hide(300);
	      }
	   });

	   var bdtdc_limited_lime_offers_id = $('[name="bdtdc_limited_time_offers_id"]').val();
	   // alert (bdtdc_limited_lime_offers_id);
	   if (bdtdc_limited_lime_offers_id == '' || bdtdc_limited_lime_offers_id == null) {
	      // alert ('null');
	   } else {
	      // alert (bdtdc_limited_lime_offers_id);
	      $('#limited_time_offer').click();
	   }

	   var country_value = "<?php if(count($product_price) > 0){echo $product_price[0]->currency;}else{echo '';} ?>";
	   if ($.trim(country_value) == '' || country_value == null) {

	   } else {
	      var opt = $("option[value=" + country_value + "]"),
	         html = $("<div>").append(opt.clone()).html();
	      html = html.replace(/\>/, ' selected="selected">');
	      opt.replaceWith(html);
	   }

	   /************** JQueryUI Datepicker ***************/
	   $("#dpd1").datepicker({
	      altField: "#actualDate",
	      altFormat: '@',
	      dateFormat: "yy-mm-dd",
	      timeFormat: "hh:mm:ss",
	      defaultDate: "+1w",
	      changeMonth: true,
	      changeYear: true,
	      onClose: function(selectedDate) {
	         $("#dpd2").datepicker("option", "minDate", selectedDate);
	      }
	   });
	   $("#dpd2").datepicker({
	      altField: "#actualDate",
	      altFormat: '@',
	      dateFormat: "yy-mm-dd",
	      timeFormat: "hh:mm:ss",
	      defaultDate: "+1w",
	      changeMonth: true,
	      changeYear: true,
	      onClose: function(selectedDate) {
	         $("#dpd1").datepicker("option", "maxDate", selectedDate);
	      }
	   });
	   //    $('#dpd1').datetimepicker({
	   // 	timeFormat: "hh:mm tt"
	   // });
	   // $('#dpd2').datetimepicker({
	   // 	timeFormat: "hh:mm tt"
	   // });




	})()
</script>

@stop

