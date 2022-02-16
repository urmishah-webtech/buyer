</div>
<section>
    <div class="topbar_sha">
            <div aria-label="Navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" class="mainmenu header-topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <ul class="nav navbar-nav collapse navbar-collapse header-topbar-left" itemscope itemtype="http://schema.org/SiteNavigationElement">
                                <li class="dropdown s990">
                                    <a href="#">Help Center<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu submenu2" itemscope itemtype="http://schema.org/SiteNavigationElement">
                                        @foreach($pages as $page)
                                        @if($page->prefix == 'ServiceChannel' )
                                        <li>
                                            <a target="_blank" itemprop="url" href="{{ URL::to($page->slug,null)}}" class="prefix_url">{{ $page->name }}</a>
                                        </li>
                                        @endif
                                        @endforeach
                                        <li>
                                            <a class="btn" target="_blank" href="{{ URL::to("help-center")}}"> Contact for any query </a> 
                                        </li>
                                    </ul>
                                </li>
                                <li class="p-call">
                                    <a href="tel:+8801708884440"> <i class="fa fa-phone" aria-hidden="true"></i> +880 17088 84440</a>
                                </li>
                                    @if (Sentinel::check())
                                    @else
                                    @endif
                                    @if (Sentinel::check())
                                    <?php
                                                            $role = App\Model\Role_user::where('user_id',Sentinel::getUser()->id)->first();
                                                            
                                                            $dashboard_route = ($role->role_id ==3) ? "company/dashboard" : 'buyer/dashbord';
                                                            
                                                            ?>
                                    @endif
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <ul class="nav navbar-nav collapse navbar-collapse header-topbar-right" itemscope itemtype="http://schema.org/SiteNavigationElement">
                                @if (Sentinel::check())
                                @php
                                $notifications = getNotification();
                                $all_notifications = $notifications['all_notifications'];
                                $inquiry_notifications = $notifications['inquiry_notifications'];
                                $quote_notifications = $notifications['quote_notifications'];
                                $order_notifications = $notifications['order_notifications'];
                                @endphp
                                <li class="dropdown">
                                    <a itemprop="url" href="#">Welcome back</a>
                                    <span title=""></span> <span class="admin-dropdown">{{ Sentinel::getUser()->first_name }}</span> <span id="all_notification" ><i data-count="{{$all_notifications}}" class="glyphicon notification-icon"></i></span>
                                    <i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu submenu2" itemscope itemtype="http://schema.org/SiteNavigationElement">
                                        @if (Sentinel::check())
                                        <li>
                                            <a itemprop="url" href="{{ URL::to($dashboard_route,null)}}">Dashboard</a>
                                        </li>
                                        @endif

                                        <li title="" class="pusher_notification_1">
                                            <a itemprop="url" href="{{ URL::to('default/message?inq_sub_menu=New Inquiries',null) }}">New Inquiry <span><i data-count="{{$inquiry_notifications}}" class="glyphicon notification-icon"></i></span></a>
                                        </li>
                                        <li title="" class="pusher_notification_2">
                                            <a itemprop="url" href="{{ URL::to('Mybuying-Request?status=0&unread=true&search=&d=0',null) }}">New Quote <span><i data-count="{{$quote_notifications}}" class="glyphicon notification-icon"></i></span></a>
                                        </li>
                                        <li class="pusher_notification_3">
                                            <a itemprop="url" href="{{ URL::to('order-list',null) }}" class="join_btn"><i class="fa fa-users" aria-hidden="true"></i> Order <span><i data-count="{{$order_notifications}}" class="glyphicon notification-icon"></i></span></a>
                                        </li>
                                        <li class="sub-split">
                                            @if($role->role_id !=3)
                                            For Buyer
                                        </li>
                                        <li>
                                            <a itemprop="url" href="{{ URL::to('get-quotations')}}" target="_blank" class="" style="">Get Quotations Now</a>
                                        </li>
                                        <li class="navigation-menu-list-li">
                                            <a itemprop="url" href="{{ URL::to('Mybuying-Request',null) }}" class="navigation-menu-list-li-a">Manage Buying Requests</a>
                                        </li>
                                        <li class="navigation-menu-list-li">
                                            <a itemprop="url" href="{{ URL::to('list/view/requested/sample',null) }}" class="navigation-menu-list-li-a">Manage Sample Requests</a>
                                        </li>
                                        @endif
                                        @if($role->role_id ==3)
                                        <li class="sub-split">For Supplier
                                        </li>
                                        <li class="navigation-menu-list-li">
                                            <a itemprop="url" target="_blank" href="{{ URL::to('dashboard','product') }}" class="navigation-menu-list-li-a">Display New Products</a>
                                        </li>
                                        <li class="navigation-menu-list-li">
                                            <a itemprop="url" target="_blank" href="{{ URL::to('dashboard','company_site') }}" class="navigation-menu-list-li-a">Company & Site</a>
                                        </li>
                                        <li class="navigation-menu-list-li">
                                            <a itemprop="url" target="_blank" href="{{ URL::to('quotation/management',null) }}" class="navigation-menu-list-li-a">Quotes Management</a>
                                        </li>
                                        @endif
                                        @if (Sentinel::check())
                                        <li></li>
                                        <li>
                                            <a class="btn" href="{{ URL::to('logout',null) }}"> Logout </a> 
                                        </li>
                                        @endif
                                        @else
                                        <li style="">
                                            <a itemprop="url" href="{{ URL::to('login',null) }}" class="" data-toggle="">Sign In</a>
                                        </li>
                                        <li></li>
                                        <li>
                                            <a itemprop="url" href="{{ URL::to('join',null) }}" class="join_btn">Join Free</a>
                                        </li>
                                    @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-navigation">
                <div class="container">
                    <div class="row">
                        <div class="bdtdc-logo col-md-2 col-sm-2 col-xs-2" itemscope itemtype="http://schema.org/Organization">
                            <div class="nav-header-left">
                                <a rel="home" itemprop="url" title="Manufacturers-Suppliers" href="{{ URL::to('/',null)}}">
                                    <img alt="logo" itemprop="logo" class="loggg" src="{{ asset('assets/logo.png') }}" />
                                </a>
                            </div>
                        </div>

                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <div class="nav-header-right">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div aria-label="Navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" class="mainmenu pull-left">
                                    <ul class="nav navbar-nav collapse navbar-collapse pull-right m-nvr-inn" itemscope itemtype="http://schema.org/SiteNavigationElement">
                                        <li>
                                            <a itemprop="url" href="{{ URL::to('online-marketplace',null)}}">Shop by Category</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#">For Buyers<i class="fa fa-angle-down"></i></a>
                                            <ul role="menu" class="sub-menu">
                                                <li class="sub-split">
                                                Sourcing
                                                </li>
                                                @foreach($pages as $page)
                                                @if($page->prefix == 'BuyerChannel' )
                                                <li>
                                                    <a itemprop="url" href="{{ URL::to($page->prefix.'/pages/'.$page->sort_name,$page->id)}}" class="prefix_url">{{ $page->name }}</a>
                                                </li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#">For Suppliers<i class="fa fa-angle-down"></i></a>
                                            <ul role="menu" class="sub-menu" itemscope itemtype="http://schema.org/SiteNavigationElement">
                                            @foreach($pages as $page)
                                            @if($page->prefix == 'SupplierChannel' )
                                                <li><a itemprop="url" href="{{ URL::to($page->prefix.'/pages/'.$page->sort_name,$page->id)}}" class="prefix_url">{{ $page->name }}</a></li>
                                            @endif
                                            @endforeach
                                            </ul>
                                        </li>
                                        <li class="dropdown s990">
                                            <a href="#">Customer Service<i class="fa fa-angle-down"></i></a>
                                            <ul role="menu" class="sub-menu" itemscope itemtype="http://schema.org/SiteNavigationElement">
                                            @foreach($pages as $page)
                                            @if($page->prefix == 'ServiceChannel' )
                                                <li><a target="_blank" itemprop="url" href="{{ URL::to($page->slug,null)}}" class="prefix_url">{{ $page->name }}</a></li>
                                            @endif
                                            @endforeach
                                            </ul>
                                        </li>
                                        <li>
                                            <a target="_blank" class="pull-right" href="{{ URL::to('about-us',null)}}">About BuyerSeller</a>
                                        </li>
                                    </ul>
                                </div>
                                <button class="header-search-btn">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                                <div class="categories-dropdown">
                                    @include('fontend.layouts.all-category-list')
                                </div>
                                <div class="get-quotations-btn">
                                    <a itemprop="url" title="get quote" href="{{URL::to('get-quotations',null)}}">
                                        Get Quotations
                                        <img itemprop="image" class="img-responsive" src="{!! asset('assets/gold/archery.png') !!}" alt="Get Quotation home" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row header-search-bar">
                        @if (Sentinel::check())
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <div itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction">
                                <form class="form form-horizontal" itemprop="target" action="{!!URL::to('search-product',null)!!}" method="post">
                                    <input itemprop="url" type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-btn" style="">
                                            <select class="form-control all_search_options inp-ch" name="search">
                                                <option value="products">Products <i class="fa fa-angle-down"></i></option>
                                                <option value="suppliers">Suppliers</option>
                                                <option value="news">Quote</option>
                                            </select>
                                        </span>
                                        <input itemprop="query-input" name="key" class="form-control search_key inp-value" type="text" placeholder="What are you looking for..." required="required" />
                                        <span class="input-group-btn" style="/*width:13%;*/">
                                            <input itemprop="query-input" type="submit" class="btn btn-primary btn-lg pull-left all_search" value="Search" />
                                        </span>
                                        <button class="search-close-btn">×</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @else
                        <h3>My Dashbord</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>