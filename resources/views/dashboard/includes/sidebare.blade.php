<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            
      
            <li class=" nav-item"><a href="{{route('category.create')}}">
                <i class="la la-arrows-h">
                </i><span class="menu-title" data-i18n="nav.horz_nav.main">
                    {{trans('admin.categories')}}</span></a>
            </li>

            <li class=" nav-item"><a href="#"><i class="la la-arrows-h"></i><span class="menu-title" data-i18n="nav.horz_nav.main">{{trans('admin.companies')}}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('companies.create')}}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">
                            {{trans('admin.create_company')}}</a>
                    </li>
       
                    <li><a class="menu-item" href="{{route('companies.index')}}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">
                            {{trans('admin.show_companies')}}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>