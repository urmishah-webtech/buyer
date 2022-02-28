<div class="category-bdt" style="height:auto;padding:5px;width:146px;float:left;text-align:left;border:1px solid transparent">
	<a target="_blank" itemprop="url" href="{{ URL::to('online-marketplace',null) }}" class="top-categy" style="text-align:left;font-size:14px">
		<i class="fa fa-list-ul" style=""></i> 
		Categories
	</a>
	<div class="row padding_0 show-ct-list" style="display:none;">
		<!-- <p></p> -->
		<div class="mobo-categories">
			@if ($categorys)
			@foreach ($categorys as $category)
			<div>
				<ul class="bazar-top-list">
					<li>
						<span class="{{ $category['image']}}"></span>
						<a target="_blank" itemprop="url" rel="category" href="{{ URL::to($category['slug'],$category['id']) }}">
							<span itemprop="name">{{ $category['name']}}</span> 
							<i class="fa fa-angle-right"></i>
						</a>
						<span>
						</span>
						@if ($category->sub_cat)
						<div class="row child-ct-list">
							<h3 class="catgory-head-tle">{{ $category['name'] }}</h3>
							<ul>
								@foreach (array_slice($category->sub_cat->toArray(),0,40) as $category_children)
								<li>
									<a target="_blank" href="{{ URL::to(strtolower(preg_replace('/[^A-Za-z0-9\.-]/','-',preg_replace('/[^A-Za-z0-9\. -]/','',$category_children['slug']))).'/0',$category_children['id']) }}">
									{{ $category_children[ 'name']}}
									</a>
								</li>
								@endforeach
							</ul>
							<div>
							</div>
						</div>
						@endif
					</li>
				</ul>
			</div>
			@endforeach
			@endif
		</div>
		<div style="padding-left:20px;padding-bottom:30px">
			<a target="_blank" href="{{URL::to('online-marketplace')}}" style="font-size:15px;color:#000;font-weight:600;line-height:40px;float:left">All Categories</a>
		</div>
	</div>
</div>