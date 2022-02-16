@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')
<div class="col-xs-12">
   @if (session()->has('flash_message'))
   <p>{{ session()->get('flash_message') }}</p>
   @endif
</div>
<style>
   #selectedFiles img {
      max-width: 100px;
      max-height: 100px;
      float: left;
      margin-bottom:10px;
   }
   .close {
      float:left;
      display:inline-block;
      padding:2px 5px;
      background:#ccc;
   }
   .close:hover {
      float:left;
      display:inline-block;
      padding:2px 5px;
      background:#ccc;
      color:#fff;
   }
</style>

<div class="page-bar page-top-bar">
   <ul class="page-breadcrumb">
      <li>
         <i class="fa fa-home" style="color:black;"></i>
         <a href="{{URL::route('admin_dashboard')}}">Home</a>
         <i class="fa fa-angle-right" style="color:black;"></i>
      </li>

      <li>
         <a href="#">Notice Details</a>
      </li>
   </ul>
   <div class="page-toolbar">
      <a href="{{URL('admin/description-manage')}}" class="btn green-haze btn-circle pull-right back-btn"><i class="fa fa-backward"></i> Back</a>
   </div>
</div>
<div class="portlet-title">
   <div class="caption">
      Notice Details
   </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
   <div class="col-md-12">
      <div class="portlet box grey-cascade">
         <div class="portlet-title justify-content-start">
            <div class="caption">{{ $notice->title }}</div>
         </div>
         <div class="portlet-body">
            <p style="margin: 0px; font-size: 12px;">Notice Type: @if($notice->notice_type == 1) General @elseif($notice->notice_type == 2) User Role | @elseif($notice->notice_type == 3) User | @endif 
            @foreach($notice->notice_details as $rowdata)
               @if($notice->notice_type == 2)
               <span>{{$rowdata->get_user_role_info->name}} | </span>
               @elseif($notice->notice_type == 3)
               <span>{{$rowdata->get_user_info->first_name}} {{$rowdata->get_user_info->last_name}} | </span>
               @endif
            @endforeach
            </p>
            <p style="margin: 0px; font-size: 12px;">Created At: {{ date('d-M-Y',strtotime($notice->created_at)) }}</p>
            <p style="margin-top: 10px;">{{ $notice->details }}</p>
            <embed src="{{ asset('notice_docs/'.$notice->attachment) }}" width="100%" height="500" />
         </div>
      </div>
   </div>
</div>
</div>

<!-- END PAGE CONTENT-->

@stop
@section('scripts')
@stop
