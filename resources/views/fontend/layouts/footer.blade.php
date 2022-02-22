<style>
.icoSR, .icoSS {
    margin-top:0px !important;
}
.icoSS  {
    margin-left: 5px;
}
</style>
<div class="seller-dashboard-right">
    <!-- <div class="col-md-12">
        <div class="col-md-4"></div>
        <div class="col-md-4">
    		<ul>
    			<li><a itemprop="url" href="" class="frIco icoSF" target="_blank"></a></li>
    			<li><a itemprop="url" href="https://twitter.com/AsiaBuyer" class="frIco icoST" target="_blank"></a></li>
    			<li><a itemprop="url" href="#" class="frIco icoSG" target="_blank"></a></li>
    			<li><a itemprop="url" href="https://www.youtube.com/channel/UCh5WNGb3CLCiqjznxI32PUw" class="frIco icoSY" target="_blank"></a></li>
    			<li><a itemprop="url" href="https://www.linkedin.com/company/buyer-seller-asia/?viewAsMember=true" class="frIco icoSL" target="_blank"></a></li>
    			<li><a itemprop="url" href="#" class="frIco icoSS st_sharethis_custom"></a></li>
    			<li><a itemprop="url" href="" class="frIco icoSR" target="_blank"></a></li>
    		</ul>
    	</div>
    </div> -->

    <div class="footer-subscribe">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="subscribe-form">
                        <p>Trade Alert - Delivering the latest product trends and industry news straight to your inbox. </p>
                        @if (isset($error)) @endif 
                        <form action="{!!URL::to('subscript/confirm-email')!!}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="input-group subsc">
                                <input name="email" type="email" class="form-control note" placeholder="Give your E-mail win a prize" aria-describedby="basic-addon2" required> 
                                @if($errors->has('email'))
                                <div class="error">{{ $errors->first('email') }}</div>
                                @endif
                                <span class="btn btn-default input-group-addon" id="basic-addon2">
                                    <button>Subscribe</button> 
                                </span> 
                            </div>
                            <p>We’ll never share your email address with a third-party.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-footer">
        <div class="main-footer-top">
            <div class="container-fluid">
                <div id="item_sha" class="row">
                    @if($footers) @foreach($footers as $footer)
                    <div class="col-md-2 col-sm-4 footer-list">
                        <ul class="foot-list">
                            <li>{{ $footer->category_name }}</li>
                        </ul>
                        <ul class="foot-list">
                            @foreach($footer->sub_pages as $data)
                            <li><a target="_blank" href="{{ URL::to($data->slug)}}"> {{ $data->category_name}}</a></li>
                            @endforeach 
                        </ul>
                    </div>
                    @endforeach @endif 
                </div>
            </div>
        </div>

        <div class="main-footer-bottom">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-md-4 foot-don text-center">
                        <div class="app-btn-group">
                            <h4 class="h4">Free App </h4>
                            <img src="{!!asset('/assets/google-play-btn.png')!!}" alt="goole play" />          
                            <img src="{!!asset('/assets/app-store-button.png')!!}" alt="apple apps" /> 
                        </div>
                    </div>
                    <div class="col-md-4 foot-don text-center">
                        <h4 class="h4">Download Manager </h4>
                        <img src="{!!asset('/assets/download-icon.png')!!}" alt="download butoon" /> 
                    </div>
                    <div class="col-md-4 foot-don footer-media text-center">
                        <h4 class="h4">Follow Us on</h4>
                        <ul itemscope itemtype="http://schema.org/ProfessionalService">
                            <li><a rel="external" itemprop="url" href="https://www.facebook.com/bdtdc/" target="_blank"> 
                                <i class="fa fa-facebook-square"></i>
                            </a></li>
                            <li><a rel="external" itemprop="url" href="https://twitter.com/bdtdc" target="_blank">
                                <i class="fa fa-twitter-square"></i>
                            </a></li>
                            <li><a rel="external" itemprop="url" href="https://www.youtube.com/c/Bdtdc" target="_blank">
                                <i class="fa fa-youtube-square"></i>
                            </a></li>
                            <li><a rel="external" itemprop="url" href="https://plus.google.com/+Bdtdc" target="_blank">   
                                <i class="fa fa-google-plus-square"></i>
                            </a></li>
                            <li><a rel="external" itemprop="url" href="https://www.linkedin.com/company/bdtdc" target="_blank">
                                <i class="fa fa-linkedin-square"></i>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="copyright-footer">
                <div class="container-fluid"> 
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="text-center copyright-top"> 
                                <a target="_blank" href="{{URL::to('wholesale')}}">Wholesaler |</a> 
                                <a target="_blank" href="{{URL::to('Popular-product-trends')}}">BdSource |</a> 
                                <a target="_blank" href="{{URL::to('bangladesh-suppliers')}}">Bangladesh Suppliers |</a> 
                                <a target="_blank" href="{{URL::to('bangladesh-garments')}}">Bangladesh Garments |</a> 
                                <a target="_blank" href="{{URL::to('selected/supplier-products')}}">Selected Suppliers |</a> 
                                <a target="_blank" href="{{URL::to('online-marketplace')}}">Shop by Category |</a>
                                <a target="_blank" href="{{URL::to('sitemap')}}">Sitemap</a>
                            </div>
                            <div class="text-center copyright-bottom">
                                <a href="{{URL::to('contact')}}"> Contact Us |</a> 
                                <a target="_blank" href="{{URL::to('product_listing_policy')}}">Product Listing Policy |</a> 
                                <a target="_blank" href="{{URL::to('Intellectual')}}"> Intellectual Property Policy and Infringement Claims |</a> 
                                <a target="_blank" href="{{URL::to('Policies_Rules')}}">Privacy Policy</a> 
                                <a target="_blank" href="{{URL::to('terms_use')}}">Terms of Use</a> 
                            </div>
                            <div class="text-center copyright-line">
                                <span data-toggle="tooltip" data-title="“Copyright© 2015-<?php echo date(" Y "); ?> BuyerSeller.Asia. This entire website and it’s content is protected by United States copyright, registered with the Library of Congress, Washington, D.C. and by The Canadian Government, and other intellectual property laws, and may not be reproduced, rewritten, distributed, re-disseminated, transmitted, displayed, published or broadcast, directly or indirectly, in any medium without the prior written permission of BuyerSeller.”">Copyright©</span> 2018-
                                <?php echo date("Y"); ?>, BuyerSeller.CO. All Rights Reserved. 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
   function chatOnClick() {
   	$(".zopim").toggle()
   };
</script>