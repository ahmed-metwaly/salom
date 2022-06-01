<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-fixed">
	<div class="sidebar-content">

		<!-- User menu -->
		<div class="sidebar-user">
			<div class="category-content">
				<div class="media">
					<a href="{{ route('dashboard') }}" class="media-left">
						<img src="{{ url('public/images/businessman.png') }}" class="img-circle img-sm" alt=""></a>
					<div class="media-body">
							<span class="media-heading text-semibold">
								@if(auth()->check())
									{{ auth()->user()->name }}
								@endif
							</span>
						<div class="text-size-mini text-muted">
						</div>
					</div>

					{{--<div class="media-right media-middle">--}}
						{{--<ul class="icons-list">--}}
							{{--<li>--}}
								{{--<a href="#"><i class="icon-cog3"></i></a>--}}
							{{--</li>--}}
						{{--</ul>--}}
					{{--</div>--}}
				</div>
			</div>
		</div>
		<!-- /user menu -->


		<!-- Main navigation -->
		<div class="sidebar-category sidebar-category-visible">
			<div class="category-content no-padding">
				<ul class="navigation navigation-main navigation-accordion">
					<!-- Main -->
					<li class="navigation-header"><span> </span> <i class="icon-menu" title="Main pages"></i></li>
					<?php
						$menu = menu();
					?>
					@foreach($menu as $items)
						<li>
							<a href="#"><i class="{{ $items['icon'] }}"></i> <span> {{ $items['title'] }} </span></a>
							<ul>
								@foreach($items['route'] as $route => $title)
									<li class="{{ Request::url() == route($route) ? 'active' : '' }}">
										<a href="{{ route($route) }}"> {!! $title !!} </a>
									</li>
								@endforeach
							</ul>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<!-- /main navigation -->

	</div>
</div>
<!-- /main sidebar -->
