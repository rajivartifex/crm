<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Marketing</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{route('customer-marketing-index',['cust_id' => $customer->id ?? ''])}}" class="btn btn-sm btn-secondary" type="button">New</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="business-marketing-tbl" class="table table-bordered table-striped" style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Domain Name</th>
                            <th>Marketing Type</th>
                            <th>Start Date</th>
                            <th>Renewal Date</th>
                            <th>Plan</th>
                            <th>Pricing</th>
                            <th>Payment Modes</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($custMarketing as $key => $list)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$list->cust_mark_domain_name ?? ''}}</td>
                            <td>{{$list->marketingtype->type ?? ''}}</td>
                            <td>{{$list->cust_mark_start_date ?? ''}}</td>
                            <td>{{$list->cust_mark_renewal_date ?? ''}}</td>
                            <td>{{$list->cust_mark_plan ?? ''}}</td>
                            <td>{{$list->cust_mark_pricing ?? ''}}</td>
                            <td>{{$list->paymentmode->type ?? ''}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('customer-marketing-index',['mk_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}" class="btn btn-secondary btn-sm">Edit</a>
                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item btn-sm" href="{{route('customer-marketing-index',['mk_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Edit</a>
                                        <button class="dropdown-item btn-delete btn-sm" data-redirect-url="{{route('customer-marketing-delete')}}" data-id="{{$list->id}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Domain Name</th>
                            <th>Marketing Type</th>
                            <th>Start Date</th>
                            <th>Renewal Date</th>
                            <th>Plan</th>
                            <th>Pricing</th>
                            <th>Payment Modes</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
