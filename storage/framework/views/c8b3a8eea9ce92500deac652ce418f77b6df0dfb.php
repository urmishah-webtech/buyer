<?php $__env->startSection('content'); ?>

      <div class="container">
            <div style="margin-top:1%" class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10 padding_0" style="background-color: #fff;padding: 1%">
                        <div class="col-md-3 padding_left_0">
                              <?php echo $__env->make('fontend.template.company_nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                        <div class="col-md-9">
                              <div style="border-bottom:1px solid #32AFD4;margin-bottom:2%" class="row">
                                    <?php echo $__env->make('fontend.template.company_title_tab', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                              </div>

                              <div style="border-bottom:1px solid #E8E8E8;margin-bottom:2%" class="row">
                                    <div class="col-md-12 col-xs-12 padding_0">
                                          <div class="table-responsive">
                                                <h4 style="font-weight:bold;font-size:15px;line-height:0px">Research & Development</h4>
                                                <p>There is/are <?php echo e(($r_d) ? $r_d->r_d : ""); ?> R&D Engineer(s) in the company.</p>
                                          </div>
                                    </div>
                              </div>
                              <?php echo $__env->make('fontend.template.contact_supplier_form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>    
                  </div>
                  <div class="col-md-1"></div>
            </div>  
      </div>
      
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">

var nav_url = window.location.href;
var nav_url_array = nav_url.split("/");
if(nav_url_array[3] == 'rd-capacity'){
    $('.color_changer>ul li:nth-child(3)').css('background','white');
    $('.color_changer>ul li:nth-child(3) span').css('color','black');

    $('ul.overview li:nth-child(4)').css('padding','5px');
    $('ul.overview li:nth-child(4)').css('background-color','#2e6da4');
    $('ul.overview li:nth-child(4)').css('padding-left','15px');
    $('ul.overview li:nth-child(4)').css('border-radius','5px');
    $('ul.overview li:nth-child(4) a').css('color','#ffffff');
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.template.layout_dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>