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

<!-- <h3 class="page-title">
   Notice List
</h3>
<div class="page-bar">
   <ul class="page-breadcrumb">
      <li>
         <i class="fa fa-home"></i>
         <a href="{{URL::route('admin_dashboard')}}">Home</a>
         <i class="fa fa-angle-right"></i>
      </li>
      <li>
         <a href="#">Notice List</a>
      </li>
   </ul>
</div> -->
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="page-bar page-top-bar">
   <ul class="page-breadcrumb">
      <li>
         <i class="fa fa-home" style="color:black;"></i>
         <a href="{{URL::route('admin_dashboard')}}">Home</a>
         <i class="fa fa-angle-right" style="color:black;"></i>
      </li>
      <li>
         <a href="#">Notice List</a>
      </li>
   </ul>
   <div class="page-toolbar">
      <a href="{{URL('admin/description-manage')}}" class="btn green-haze btn-circle pull-right back-btn"><i class="fa fa-backward"></i> Back</a>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="portlet box grey-cascade">
         <div class="portlet-title">
            <div class="caption">
               Notice List
            </div>
            <div class="actions btn-set">
               <!-- <button class="btn green-haze btn-circle" type="submit"><i class="fa fa-check"></i> Save</button> -->
               <a href="{{URL::route('admin.notice_create')}}" class="btn btn-primary">Create Notice</a>
               <!-- <button class="btn green-haze btn-circle"><i class="fa fa-check-circle"></i> Save & Continue Edit</button> -->
            </div>
         </div>
         <div class="portlet-body">
            <table id="example" class="table table-striped table-bordered admin-table">
               <thead>
                  <tr>
                     <th>Sl</th>
                     <th>Title</th>
                     <th>Details</th>
                     <th>Created Time</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @php $i=1; @endphp
                  @foreach($notices as $notice)
                  <tr>
                     <td>{{ $i++ }}</td>
                     <td>{{ $notice->title }}</td>
                     <td>{{ substr($notice->details, 0, 100) }} @if(strlen($notice->details) > 100)... @endif</td>
                     <td>{{ date('d-M-Y',strtotime($notice->created_at)) }} </td>
                     <td>
                        <div class="table-grp-btn">
                           <a href="{{ URL::to('admin/noticeView',$notice->id) }}" class="btn view-icon-btn"><i class="fa fa-eye" aria-hidden="true"></i></a>
                           <a href="{{ URL::to('admin/noticeEdit',$notice->id) }}" class="btn edit-icon-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                           <a href="{{ URL::to('admin/noticeDelete',$notice->id) }}" class="btn delete-icon-btn"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </div>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
         {{ $notices->links() }}
      </div>
   </div>
</div>
</div>

<!-- END PAGE CONTENT-->

@stop
@section('scripts')
<script type="text/javascript">
   $(document).ready(function() {
       $('#example').DataTable();
   } );
</script>
@stop
