@extends('protected.admin.master')
<!--@section('page_css')
<link property='stylesheet' href="{!! asset('assets/fontend/css/select2.min.css') !!}" rel="stylesheet">
@endsection-->
@section('title', 'Admin Dashboard')
@section('content')

   @if (session()->has('flash_message'))
         <div  id ="successMessage" class="alert alert-success"  style="width:400px;">
                <p style="color:white;">{{ session('flash_message') }}</p>
         </div>
    @endif
    @if (session()->has('error_message'))
         <div  id ="errorMessage" class="alert alert-danger"  style="width:400px;">
                <p style="color:white;">{{ session('error_message') }}</p>
         </div>
    @endif
               <div class="page-bar page-top-bar">
                  <ul class="page-breadcrumb" >
                     <li>
                         <i class="fa fa-home" style="color:black;"></i>
                         <a href="{{URL::route('admin_dashboard')}}" >Home</a>
                         <i class="fa fa-angle-right" style="color:black;"></i>
                     </li>
<!--                      <li>
                           Products
                           <i class="fa fa-angle-right" style="color:black;"></i>
                     </li> -->
                     <li>
                        Manage TradeShow
                     </li>
                  </ul>
                  <div class="page-toolbar">
                     <a href="{{URL('admin/dashboard')}}" class="btn green-haze btn-circle pull-right back-btn"><i class="fa fa-backward"></i> Back</a>
                  </div>
               </div>
                  <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box grey-cascade">
                            <div class="portlet-title justify-content-start">
                                <div class="caption">
                                    Manage TradeShow 
                                </div>
<!--                                <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                   
                                    <a href="javascript:;" class="remove">
                                    </a>
                                </div>-->
                            </div>
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                 <div class="row">
                                    <div class="col-12">
                                        
      <input type="hidden" name="url" value="{{ URL::to('/') }}">
      <form class="navbar-form navbar-left trade_search_form" method="POST" action="{{ URL::to('admin/tradeshow/search',null) }}" role="search">
         {!! csrf_field() !!}
         <div class="form-group">
            {!! Form::text('title',null,['class'=>'form-control text-primary','placeholder'=>'Search By Title']) !!}
         </div>
         <div class="form-group">
            {!! Form::text('venue',null,['class'=>'form-control text-primary','placeholder'=>'Search By Venue']) !!}
         </div>
         <div class="form-group">
            <!-- <div class="dropdown">
               <button class="btn btn-default dropdown-toggle text-primary" type="button" data-toggle="dropdown" style="padding: 8px">--Search By Country--<span class="caret"></span></button>
               <ul class="dropdown-menu text-primary" id="supplier_list">
                  <input type="hidden" name="country_id" value="">

                  @foreach($country as $c)
                  <li><a data-country_id="{{ $c->id }}" class="country_str" href="#">{{ $c->name }}</a></li>
                  @endforeach
               </ul>
            </div> -->
               
               <select class="form-control" name="country_id" style="width:200px;">
                     <option value="">Select Country</option>
                     @foreach($country as $element)
                        <option value="{{$element->id}}">{{ $element['name'] }}</option>
                     @endforeach
               </select>
               <!-- <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle text-primary" type="button" id="dropdownMenu1" data-toggle="dropdown" style="padding: 8px"  aria-haspopup="true" aria-expanded="true">
                     Search By Country
                     <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu text-primary" aria-labelledby="dropdownMenu1" id="supplier_list" name="country_id">
                        <input type="hidden" name="country_id" value="">
                        @foreach($country as $c)
                           <li><a data-country_id="{{ $c->id }}" class="country_str" href="#">{{ $c->name }}</a></li>
                          
                        @endforeach
                  </ul>
               </div> -->
            </div>
         <!--{!! Form::token() !!}-->
         <div class="form-group">
            <input  type="submit" class="btn btn-success pull-right trade_search_btn btn-primary" value="SEARCH" />
         </div>
         <div class="form-group">
               <button type="button" class="btn btn-success resetval green-btn">RESET</button>
         </div>
            <!--<a style="display:none;margin-top: 32px;margin-right: 10px;" href="{{ URL::to('admin/tradeshow-show',null) }}" class="btn btn-success btn-default pull-left show_trade_list">Trade list</a>-->
            <div class="form-group">
            <a href="{{ URL::to('admin/tradeshow-add',null) }}" class="btn btn-success pull-right yellow-btn">Add Trade</a>
            </div>
      </form>
      </div>
   </div>
                                </div>
      <table class="table table-striped table-bordered table-hover th-bg admin-table" id="sample_1">
         <thead>
            <tr>
               <th>Title</th>
               <th>Venue</th>
               <th>Country</th>
               <th>Created Date</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody class="trade_table_body">
            @foreach($pre_trade_data as $data)
            <tr>
               <td>{{ @$data->tradeshow_description->title }}</td>
               <td>{{ $data->venue }}</td>
               <td>{{ $data->country->name }}</td>
               <td>{{ date('d-M-Y',strtotime(@$data->tradeshow_description->created_at)) }}</td>
               <td  style="white-space: nowrap;">
                  <div class="table-grp-btn">
                     <a href="{{ URL::to('admin/tradeshow-edit',$data->id) }}" class="btn btn-xs btn-info edit-icon-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                     <a onclick="confirm('Are you sure, you want to delete the Trade details?')" href="{{ URL::to('admin/tradeshow-delete',$data->id) }}" class="btn btn-xs btn-danger trade_delete delete-icon-btn"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                  </div>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
