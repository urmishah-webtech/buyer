@extends('protected.admin.master')

@section('title', 'Admin Dashboard')
<style>
    .form-control {
      margin-bottom: 30px;
   }
</style>
@section('content')
<!--    <h3 class="page-title">
        Content Description Edit 
    </h3>-->
    <!-- <div class="portlet box grey-cascade">
        <div class="portlet-title" style="background-color:#082154;color:white;">
            <div class="caption">
                <i class="fa fa-globe"></i>Edit Content Description 
            </div>
        </div>
    </div> -->
    @if (session()->has('flash_message'))
            <div class="alert alert-success">
                <p style="color:white;">{{ session()->get('flash_message') }}</p>
            </div>
    @endif
    <div class="page-bar page-top-bar" >
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home" style="color:black;"></i>
                <a href="{{URL::route('admin_dashboard')}}" >Home</a>
                <i class="fa fa-angle-right" style="color:black;"></i>
            </li>
           <li>
                <a href="{{URL('admin/dashboard/Content Management')}}">Content Management</a>
                 <i class="fa fa-angle-right" style="color:black;"></i>
            </li>
            <li>
               Content Description Edit
            </li>
        </ul>
        <div class="page-toolbar">
            {{-- <div class="btn-group pull-right">
                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    Actions <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">Action</a>
                    </li>
                    <li>
                        <a href="#">Another action</a>
                    </li>
                    <li>
                        <a href="#">Something else here</a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="#">Separated link</a>
                    </li>
                </ul>
            </div> --}}
            <a href="{{URL('admin/description-manage')}}" class="btn green-haze btn-circle pull-right back-btn"><i class="fa fa-backward"></i> Back</a>
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(array('route'=>array('admin.description-update', $description[0]->id),'id'=>'form1','class'=>'form-horizontal  form-row-seperated','files'=>true)) !!}
            @csrf
            <div class="portlet-title">
                <div class="caption">
					Edit Content Description
                </div>
                <div class="actions btn-set">
                    
                    <button name="save" value="1" class="btn green-haze btn-circle green-btn"><i class="fa fa-check"></i> Save</button>
                    <button name="save" value="2" class="btn green-haze btn-circle btn-primary"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
                    <a href="{{url('/admin/description-manage')}}" class="btn green-haze btn-circle pull-right yellow-btn"><i class="fa fa-list"></i> View Content Description List</a>
                    {{-- <div class="btn-group">
                        <a class="btn yellow btn-circle" href="javascript:;" data-toggle="dropdown">
                            <i class="fa fa-share"></i> More <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;">
                                    Duplicate </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    Delete </a>
                            </li>
                            <li class="divider">
                            </li>
                            <li>
                                <a href="javascript:;">
                                    Print </a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
            <div class="portlet light">
                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (isset($success))
                                <div class="alert alert-success">
                                    <ul>
                                            <li style="color:black;">{{ $success }}</li>
                                    </ul>
                                </div>
                            @endif
                <div class="portlet-body">
                    <div class="tabbable">
<!--                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_general" data-toggle="tab">
                                    General </a>
                            </li>
                        </ul>-->
                        <div class="tab-content no-space">
                            <div class="tab-pane active" id="tab_general">
                                <div class="page-bar">
                                    <ul class="page-breadcrumb">
                                        <li>
                                            Content Description Information:
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Title: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-9">
                                            <!-- <input type="text" class="form-control" name="desc_name" value="{{ $description[0]->description }}" placeholder="Description Name"> -->
                                            <input id="editor1" class="form-control" name="title_name" value="<?php echo strip_tags(old('title_name', $description[0]->title))  ?>" placeholder="Title Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Description: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-9">
                                            <!-- <input type="text" class="form-control" name="desc_name" value="{{ $description[0]->description }}" placeholder="Description Name"> -->
                                            <textarea id="editor" class="form-control" name="desc_name" value="<?php echo strip_tags($description[0]->description) ?>" placeholder="Description Name"><?php echo strip_tags(old('desc_name',$description[0]->description)) ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Page Category Name: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="page_category_id" id="sel1">
                                                <option value="0">Select any</option>
                                                @foreach($pages as $p)
                                                    @if($description[0]->page_id == $p->id)
                                                        <option value="{{ $p->id }}" {{(Input::old("page_category_id") == $p->id ? "selected":"") }} selected>{{ $p->name }}</option>
                                                    @else
                                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                    @endif
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Content Category Name: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="content_category_id" id="sel1">
                                                <option value="0">Select any</option>
                                                @foreach($contents as $c)
                                                    @if($description[0]->content_category_id == $c->id)
                                                        <option value="{{ $c->id }}" {{(Input::old("content_category_id") == $c->id ? "selected":"") }} selected>{{ $c->name }}</option>
                                                    @else
                                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Meta Key: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="meta_key" value="{{old('meta_key', $description[0]->meta_key) }}" placeholder="Meta Key">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Meta Description: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="meta_description" value="{{old('meta_description', $description[0]->meta_description) }}" placeholder="Meta Key Description">
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>

    <!-- END PAGE CONTENT-->

@stop
@section('scripts')
<script src="{{asset('resources/assets/global/plugins/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            Demo.init(); // init demo features
            EcommerceProductsEdit.init();
        });


/*editor*/
                CKEDITOR.replace('editor',
        {
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

            stylesSet: [
                { name: 'Narrow image', type: 'widget', widget: 'image', attributes: { 'class': 'image-narrow' } },
                { name: 'Wide image', type: 'widget', widget: 'image', attributes: { 'class': 'image-wide' } }
            ],

            // Load the default contents.css file plus customizations for this sample.
            contentsCss: [ CKEDITOR.basePath + 'contents.css', 'assets/css/widgetstyles.css' ],

            // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
            // resizer (because image size is controlled by widget styles or the image takes maximum
            // 100% of the editor width).
            image2_alignClasses: [ 'image-align-left', 'image-align-center', 'image-align-right' ],
            image2_disableResizer: true



        });

        /*editor*/
    </script>

    <!-- END JAVASCRIPTS -->
@stop
