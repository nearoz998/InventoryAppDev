<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="./assets/cms/img/admin-avatar.png" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">
                  @php
                  $username = json_encode(auth()->user()->name);
                    echo explode(' ',explode('"', $username)[1])[0];
                @endphp
                </div><small>Administrator</small>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="{{ route('home') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">CMS</li>
            <li>
                <a href=""><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">Products</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('products.create') }}">Add Product</a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}">Manage Products</a>
                    </li>
                    <li>
                        <a href="{{ route('productunits.index') }}"><span class="nav-level">Manage
                                Units</span></a>
                    </li>
                    <li>
                        <a href="{{ route('productcategories.index') }}"><span class="nav-level">Manage
                                Categories</span></a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('productcategories.index') }}"><span class="nav-level">Categories</span></a>
                          <ul class="nav-3-level collapse">
                              <li>
                                  <a href="{{ route('productcategories.index') }}">Category list</a>
                                  <a href="{{ route('productcategories.create') }}">Add category</a>
                              </li>
                          </ul>
                    </li> --}}
                </ul>
            </li>
            <li>
                <a href=""><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">Purchases</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('purchases.create') }}">Add Purchase</a>
                    </li>
                    <li>
                        <a href="{{ route('purchases.index') }}">Manage Purchases</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href=""><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">Supplier</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('suppliers.createsupplier', ['viewtype'=>'1']) }}) }}">Add Supplier</a>
                    </li>
                    <li>
                        <a href="{{ route('suppliers.index') }}">Manage Suppliers</a>
                    </li>
                    <li>
                        <a href="#">Supplier Ledger</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href=""><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">Customer</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('customers.createcustomer', ['viewtype'=>'1']) }}">Add Customer</a>
                    </li>
                    <li>
                        <a href="{{ route('customers.index') }}">Manage Customers</a>
                    </li>
                    <li>
                        <a href="{{ route('customers.creditcustomers') }}">Credit Customers</a>
                    </li>
                    <li>
                        <a href="{{ route('customers.paidcustomers') }}">Paid Customers</a>
                    </li>
                    <li>
                        <a href="#">Customer Ledger</a>
                    </li>
                </ul>
            </li>
            <li class="heading">Human Resource</li>
            <li>
                <a href=""><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">HRM</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('designations.createdesignation', ['viewtype'=>'1']) }}">Add Designation</a>
                        {{-- <a href="#">Add Designation</a> --}}
                    </li>
                    <li>
                        <a href="{{ route('designations.index') }}">Manage Designation</a>
                        {{-- <a href="#">Manage Designaation</a> --}}
                    </li>
                    <li>
                        <a href="{{ route('employees.createemployee', ['viewtype'=>'1']) }}">Add Employee</a>
                        {{-- <a href="#">Add Employee</a> --}}
                    </li>
                    <li>
                        <a href="{{ route('employees.index') }}">Manage Employee</a>
                        {{-- <a href="#">Manage Employee</a> --}}
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">Menu Levels</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="javascript:;">Level 2</a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="nav-label">Level 2</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-3-level collapse">
                            <li>
                                <a href="javascript:;">Level 3</a>
                            </li>
                            <li>
                                <a href="javascript:;">Level 3</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
