@extends('protected.admin.master')
@section('title', 'List Product')
@section('content')
<style>
   form.navbar-form .form-group {
      margin-bottom: 30px;
   }
</style>
<!-- BEGIN PAGE CONTENT-->
<div class="row">
   <div class="col-md-12">
      <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="portlet box grey-cascade">
         <div class="portlet-title">
            <div class="caption">
               Manage Seller Product
            </div>
            <div class="tools">
               <a href="javascript:;" class="collapse">
               </a>
               <a href="javascript:;" class="remove">
               </a>
            </div>
         </div>
         <div class="portlet-body">
            <!-- <div class="table-toolbar">
               @if ($message = Session::get('success'))
                     <div class="alert alert-success" style="font-color:white">
                        <p>{{ $message }}</p>
                     </div>
               @endif

               <div class="row">
                  <div class="col-md-6">
                     {{-- <div class="btn-group">
                        <button id="sample_editable_1_new" class="btn green">
                           Add New <i class="fa fa-plus"></i>
                        </button>
                     </div> --}}
                  </div>
                  <div class="col-md-6">  
                     {{-- <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                           <li>
                              <a href="javascript:;"> Print </a>
                           </li>
                           <li>
                              <a href="javascript:;"> Save as PDF </a>
                           </li>
                           <li>
                              <a href="javascript:;"> Export to Excel </a>
                           </li>
                        </ul>
                     </div> --}}
                  </div>
               </div>
               <div>
               </div>
            </div> -->
            <table class="table admin-table">
                              <thead>
                                 <tr class="">
                                    <th>Product Name</th>
                                    <th>Model</th>
                                    <th>Brand Name</th>
                                    <th>Category Name</th>
                                    <th>Live Status</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @if($supplier_product)
                                    @foreach($supplier_product as $sp)
                                       <tr class="text-muted">
                                          @if($sp->pro_to_cat_name)
                                             <td class="text-left"> <a title="{{$sp->pro_to_cat_name->name}}" itemprop="url" class="text-muted" target="_blank" href="{!! URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$sp->pro_to_cat_name->name).'='.mt_rand(100000000, 999999999).$sp->product_id) !!}">{{ substr($sp->pro_to_cat_name->name,0,30) }}</a></td>
                                          @else
                                             <td class="text-left"><input type="checkbox" data-product_id ="{{ $sp->product_id }}" class="selected_product" name="selected_product"> <a itemprop="url" class="text-muted" target="_blank" href="{!! URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-','name not available').'='.mt_rand(100000000, 999999999).$sp->product_id) !!}">name not available</a></td>
                                          @endif
                                          @if($sp->bdtdcProduct)
                                             <td>{{ $sp->bdtdcProduct->model }}</td>
                                          @else
                                             <td>not available</td>
                                          @endif
                                          @if($sp->bdtdcProduct)
                                             <td>{{ $sp->bdtdcProduct->brandname }}</td>
                                          @else
                                             <td>not available</td>
                                          @endif
                                          @if($sp->BdtdcCategoryDescription)
                                             <td>{{ $sp->BdtdcCategoryDescription->name }}</td>
                                          @else
                                             <td>not available</td>
                                          @endif
                                          <td>@if($sp->bdtdcProduct)
                                             @if($sp->bdtdcProduct->is_active == 0)
                                                <a title="Make Publish" class="btn btn-danger btn-xs live_status delete-icon-btn" data-product_status ="{{ $sp->bdtdcProduct->is_active }}" data-product_id ="{{ $sp->product_id }}">
                                                   <i class="fa fa-lock fa-lg"></i>
                                                </a>
                                             @elseif($sp->bdtdcProduct->is_active == 1)
                                                <a title="Make Unpublish" class="btn btn-success btn-xs live_status view-icon-btn view-icon-btn" data-product_status ="{{ $sp->bdtdcProduct->is_active }}" data-product_id ="{{ $sp->product_id }}">
                                                   <i class="fa fa-unlock fa-lg"></i>
                                                </a>
                                             @endif
                                             @else
                                                i title="Make Publish" class="fa fa-lock fa-lg btn btn-danger btn-xs"></i>
                                             @endif
                                          </td>
                                          <td>
                                             <div class="table-grp-btn">
                                                <a title="Edit product"  itemprop="url"  href="{{ URL::to('/admin/profiles/sellerproduct_edit',$sp->product_id) }}" class="btn btn-primary btn-xs edit-icon-btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <a onclick="return confirm('Are you sure want to delete the Product?')" title="Delete product"  itemprop="url" href="{{ URL::to('/admin/profiles/sellerproduct_delete',$sp->product_id) }}" class="btn btn-danger btn-xs delete_product delete-icon-btn"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                <!-- <a itemprop="url"  href="#animatedModal" data-url ="{{ URL::to('supplier/product_edit',$sp->id) }}" class="btn btn-primary btn-xs product_edit"><i class="fa fa-pencil-square-o"></i></a> -->
                                                <!-- <a title="Delete product"  itemprop="url" data-product_id ="{{ $sp->product_id }}" class="btn btn-danger btn-xs delete_product"><i class="fa fa-times"></i></a> -->
                                             </div>
                                          </td>
                                       </tr>
                                    @endforeach
                                 @endif
                              </tbody>
                           </table>
                           {!! $supplier_product->render() !!} 
         </div>
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
   </div>
</div>

@stop
@section('script')

@stop