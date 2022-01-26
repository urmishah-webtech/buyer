<?php $__env->startSection('title', 'List Users'); ?>

<?php $__env->startSection('content'); ?>
<style>
table.removecheckbox div.checker input,table.removecheckbox input[type="search"],table.removecheckbox input[type="search"]:active {
    -moz-appearance: auto;
    -webkit-appearance: auto;
    opacity:1;
}
</style>

<!-- BEGIN PAGE CONTENT-->
<!-- ---LOADING ANIMATION TRIGERED TO THIS LOADER CLASS;----- -->
<div class="mkn_loader" style="position: fixed;left:0px;top: 0px;width: 100%;height:100%;z-index: 99999999;background: url(/uploads/page-loader.gif) 50% 50% no-repeat rgb(249,249,249);background-size: 45px;"></div>
<?php if($manage_inquiry_password_recheck == true): ?>
<div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box grey-cascade">
                            <div class="portlet-title" style="background-color:#082154;color:white;">
                                <div class="caption">
                                    <i class="fa fa-globe"></i>Managed Table
                                </div>
<!--                                <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config">
                                    </a>
                                    <a href="javascript:;" class="reload">
                                    </a>
                                    <a href="javascript:;" class="remove">
                                    </a>
                                </div>-->
                                <a href="<?php echo e(URL('admin/dashboard/Menu')); ?>" class="btn green-haze btn-circle pull-right" style="margin-right:50px;margin-top: 5px;"><i class="fa fa-backward"></i> Back</a>
                            </div>
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="btn-group">
                                                <button id="sample_editable_1_new" class="btn green" data-toggle="modal" data-target="#inq_home_create_modal" >
                                                Add New <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="btn-group">
                                                <button id="sample_editable_1_new" class="btn red delete_all">
                                                Delete <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="btn-group pull-right">
                                                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="javascript:;" class ="printData">
                                                        Print </a>
                                                    </li>
                                                    <li>
                                                       <a href="javascript:;" id="pdfData">
                                                        Save as PDF </a>
                                                        
                                                       
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" id="exportData">
                                                        Export to Excel </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(Session::has('success')): ?>
                                        <div style="margin-top: 10px;" class="alert alert-success alert-dismissable fade in" style="width:400px;" id ="successMessage">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <?php echo e(Session::get('success')); ?>

                                        </div>
                                    <?php endif; ?>
                                    <?php if(Session::has('error')): ?>
                                        <div style="margin-top: 10px;" class="alert alert-danger alert-dismissable fade in" style="width:400px;"  id ="errorMessage">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <?php echo e(Session::get('error')); ?>

                                        </div>
                                    <?php endif; ?>
                                    <?php if(count($errors) > 0): ?>
                                        <div style="margin-top: 10px;" class="alert alert-danger alert-dismissable fade in" style="width:400px;"  id ="errorsMessage">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <ul>
                                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($error); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                    <div style="margin-top:35px;padding:5px;">
                                        <div class="row">
                                            <input type="hidden" name="search_str" value="<?php echo e($search_str); ?>">
                                            <input type="hidden" name="search_inq_type" value="<?php echo e($search_inq_type); ?>">
                                            <input type="hidden" name="search_sender" value="<?php echo e($search_sender); ?>">
                                            <input type="hidden" name="search_receiver" value="<?php echo e($search_receiver); ?>">
                                            <input type="hidden" name="search_status" value="<?php echo e($search_status); ?>">
                                            <div class="col-md-6 text-left">
                                                <input type="text" name="search" placeholder="Product Name/Title">  
                                                <button id="search_submit" class="btn btn-xs green">
                                                        Search
                                                </button>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <select name="inquiry_type" id="inquiry_type">
                                                    <option value="all">All Inquiry</option>
                                                    <option value="quotation">Quotation</option>
                                                    <option value="inquiry-single">Inquiry (Single)</option>
                                                    <option value="inquiry-multiple">Inquiry (Multiple)</option>
                                                    <option value="inquiry-both">Inquiry (Both)</option>
                                                </select> 
                                                <select name="sender" id="sender">
                                                    <option value="all">All Sender</option>
                                                    <?php if($user): ?>
                                                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option title="<?php echo e(trim($u->first_name)); ?> <?php echo e(trim($u->last_name)); ?>" value="<?php echo e($u->id); ?>"><?php echo e(substr(trim($u->first_name),0,10)); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select> 
                                                <select name="receiver" id="receiver">
                                                    <option value="all">All Receiver</option>
                                                    <?php if($user): ?>
                                                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option title="<?php echo e(trim($u->first_name)); ?> <?php echo e(trim($u->last_name)); ?>" value="<?php echo e($u->id); ?>"><?php echo e(substr(trim($u->first_name),0,10)); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select> 
                                                <select name="status" id="status">
                                                    <option value="0">All Status</option>
                                                    <option value="1">Pending</option>
                                                    <option value="2">Approved</option>
                                                    <option value="3">Rejected</option>
                                                    <option value="4">Completed</option>
                                                    <option value="5">Closed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding:5px;margin-top: 35px;">
                                        <div class="row" >
                                            <div class="col-md-4 text-left">
                                                View <?php if(isset($inquiry)): ?>
                                                <strong><?php echo $inquiry->count(); ?></strong> <?php else: ?>
                                                <strong>0</strong> <?php endif; ?> Supplier(s) below
                                            </div>
                                            <div class="col-md-4 text-center">
                                                Total <?php if(isset($inquiry)): ?>
                                                <strong><?php echo e($inquiry->total()); ?></strong> <?php else: ?>
                                                <strong>0</strong> <?php endif; ?> Result(s) found
                                            </div>
                                            <div class="col-md-4 text-right">
                                                Page No <?php if(isset($inquiry)): ?>
                                                <strong><?php echo e($inquiry->currentPage()); ?></strong> <?php if($inquiry->lastPage() >0 ): ?>
                                                of <strong><?php echo e($inquiry->lastPage()); ?></strong> 
                                                <?php endif; ?> | 
                                                <a href="<?php echo e($inquiry->previousPageUrl()); ?>">prev</a> | 
                                                <a href="<?php echo e($inquiry->nextPageUrl()); ?>">next</a>
                                                <?php else: ?>
                                                <strong>0</strong>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive" id="customers">
                                    <table id="example" class="table table-striped table-bordered table-hover th-bg removecheckbox" cellspacing="0" cellpadding="0">
                                        <thead>
                                
                                            <tr>
                                                <th>
                                                    <label><input type="checkbox" name="check_all" id="selectAll"></label>
                                                </th>
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    Inquiry/Product Title
                                                </th>
                                                <th>
                                                    Type
                                                </th>
                                                <th>
                                                    Sender
                                                </th>
                                                <th>
                                                    Receiver
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>
                                                    Active
                                                </th>
                                                <th>
                                                    Home Inquiry
                                                </th>
                                                <th>
                                                    Date
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($inquiry): ?>
                                                <?php $__currentLoopData = $inquiry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <?php
                                                        $product_name_title = 'No title found';
                                                        $product_image_url = 'uploads/no_image.jpg';
                                                        if($i->is_join_quotation == 1){
                                                            $product_name_title = 'join';
                                                        }else{
                                                            if($i->inq_products_description){
                                                                $product_name_title = $i->inq_products_description->name;
                                                            }else if($i->inquery_title){
                                                                $product_name_title = $i->inquery_title;
                                                            }
                                                        }
                                                        
                                                        if($i->inq_products_images){
                                                            $product_image_url = $i->inq_products_images->image;
                                                        }else if($i->inq_docs_one){
                                                            $product_image_url = 'public/buying-request-docs/'.$i->inq_docs_one->docs;
                                                        }
                                                    ?>

                                                    <tr class="">
                                                        <td class="check_single_td">
                                                            <label><input type="checkbox" name="check_single" class="sub_chk" data-id="<?php echo e($i->id); ?>"></label>
                                                        </td>
                                                        <td class="id_td">
                                                            <?php echo e($i->id); ?>

                                                        </td>
                                                        <td class="inquiry_title_td">
                                                            <?php if($product_name_title == 'join'): ?>
                                                            <a title="<?php echo e($i->inquery_title); ?>" target="_blank" href="<?php echo e(URL::to('product-sourcing/view',$i->id)); ?>"><?php echo e(substr($i->inquery_title,0,90)); ?>.</a>
                                                            <?php else: ?>
                                                            <a title="<?php echo e($product_name_title); ?>" target="_blank" href="<?php echo e(URL::to('product-sourcing/view',$i->id)); ?>"><?php echo e(substr($product_name_title,0,90)); ?>.</a>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="">
                                                            <?php
                                                            if($i->is_RFQ == 1){
                                                                echo 'Quotation';
                                                            }else if($i->is_join_quotation == 0){
                                                                echo 'Inquiry (Single)';
                                                            }else if($i->is_join_quotation == 1){
                                                                echo 'Inquiry (Multiple)';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="sender_td">
                                                            <?php if($i->inq_sender_user): ?>
                                                                <?php if($i->sender_company): ?>
                                                                    <?php if($i->sender_company->name_string): ?>
                                                                        <a target="_blank" href="<?php echo e(URL::to('contact/'.$i->sender_company->name_string->name,$i->sender_company->id)); ?>"><?php echo e($i->inq_sender_user->first_name); ?> <?php echo e($i->inq_sender_user->last_name); ?></a>
                                                                    <?php else: ?>
                                                                        <a target="_blank" href="<?php echo e(URL::to('contact/'.'company-name-not-available',$i->sender_company->id)); ?>"><?php echo e($i->inq_sender_user->first_name); ?> <?php echo e($i->inq_sender_user->last_name); ?> (company description not available >> cid:<?php echo e($i->sender_company->id); ?>)</a>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <a target="_blank" href="#"><?php echo e($i->inq_sender_user->first_name); ?> <?php echo e($i->inq_sender_user->last_name); ?> (uid:<?php echo e($i->inq_sender_user->id); ?>) (company not available)</a>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                Not Available
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="product_owner_td">
                                                            <?php if($i->product_owner_user): ?>
                                                                <?php if($i->product_owner_company): ?>
                                                                    <?php if($i->product_owner_company->name_string): ?>
                                                                        <a target="_blank" href="<?php echo e(URL::to('contact/'.$i->product_owner_company->name_string->name,$i->product_owner_company->id)); ?>"><?php echo e($i->product_owner_user->first_name); ?> <?php echo e($i->product_owner_user->last_name); ?></a>
                                                                    <?php else: ?>
                                                                        <a target="_blank" href="<?php echo e(URL::to('contact/'.'company-name-not-available',$i->product_owner_company->id)); ?>"><?php echo e($i->product_owner_user->first_name); ?> <?php echo e($i->product_owner_user->last_name); ?> (uid:<?php echo e($i->product_owner_user->id); ?>) (company description not available >> cid:<?php echo e($i->product_owner_company->id); ?>)</a>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <a target="_blank" href="#"><?php echo e($i->product_owner_user->first_name); ?> <?php echo e($i->product_owner_user->last_name); ?> (uid:<?php echo e($i->product_owner_user->id); ?>) (company not available)</a>
                                                                <?php endif; ?>
                                                                
                                                            <?php else: ?>
                                                                Not Available
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="status_td">
                                                            <?php
                                                            if($i->status == 1){
                                                                echo 'Pending';
                                                            }else if($i->status == 2){
                                                                echo 'Approved';
                                                            }else if($i->status == 3){
                                                                echo 'Rejected';
                                                            }else if($i->status == 4){
                                                                echo 'Completed';
                                                            }else if($i->status == 5){
                                                                echo 'Closed';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php if($i->active == 1): ?>
                                                                <input type="checkbox" title="Make Inactive" class="make_active" data-inqid="<?php echo e($i->id); ?>" name="make_active" checked />
                                                                <?php else: ?>
                                                                <input type="checkbox" title="Make Active" class="make_active" data-inqid="<?php echo e($i->id); ?>" name="make_active" />
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if($i->home_inquiry): ?>
                                                                <button class="btn btn-xs btn-info inq_home_update" data-toggle="modal" data-target="#inq_home_update_modal" data-inqid="<?php echo e($i->id); ?>" data-img="<?php echo e($i->home_inquiry->images); ?>" data-showimg="<?php echo e($i->home_inquiry->show); ?>" data-inqsort="<?php echo e($i->home_inquiry->sort); ?>" style="margin-bottom: 10%;">Update</button>
                                                            <?php else: ?>
                                                                <button class="btn btn-xs btn-success inq_home_create" data-toggle="modal" data-target="#inq_home_create_modal" data-inqid="<?php echo e($i->id); ?>" style="margin-bottom: 10%;">Create</button>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo e(date('d/m/Y', strtotime($i->created_at))); ?>

                                                        </td>
                                                        <td  style="white-space: nowrap;">
                                                            <button class="btn btn-xs btn-success inq_details" data-toggle="modal" data-target="#message_view_modal" data-inqid="<?php echo e($i->id); ?>" style="margin-bottom: 10%;">Details</button> 
                                                            <a href="<?php echo e(URL::to('admin/edit-inquiry',$i->id)); ?>" class="btn btn-xs btn-info flip edit_panel" style="margin-bottom: 10%;background-color: #428BCA;">Edit</a>
                                                            <a class="btn btn-xs btn-info panel done_panel" style="background-color: #428BCA;margin-bottom: 10%;display:none;" edit_id="" update_id="<?php echo $i->id;?>">Done</a><br>
                                                            <a class="btn btn-xs btn-info panel cancel_panel" style="background-color: #428BCA;display:none;">Cancel</a>
                                                            <button class="btn btn-xs btn-danger inq_delete" data-delete-id="<?php echo e($i->id); ?>" style="margin-bottom: 10%;">Delete</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <?php echo $inquiry->render(); ?>

                                </div>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>

<!-- Modal -->
  <div class="modal fade" id="message_view_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#45B6AF;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center"><b>Inquiry Details</b></h4>
        </div>
        <div class="modal-body replace_details" style="min-height: 100px;">

        <div class="loader" style="position:fixed;background: url(/uploads/page-loader.gif) 50% 50% no-repeat;z-index:999;width:100%;height:59px;background-size:41px;"></div>

          <div class="row">
              <div class="col-md-6">
                    <h5 class="text-center">Inquiry/Product Title:</h5>
                    <p class="text-left"><a href="#">new product</a></p>
              </div>
              <div class="col-md-6">
                    <h5 class="text-center">Inquiry/Product Source:</h5>
                    <p class="text-right"><a href="#">new product</a></p>
              </div>
          </div>
          <hr />
          <div class="row">
              <div class="col-md-6 text-left" style="border-right: 1px solid #eee;">
                  <h5>Inquiry Product Owner Info:</h5>
                  <p><a href="#">Zong Jhu</a></p>
                  <p><a href="#">Zong Jhu Company</a></p>
              </div>
              <div class="col-md-6 text-right">
                  <h5>Inquiry Sender Info:</h5>
                  <p><a href="#">Lu Ican</a></p>
                  <p><a href="#">Lu Ican Company/Only Buyer Profile</a></p>
              </div>
          </div>
          <hr />
          <div>
              <h5 class="text-center">Message:</h5>
              <div>new message</div>
          </div>
          <hr />
          <div>
              <h5 class="text-center">Inquiry/Product Images:</h5>
              <div>
                    <a href="http://absolutelybest.bdtdc.com/bdtdc-product-image/Agriculture%20&%20Food/Seafood/product_photo_6_83_0eX9zOdzTz.jpg" target="_blank"><img src="http://absolutelybest.bdtdc.com/bdtdc-product-image/Agriculture%20&%20Food/Seafood/product_photo_6_83_0eX9zOdzTz.jpg" height="100" width="100" alt=""></a> 
                    <a href="http://absolutelybest.bdtdc.com/bdtdc-product-image/Agriculture%20&%20Food/Seafood/product_photo_6_83_0eX9zOdzTz.jpg" target="_blank"><img src="http://absolutelybest.bdtdc.com/bdtdc-product-image/Agriculture%20&%20Food/Seafood/product_photo_6_83_0eX9zOdzTz.jpg" height="100" width="100" alt=""></a> 
                    <a href="http://absolutelybest.bdtdc.com/bdtdc-product-image/Agriculture%20&%20Food/Seafood/product_photo_6_83_0eX9zOdzTz.jpg" target="_blank"><img src="http://absolutelybest.bdtdc.com/bdtdc-product-image/Agriculture%20&%20Food/Seafood/product_photo_6_83_0eX9zOdzTz.jpg" height="100" width="100" alt=""></a> 
              </div>
          </div>
          <hr />
          <div class="row">
              <div class="col-md-6 text-left" style="border-right: 1px solid #eee;">
                  <h5>Destination Port:</h5>
                  <p>Hili</p>
              </div>
              <div class="col-md-6 text-right">
                  <h5>Payment Term:</h5>
                  <p>Paypal</p>
              </div>
          </div>
          <hr />
          <div class="row">
              <div class="col-md-4 text-left" style="border-right: 1px solid #eee;">
                  <h5>Quantity:</h5>
                  <p>10</p>
              </div>
              <div class="col-md-4 text-center" style="border-right: 1px solid #eee;">
                  <h5>Asking Unit Price:</h5>
                  <p>USD 1250.00 / pieces</p>
              </div>
              <div class="col-md-4 text-right">
                  <h5>Payment Type:</h5>
                  <p>FOB</p>
              </div>
          </div>
          
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="inq_home_create_modal" role="dialog">
    <div class="modal-dialog">
    
    <?php echo Form::open(['url'=>'admin/make-home-inquiry','files'=>true]); ?>

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#45B6AF;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center"><b>Make Home Inquiry</b></h4>
        </div>
        <div class="modal-body" style="min-height: 100px;">

        <!-- <div class="loader" style="position:fixed;background: url(/uploads/page-loader.gif) 50% 50% no-repeat;z-index:999;width:100%;height:59px;background-size:41px;"></div> -->

            <div class="row">
                <div class="col-md-7">
                    <input type="hidden" id="inquiry_id_create" name="inquiry_id" value="0">
                    <?php echo Form::label('images', 'Choose Your Home Inquiry Image', array('class' => 'control-label')); ?> : 
                    
                    <br>

                    <label>Show this image? <input type="checkbox" name="show_image"></label>
                    
                    <br>
                    <?php echo Form::label('sort', 'Sort', array('class' => 'control-label')); ?> : 
                    <?php echo Form::selectRange('sort', 0, 30); ?>

                </div>
                <div class="col-md-5">
                    <h5 class="text-center"><b>Image Preview</b></h5>
                    <div class="text-center">
                        <img class="product_preview" style="width:100px;height:100px;" src="http://apps.bditdc.com/uploads/no_image.jpg">
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <?php echo Form::submit('Submit',array('class'=>'btn btn-success')); ?>

          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
      <?php echo Form::close(); ?>

    </div>
  </div>

  <div class="modal fade" id="inq_home_update_modal" role="dialog">
    <div class="modal-dialog">
    
    <?php echo Form::open(['url'=>'admin/make-home-inquiry','files'=>true]); ?>

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#45B6AF;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center"><b>Update Home Inquiry</b></h4>
        </div>
        <div class="modal-body" style="min-height: 100px;">

        <!-- <div class="loader" style="position:fixed;background: url(/uploads/page-loader.gif) 50% 50% no-repeat;z-index:999;width:100%;height:59px;background-size:41px;"></div> -->

            <div class="row">
                <div class="col-md-7">
                    <input type="hidden" id="inquiry_id_update" name="inquiry_id" value="0">
                    <label>Choose Your Home Inquiry Image : 
                    <input type="file" name="images" id="update_image">
                    </label>
                    
                    <br>

                    <label>Show this image? : <input type="checkbox" id="update_show_image" name="show_image"></label>
                    
                    <br>

                    <label>Sort : 
                        <select name="sort" id="update_sort">
                            <?php
                            for ($i=0; $i < 31; $i++) { 
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                    </label>
                    
                </div>
                <div class="col-md-5">
                    <h5 class="text-center"><b>Image Preview</b></h5>
                    <div class="text-center">
                        <img id="product_preview_update" style="width:100px;height:100px;" src="http://apps.bditdc.com/uploads/no_image.jpg">
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <?php echo Form::submit('Submit',array('class'=>'btn btn-success')); ?>

          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
      <?php echo Form::close(); ?>

    </div>
  </div>

<?php else: ?>
                        <?php if(Session::has('success')): ?>
                            <div style="margin-top:10px;width:400px;" class="alert alert-success alert-dismissable fade in" id ="successMessage">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo e(Session::get('success')); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(Session::has('error')): ?>
                            <div style="margin-top:10px;width:400px;" class="alert alert-danger alert-dismissable fade in" id ="errorMessage">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo e(Session::get('error')); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(count($errors) > 0): ?>
                            <div style="margin-top:10px;width:400px;" class="alert alert-danger alert-dismissable fade in" id ="errorsMessage">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo e(Session::get('errors')); ?>

                            </div>
                        <?php endif; ?>

                    <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box grey-cascade">
                            <div class="portlet-title" style="background-color:#082154;color:white;">
                                <div class="caption">
                                    <i class="fa fa-globe"></i>Please Verify Your Password
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config">
                                    </a>
                                    <a href="javascript:;" class="reload">
                                    </a>
                                    <a href="javascript:;" class="remove">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                               <!--<p>Please Verify Your Password</p>-->
                            <form class="form-inline" method="POST">
                                <?php echo csrf_field(); ?>

                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" name="password" id="password"> 
                                </div> 
                                <button type="submit" class="btn green-haze passwordsubmit">Submit</button>
                                <br>
                                <div class="form-group">
                                    <label style="visibility: hidden;">Password:</label>
                                    <span style="color:red;"><?php echo e($errors->first('password')); ?></span>
                                    <span style="color:red;"><?php echo e($errors->first('invalid')); ?></span>
                                </div> 
                            </form>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>



<!--<div>
<p>Please Verify Your Password</p>
<form class="form-inline" method="POST">
<?php echo csrf_field(); ?>

  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password" id="password"> 
  </div> 
  <button type="submit" class="btn green-haze">Submit</button>
  <br>
  <div class="form-group">
    <label style="visibility: hidden;">Password:</label>
    <span style="color:red;"><?php echo e($errors->first('password')); ?></span>
    <span style="color:red;"><?php echo e($errors->first('invalid')); ?></span>
  </div> 
</form>
</div>-->
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script>

$(document).ready(function(){
    //print the table
    $('.printData').on('click', function(e) {
        var print_ = document.getElementById("example");
        win = window.open("");
        win.document.write(print_.outerHTML);
        win.print();
        win.close();
    });
    //save as pdf
     $("body").on("click", "#pdfData", function () {
        var print_ = document.getElementById("example");
        win = window.open("");
        win.document.write(print_.outerHTML);
        win.print();
        win.close();
    });
    //save as excel
    $('#exportData').on('click', function(e) {
        var table = document.getElementById("example");
 
        /* Declaring array variable */
        var rows =[];

        //iterate through rows of table
        for(var i=0,row; row = table.rows[i];i++){
            //rows would be accessed using the "row" variable assigned in the for loop
            //Get each cell value/column from the row
            column1 = row.cells[0].innerText;
            column2 = row.cells[1].innerText;
            column3 = row.cells[2].innerText;
            column4 = row.cells[3].innerText;
            column5 = row.cells[4].innerText;
            column6 = row.cells[5].innerText;
            column7 = row.cells[6].innerText;
            column9 = row.cells[9].innerText;

        /* add a new records in the array */
            rows.push(
                [
                    //column1,
                    column2,
                    column3,
                    column4,
                    column5,
                    column6,
                    column7,
                    column9
                ]
            );

        }
        csvContent = "data:text/csv;charset=utf-8,";
      /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
        rows.forEach(function(rowArray){
            row = rowArray.join(",");
            csvContent += row + "\r\n";
        });

        /* create a hidden <a> DOM node and set its download attribute */
        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "Manage-Inquiry.csv");
        document.body.appendChild(link);
        /* download the data file named "Stock_Price_Report.csv" */
        link.click();     
    });
    $('body').on('click', '#selectAll', function () {
        if ($(this).hasClass('allChecked')) {
            $('input[class="sub_chk"]', '#example').prop('checked', false);
        }else{
            $('input[class="sub_chk"]', '#example').prop('checked', true);
        }
        $(this).toggleClass('allChecked');
    })
    //Delete all Concept
    $('.delete_all').on('click', function(e) {
        var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            }); 
            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  else {  
                var check = confirm("Are you sure you want to delete this row?");
                if(check == true){
                    var join_selected_values = allVals.join(","); 
                    var DeleteURL = base_url+'/admin/delete-allinquiry';
                    $.ajax({
                        url: DeleteURL,
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) { 
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                 alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });
                    $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });
                }
            }
    });


    $('.mkn_loader').css('display','none');

    var base_url = '<?php echo url('/'); ?>';

    $('[name="search"]').val($('[name="search_str"]').val());
    $('#inquiry_type').val($('[name="search_inq_type"]').val());
    $('#sender').val($('[name="search_sender"]').val());
    $('#receiver').val($('[name="search_receiver"]').val());
    $('#status').val($('[name="search_status"]').val());

    function search_action(){
        var search_str = $('[name="search_str"]').val();
        var search_inq_type = $('[name="search_inq_type"]').val();
        var search_sender = $('[name="search_sender"]').val();
        var search_receiver = $('[name="search_receiver"]').val();
        var search_status = $('[name="search_status"]').val();
        var url = base_url+'/admin/manage-inquiry?search='+search_str+'&type='+search_inq_type+'&sender='+search_sender+'&receiver='+search_receiver+'&status='+search_status;
        window.location.href = url;
    }
    $('.passwordsubmit').on({click:function(){
        if(!$('#password').val()){
            alert('Please enter the Admin Password');
        }
    }});

    $(document).on({change:function(){
        var search_inq_type = $(this).val();
        $('[name="search_inq_type"]').val(search_inq_type);
        search_action();
    }},'#inquiry_type');

    $(document).on({change:function(){
        var search_sender = $(this).val();
        $('[name="search_sender"]').val(search_sender);
        search_action();
    }},'#sender');

    $(document).on({change:function(){
        var search_receiver = $(this).val();
        $('[name="search_receiver"]').val(search_receiver);
        search_action();
    }},'#receiver');

    $(document).on({change:function(){
        var search_status = $(this).val();
        $('[name="search_status"]').val(search_status);
        search_action();
    }},'#status');

    $(document).on({click:function(){
        var inquiry_id = $(this).attr('data-inqid');
        $('#inquiry_id_create').val(inquiry_id);
    }},'.inq_home_create');

    $(document).on({click:function(){
        var inquiry_id = $(this).attr('data-inqid');
        $('#inquiry_id_update').val(inquiry_id);
        $('#update_sort').val($(this).attr('data-inqsort'));
        var img_available = $(this).attr('data-img');
        if($.trim(img_available) != ''){
            $('#product_preview_update').attr('src',window.location.origin+'/bdtdc-product-image/home-page/'+img_available);
        }else{
            $('#product_preview_update').attr('src',window.location.origin+'/uploads/no_image.jpg');
        }
        var show_image = $(this).attr('data-showimg');
        if(parseInt(show_image) == 1){
            $('#update_show_image').parent('span').addClass('checked');
        }else{
            $('#update_show_image').parent('span').removeClass('checked');
        }
    }},'.inq_home_update');

    $(document).on({click:function(){
        if(confirm('Are You Sure, You want to delete')){
            $('.mkn_loader').css('display','block');
            var deleted_id = $(this).attr('data-delete-id');
            var _this = $(this);
            $.post(base_url+'/admin/delete-inquiry/'+deleted_id,{
                _token:'<?php echo e(csrf_token()); ?>',
                deleted_id:deleted_id,
            },function(result){
                if(parseInt(result) == 1){
                    alert('Inquiry Deleted successfully');
                    _this.parent().parent().remove();
                    $('.mkn_loader').css('display','none');
                }else if(parseInt(result) == 2){
                    alert ('Please Login first');
                    $('.mkn_loader').css('display','none');
                }else{
                    alert ('Unkonwn Error Occured.');
                    $('.mkn_loader').css('display','none');
                }
            });
        }
    }},'.inq_delete');

    $(document).on({
        keyup: function() {

            $(this).autocomplete({
                source: "<?php echo url('/') ?>/product_suggesion/" + $(this).val()+"/"+"all",
                select: function(event, ui) {

                },
                html: true,
                open: function(event, ui) {
                    $('.ui-autocomplete').css('z-index', '9999');
                }
            });
        }
    }, '[name="product_name"]');

    $(document).on({click:function(){
        var _this = $(this);
        var s_value = 0;
        var update_id = $(this).attr('data-inqid');
        $('.mkn_loader').css('display','block');
        if($(this).is(':checked')){
            s_value = 1;
        }
        else{
            s_value = 0;
        }
        $.post(base_url+'/admin/edit-inquiry-active/'+update_id+'/'+s_value,{
                _token:'<?php echo e(csrf_token()); ?>',
                update_id:update_id,
                s_value:s_value,
            },function(result){
                if(parseInt(result) == 1){
                    $('.mkn_loader').css('display','none');
                }else if(parseInt(result) == 2){
                    alert ('Please Login first');
                    $('.mkn_loader').css('display','none');
                }else{
                    alert ('Unkonwn Error Occured.');
                    $('.mkn_loader').css('display','none');
                }
        });
    }},'.make_active');

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.product_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#images").change(function(){
        readURL(this);
    });

    function readUpdateURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#product_preview_update').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#update_image").change(function(){
        readUpdateURL(this);
    });

    $(document).on({click:function(){
        var search_str = $.trim($('[name="search"]').val());
        $('[name="search_str"]').val(search_str);
        search_action();
    }},'#search_submit');

    $('[name="search"]').keypress(function (e) {
        var key = e.which;
        if(key == 13)  // the enter key code
        {
            $('#search_submit').click();
            return false;  
        }
    });

    $(document).on({click:function(){
        $('.replace_details').html('<div class="loader" style="position:fixed;background: url(/uploads/page-loader.gif) 50% 50% no-repeat;z-index:999;width:100%;height:59px;background-size:41px;"></div>');
        var inq_id = $(this).attr('data-inqid');
        var url = base_url+'/admin/inquiry-details/'+inq_id;
        $.get(url,{'_token':'<?php echo e(csrf_token()); ?>'},function(result){
            $('.replace_details').html(result);
        });
    }},'.inq_details');


});
/****** SUBMIT QUOTATION FORM*******/
$(document).on({submit:function(e){
    e.preventDefault();
    var url,form_data;
    $('#ajax_status').removeClass('hide_this');
    url= $(this).attr('action');
    $.post(url,$(this).serialize(),function(r){
        $('.modal-header a').click();
        // if(r==1){
            //$('#message_view_modal').modal('hide');
            $('#message_view_modal').hide();
            alert ('Message Sent Successfully');
            location.reload();
        // }else{
        //     alert ('Error Sending Message');
        // }
    });
}}, '.conversation_form');

