<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">لوحة تحكم زاد</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{route('dashboardHome')}}" class="nav-link">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                الرئيسية
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/" class="nav-link">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                زيارة الواجهة الرئيسية
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('settings.edit')}}" class="nav-link">
                            <i class="nav-icon fa fa-edit"></i>
                            <p>
                                الاعدادت
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admins.index')}}"
                           class="nav-link {{Request::segment(3)=='admins' ? 'active' : ''}}">
                            <i class="fa fa-user-circle nav-icon"></i>
                            <p>
                                المشرفين
                            </p>
                            <span class="badge badge-secondary">{{count(\App\Models\Admin::all())}}</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('nots.create')}}"
                           class="nav-link">
                            <i class="fa fa-bell-o nav-icon"></i>
                            <p>
                                الاشعارات
                            </p>
                            <span class="badge badge-secondary">{{count(\App\Models\Admin::all())}}</span>
                        </a>
                    </li>

                    <li class="nav-item has-treeview {{request()->segment(2)=='users' && request()->segment(3)!='admins'? 'menu-open' : ''}}">
                        <a href="#"
                           class="nav-link {{request()->segment(2)=='users' && request()->segment(3)!='admins'  ? 'active' : ''}} ">
                            <i class="nav-icon fa fa-user-circle"></i>
                            <p>
                                الاعضاء
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{route('driver.index')}}"
                                   class="nav-link {{Request::segment(3)=='driver' ? 'active' : ''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>السائقين</p>
                                    <span class="badge badge-primary">{{count(\App\Models\Driver::all())}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('store.index')}}"
                                   class="nav-link {{Request::segment(3)=='store' ? 'active' : ''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>
                                        المتاجر
                                    </p>
                                    <span class="badge badge-info">{{count(\App\Models\Store::all())}}</span>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('customer.index')}}"
                                   class="nav-link {{Request::segment(3)=='customer' ? 'active' : ''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>
                                        العملاء
                                    </p>
                                    <span
                                        class="badge badge-danger">{{count(\App\User::all()->where('type', 'normal'))}}</span>

                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{request()->segment(2)=='products' ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link {{request()->segment(2)=='products' ? 'active' : ''}} ">
                            <i class="nav-icon fa fa-product-hunt"></i>
                            <p>
                                المنتجات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ">
                            <li class="nav-item">
                                <a href="{{route('product.index')}}"
                                   class="nav-link {{request()->segment(3)=='product'  ? 'active' : ''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>الكل</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{request()->segment('2')=='offers' ? 'menu-open':''}}">
                        <a href="#" class="nav-link {{request()->segment('2')=='offers' ? 'active':''}}">
                            <i class="nav-icon fa fa-gift"></i>
                            <p>
                                العروض
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('offer.index')}}"
                                   class="nav-link {{request()->segment(3)=='offer' ? 'active' : ''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>الكل</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{request()->segment(2)=='orders' ? 'menu-open':''}}">
                        <a href="#" class="nav-link {{request()->segment(2)=='orders' ? 'active':''}}">
                            <i class="nav-icon fa fa-shopping-cart"></i>
                            <p>
                                طلبات العملاء
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('order.index')}}"
                                   class="nav-link {{request()->segment(3)=='order' &&request()->segment(4)!='create' ? 'active' : ''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>الكل</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('order.create')}}"
                                   class="nav-link {{request()->segment(3)=='order' &&request()->segment(4)=='create' ? 'active' : ''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>اضافة طلب جديد</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{request()->segment(2)=='pages' ? 'menu-open':''}}">

                        <a href="#" class="nav-link {{request()->segment(2)=='pages' ? 'active':''}}">
                            <i class="nav-icon fa fa-file"></i>
                            <p>
                                التحكم بالصفحات
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('pages.index')}}"
                                   class="nav-link {{request()->segment(2)=='pages' && request()->segment(3)!='create' ? 'active' : ''}}">

                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>الكل</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('pages.create')}}"
                                   class="nav-link {{ (request()->segment(2)=='pages') && (request()->segment(3)=='create') ? 'active' : ''}}">

                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>اضافة صفحة جديدة</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{request()->segment(2)=='ratings' ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link {{request()->segment(2)=='ratings' ? 'active' : ''}}">
                            <i class="nav-icon fa fa-star"></i>
                            <p>
                                التقيمات
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('driverRating.index')}}"
                                   class="nav-link {{request()->segment(3)=='driverRating' ? 'active' : ''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>تقيمات العملاء للسائقين</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('customerRating.index')}}"
                                   class="nav-link {{request()->segment(3)=='customerRating' ? 'active' : ''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>تقيمات السائقين للعملاء</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{request()->segment(2)=='cars' ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link {{request()->segment(2)=='cars' ? 'active' : ''}}">
                            <i class="nav-icon fa fa-star"></i>
                            <p>
                                السيارات
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('get.cars.make')}}"
                                   class="nav-link {{request()->segment(2)=='cars' ? 'active' : ''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>الكل</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{request()->segment(2)=='BankAccounts' ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link {{request()->segment(2)=='BankAccounts' ? 'active' : ''}}">
                            <i class="nav-icon fa fa-star"></i>
                            <p>
                                الحسابات البنكية
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('BankAccount.index')}}"
                                   class="nav-link {{request()->segment(3)=='BankAccount' ? 'active' : ''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>الكل</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('report.index')}}" class="nav-link">
                            <i class="nav-icon fa fa-comment"></i>
                            <p>
                                الشكاوي والدعم
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('create_country')}}" class="nav-link">
                            <i class="nav-icon fa fa-address-card"></i>
                            <p>
                                الدول </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('create_city')}}" class="nav-link">
                            <i class="nav-icon fa fa-address-card"></i>
                            <p>
                                المدن</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('create_state')}}" class="nav-link">
                            <i class="nav-icon fa fa-address-card"></i>
                            <p> 
                                الاحياء</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('all-contacts')}}" class="nav-link">
                            <i class="nav-icon fa fa-address-card"></i>
                            <p>
                                اتصل بنا</p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
