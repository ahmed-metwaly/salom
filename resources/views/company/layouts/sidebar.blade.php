
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{ trans('admin.dashboardTitle') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('companyDashboard') }}" class="nav-link ">
                            <span class="title">الإحصائيات</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('dashboard-statistics') }}" class="nav-link ">
                            <span class="title">مخطط الإحصائيات</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-clock"></i>
                    <span class="title">{{ trans('admin.workTimesIndex') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('works.companies.create') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.workTimesShow') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-university"></i>
                    <span class="title">{{ trans('admin.banksIndex') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('banks.index') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.banksShow') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('banks.create') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.banksAdd') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-puzzle"></i>
                    <span class="title">{{ trans('admin.servicesIndex') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('services.index') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.servicesShow') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('services.create') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.servicesAdd') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-basket"></i>
                    <span class="title">{{ trans('admin.ordersIndex') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('company-waiting-orders') }}" class="nav-link ">
                            <span class="title">  في انتظار الموافقة </span>
                            <span class="badge badge-danger"> {{ companyOrdersTypeCount(5, Auth::user()->id) }} </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('company-new-orders') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.newOrders') }}</span>
                            <span class="badge badge-danger"> {{ companyOrdersTypeCount(3, Auth::user()->id) }} </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('company-done-orders') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.doneOrders') }}</span>
                            <span class="badge badge-success"> {{ companyOrdersTypeCount(1, Auth::user()->id) }} </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('company-rejected-orders') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.notDoneOrders') }}</span>
                            <span class="badge badge-default"> {{ companyOrdersTypeCount(0, Auth::user()->id) }} </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('company-suspended-orders') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.suspendedOrders') }}</span>
                            <span class="badge badge-warning"> {{ companyOrdersTypeCount(2, Auth::user()->id) }} </span>
                        </a>
                    </li>
                </ul>
            </li>
             <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-usd"></i>
                    <span class="title">{{ trans('admin.siteCommission') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('site-commission') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.siteCommissionShow') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('site-invoice') }}" class="nav-link ">
                            <span class="title">عرض فواتير المبلغ المستحق</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>