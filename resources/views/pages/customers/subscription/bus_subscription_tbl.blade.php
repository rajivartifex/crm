<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Hosting Subscription</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{route('customer-subscription-index',['cust_id' => $customer->id ?? ''])}}" class="btn btn-sm btn-primary" type="button">New</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="business-subscription-tbl" class="table table-bordered table-striped" style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Website Name</th>
                            <th>Domain Name</th>
                            <th>Solution Type</th>
                            <th>Plan</th>
                            <th>Pricing</th>
                            <th>Payment Modes</th>
                            <th>Start Date</th>
                            <th>Renewal Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($custSubscription as $key => $list)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$list->cust_sub_website_name ?? ''}}</td>
                            <td>{{$list->cust_sub_domain_name ?? ''}}</td>
                            <td>{{$list->cust_sub_solution_id ?? ''}}</td>
                            <td>{{$list->cust_sub_plan ?? ''}}</td>
                            <td>{{$list->cust_sub_pricing ?? ''}}</td>
                            <td>{{$list->cust_sub_payment_mode_id ?? ''}}</td>
                            <td>{{$list->cust_sub_start_date ?? ''}}</td>
                            <td>{{$list->cust_sub_renewal_date ?? ''}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('customer-subscription-index',['sub_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}" class="btn btn-primary btn-sm">Edit</a>
                                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item btn-sm" href="{{route('customer-subscription-index',['sub_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Edit</a>
                                        <button class="dropdown-item btn-delete btn-sm" data-redirect-url="{{route('customer-subscription-delete')}}" data-id="{{$list->id}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Website Name</th>
                            <th>Domain Name</th>
                            <th>Solution Type</th>
                            <th>Plan</th>
                            <th>Pricing</th>
                            <th>Payment Modes</th>
                            <th>Start Date</th>
                            <th>Renewal Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