<!--<div class="row" style="padding:1%">
   <div class="col-xs-11 col-xs-offset-1">
      <input type="hidden" name="url" value="{{ URL::to('/') }}">
      <form class="navbar-form navbar-left trade_search_form" method="POST" action="{{ URL::to('admin/tradeshow/search',null) }}" role="search">
         {!! csrf_field() !!}
         <div class="form-group">
            {!! Form::text('title',null,['class'=>'form-control text-primary','placeholder'=>'Search By Title']) !!}
         </div>
         <div class="form-group">
            {!! Form::text('venue',null,['class'=>'form-control text-primary','placeholder'=>'Search By Venue']) !!}
         </div>
         <div class="form-group">
             <div class="dropdown">
               <button class="btn btn-default dropdown-toggle text-primary" type="button" data-toggle="dropdown" style="padding: 8px">--Search By Country--<span class="caret"></span></button>
               <ul class="dropdown-menu text-primary" id="supplier_list">
                  <input type="hidden" name="country_id" value="">

                  @foreach($country as $c)
                  <li><a data-country_id="{{ $c->id }}" class="country_str" href="#">{{ $c->name }}</a></li>
                  @endforeach
               </ul>
            </div> 
            
               <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle text-primary" type="button" id="dropdownMenu1" data-toggle="dropdown" style="padding: 8px"  aria-haspopup="true" aria-expanded="true">
                     Search By Country
                     <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu text-primary" aria-labelledby="dropdownMenu1" id="supplier_list">
                        <input type="hidden" name="country_id" value="">
                        @foreach($country as $c)
                           <li><a data-country_id="{{ $c->id }}" class="country_str" href="#">{{ $c->name }}</a></li>
                        @endforeach
                  </ul>
               </div>
            </div>
         {!! Form::token() !!}
         <div class="form-group">
            <input  type="submit" class="btn btn-success pull-right trade_search_btn" value="SEARCH" />
         </div>
         <div class="form-group">
               <button type="button" class="btn btn-success resetval">RESET</button>
         </div>
            <a style="display:none;margin-top: 32px;margin-right: 10px;" href="{{ URL::to('admin/tradeshow-show',null) }}" class="btn btn-success btn-default pull-left show_trade_list">Trade list</a>
      </form>
   </div>
</div>

<hr class=".text-danger">

@if (session()->has('flash_message'))
   <p>{{ session()->get('flash_message') }}</p>
@endif
 END PAGE HEADER
 BEGIN PAGE CONTENT
<div class="row">
   <div class="col-md-12">
      <a href="{{ URL::to('admin/tradeshow-add',null) }}" class="btn btn-success pull-right">Add Trade</a>
      <h3>All Available Trade list</h3>
      <table class="table">
         <thead>
            <tr class="test-center">
               <td>Title</td>
               <td>Venue</td>
               <td>Country</td>
               <td>Created Date</td>
               <td>Action</td>
            </tr>
         </thead>
         <tbody class="trade_table_body">
            @foreach($pre_trade_data as $data)
            <tr>
               <td>{{ @$data->tradeshow_description->title }}</td>
               <td>{{ $data->venue }}</td>
               <td>{{ $data->country->name }}</td>
               <td>{{ date('d-M-Y',strtotime(@$data->tradeshow_description->created_at)) }}</td>
               <td>
                  <a href="{{ URL::to('admin/tradeshow-edit',$data->id) }}" class="btn btn-xs btn-info">Edit</a>
                  <a onclick="confirm('Are you sure, you want to delete the Trade details?')" href="{{ URL::to('admin/tradeshow-delete',$data->id) }}" class="btn btn-xs btn-danger trade_delete">Delete</a>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>
</div>-->
<!-- END PAGE CONTENT-->
        
@stop
@section('scripts')
<!--<script type="text/javascript" src="{!! asset('assets/custom.js' )!!}"></script> 
<script type="text/javascript" src="{!! asset('assets/fontend/js/select2.min.js') !!}"></script>-->
<script>
   $('.resetval').click(function(){
      var base_url = '{{URL::to("/")}}';
      window.location.replace(base_url + '/admin/tradeshow-show');

   });
   jQuery(document).ready(function() {
      jQuery("#supplier_list").select2({
         placeholder: "Please select country ",
      });
      Metronic.init(); // init metronic core components
      Layout.init(); // init current layout
      Demo.init(); // init demo features
      /* EcommerceProductsEdit.init();*/
   });

   $(".dropdown-menu li a").click(function(){
      $(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
      $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
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
   setTimeout(function() {
        $('#successMessage').fadeOut('fast');
    }, 3000); 
</script>
<!-- END JAVASCRIPTS -->
@stop