$(document).on({click:function(e){
    e.preventDefault();
   
    if($.trim($('[name="quantity"]').val()) == ''){
        $('[name="quantity"]').focus();
        $('[name="quantity"]').css('box-shadow','0px 0px 3px 1px red');
    }else if($.trim($('[name="unit_price"]').val()) == ''){
        $('[name="quantity"]').css('box-shadow','');
        $('[name="unit_price"]').focus();
        $('[name="unit_price"]').css('box-shadow','0px 0px 3px 1px red');
    }else{
        $('[name="quantity"]').css('box-shadow','');
        $('[name="unit_price"]').css('box-shadow','');
        $('[name="message"]').css('box-shadow','');
        $('.conversation_form').submit();
    }
}},'.submit_single_msg');




$(document).on({click:function(e){
    e.preventDefault();
    var text_mess = $.trim($(this).parent().children('textarea').val());
    var form_class = $(this).attr('formclass');
    var url = $('.'+form_class).attr('action');
    if(text_mess == ''){
        alert ('Please write your message first');
    }else{
        $.post(url,$('.'+form_class).serialize(),function(r){
            $('.modal-header a').click();
            if(r==1){
                $('#message_view_modal').modal('hide');
                alert ('Message Sent Successfully');
            }else{
                alert ('Error Sending Message');
            }
        });
    }
    
}},'.this_product_quotation_btn');
setTimeout(function() {
        $('#successMessage').fadeOut('fast');
}, 3000); 

setTimeout(function() {
        $('#errorMessage').fadeOut('fast');
}, 3000); 

setTimeout(function() {
    $('#errorsMessage').fadeOut('fast');
}, 3000); 
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('protected.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>