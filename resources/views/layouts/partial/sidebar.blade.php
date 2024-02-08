    <!--**********************************
                Sidebar start
    ***********************************-->
    <div class="deznav scrollbar">
        {{-- <div class=""> --}}
            <div class="main-profile">
                <div class="image-bx">
                    <img src="{{asset('public')}}/images/profile/{{ Auth::user()->profile_photo_path }}" alt="">
                    <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
                </div>
                <h5 class="name">{{ Auth::user()->name }}</h5>
                <p class="email"><a href="mailto:<nowiki>{{ Auth::user()->email }}">[{{ Auth::user()->email }}]</a></p>
            </div>
            <ul class="metismenu" id="menu">
                <li class="nav-label first">Main Menu</li>
                <li><a href="{{route('dashboard')}}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-144-layout"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li><a  class="" href="{{ route('pos_index') }}">
                    <i class="flaticon-381-home"></i>
                    <span class="nav-text" style="color: blue"><b>POS(Point Of Sale)</b></span>
                </a>
                </li>

                <li><a  class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">

                    <i class="fa fa-blind" aria-hidden="true"></i>
                    <span class="nav-text">Attendance</span>
                </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('attendance') }}">Attendance</a></li>
                        <li><a href="{{ route('change_attendance') }}">Change Attendance</a></li>
                        <li><a href="{{ route('all_attendance') }}"> All Attendance</a></li>
                    </ul>
                </li>
                <li><a  class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">

                    <i class="fa fa-blind" aria-hidden="true"></i>
                    <span class="nav-text">All Report</span>
                </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('sales_report') }}">Sales Report</a></li>
                        <li><a href="{{ route('sales_against_profit') }}">Sales Against Profit</a></li>
                        <li><a href="{{route('expense_report')}}">Expense Report</a></li>
                        <li><a href="{{ route('due_payment_report') }}">Due Payment Report</a></li>

                    </ul>
                </li>
                <li><a  class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">

                    <i class="fa fa-blind" aria-hidden="true"></i>
                    <span class="nav-text">Payment</span>
                </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('due_payment')}}">Due Payment Received</a></li>

                    </ul>
                </li>
                <li><a  class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">

                    <i class="fa fa-blind" aria-hidden="true"></i>
                    <span class="nav-text">Salary (EMP)</span>
                </a>
                    <ul aria-expanded="false">
                        <li><a href="advanced_salary">Advanced Salary</a></li>
                        <li><a href="pay_salary">Pay Salary</a></li>
                        <li><a href="salary_process"> Salary Process </a></li>
                        <li><a href="salary_approve_list">Salary Approve </a></li>

                    </ul>
                </li>
                <li><a  class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">

                    <i class="flaticon-381-home"></i>
                    <span class="nav-text">Expense</span>
                </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('expense')}}">Add Expense</a></li>

                    </ul>
                </li>

                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-home"></i>
                        <span class="nav-text">Inventory</span>
                    </a>
                    <ul aria-expanded="false">

                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Product</a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('product')}}">Product</a></li>
                                <li><a href="{{ route('product_approve_list') }}">Product Approve List</a></li>
                                <li><a href="{{ route('product_export_import') }}">Product Export And Import</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Data Setting</a>
                            <ul aria-expanded="false">

                                <li><a href="{{ route('category') }}">Category</a></li>
                                <li><a href="{{ route('unit') }}">Units setting</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                        <span class="nav-text">Data Setting</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a class="has-arrow" href="javascript:void()">Supplier</a>
                            <ul aria-expanded="false">
                                <li><a href="{{ route('Supplier_index') }}">Supplier</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Customer</a>
                            <ul aria-expanded="false">
                                <li><a href="{{ route('Customer_index') }}">Customer</a></li>
                            </ul>
                        </li>

                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Employee</a>
                            <ul aria-expanded="false">
                                <li><a href="{{ route('employee_index') }}">Employee info</a></li>
                                <li><a href="{{ route('employee_designation') }}">Designation</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="{{ route('setting') }}" aria-expanded="false">Setting</a>
                        </li>

                    </ul>
                </li>


                <li class="nav-label">Apps</li>
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-077-menu-1"></i>
                        <span class="nav-text">Apps</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="#">Profile</a></li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
                            <ul aria-expanded="false">
                                <li><a href="#">Product Grid</a></li>
                                <li><a href="#">Product List</a></li>
                                <li><a href="#">Product Details</a></li>
                            </ul>
                        </li>
                    </ul>
                    {{-- <ul aria-expanded="false">
                        <li><a href="{{route('sales_quoation.index')}}">Sales Quotation</a></li>
                        <li><a href="{{route('sales.index')}}" >Sales</a></li>
                        <li><a href="{{route('sales_cashmemo.index')}}">Cash Memo Sales</a></li>
                        <li><a href="{{route('sales_requisition.index')}}">Item Requisition</a></li>
                        <li><a href="{{route('sales_installation.index')}}">Installation</a></li>
                        <li><a href="{{route('sales_payment_receive.index')}}">Payment Receive</a></li>
                        <li><a href="{{route('sales_cheque_return.index')}}">Cheque Return</a></li>
                        <li><a href="{{route('sales_product_return.index')}}" >Product Return</a></li>
                        <li><a href="{{route('coming_soon')}}">Stock Position</a></li>
                        <li><a href="{{route('coming_soon')}}">Conveyance</a></li>
                        <li><a href="{{route('coming_soon')}}">Verify Conveyance</a></li>
                        <li><a href="{{route('mast_item.index')}}">Item Catalogue</a></li>
                        <li><a href="{{route('mast_client.index')}}">Client Details</a></li>
                        <li><a href="{{route('mast_grade.index')}}">Grade Code</a></li>
                        <li><a href="{{route('mast_supplier.index')}}">Supplier Details</a></li>
                        <li><a href="{{route('mast_employee.index')}}">Employee Category</a></li>
                        <li><a href="{{route('mast_designation.index')}}">Designation</a></li>
                        <li><a href="{{route('mast_department.index')}}">Department</a></li>
                        <li><a href="{{route('mast_leaveType.index')}}">Leave type</a></li>
                        <li><a href="{{route('mast_package.index')}}">Package Type</a></li>
                        <li><a href="{{route('mast_salary.index')}}">Salary structure</a></li>
                        <li><a href="{{route('mast_store.index')}}">Store Detials</a></li>
                        <li><a href="{{route('mast_unit.index')}}">Unit Details</a></li>
                    </ul> --}}
                </li>
                @canany('Setting access')
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">Setting</span>
                    </a>
                    <ul aria-expanded="false">
                        @canany('Role access','Role add','Role edit','Role delete')
                            <li><a href="{{ route('roles.index') }}">Role</a></li>
                        @endcanany

                        @canany('User access','User add','User edit','User delete')
                        <li><a href="{{ Route('users.index')}}">User</a></li>
                        @endcanany
                    </ul>
                </li>
                @endcanany
            </ul>
            <div class="copyright">
                {{-- <style>
                    @media only screen and (max-width: 767px) {
                        .apps_install {
                            display: none;
                        }
                    }
                </style> --}}
                <div class="image-bx apps_install">
                    <a href="{{ asset('public/gulf.apk') }}"><img src="{{asset('public')}}/images/icon-android.png" style="width:60%;" alt=""></a>
                </div>
                <p><strong>Gulf ERP Admin Dashboard</strong> © 2023 All Rights Reserved</p>
                <p class="fs-12">Made with <span class="heart"></span> by Icon ISL</p>
            </div>
        {{-- </div> --}}
    </div>
    <!--**********************************
                Sidebar end
    ***********************************-->
