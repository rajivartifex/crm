<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title text-bold">Business Location Contact Info</h2>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        @can('business-contact-info-create')
                            <div class="input-group-append">
                                <a href="{{route('customer-business-contact-info-index',['cust_id' => $customer->id ?? ''])}}" class="btn btn-sm btn-secondary" type="button">New</a>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="business-contact-info-tbl" class="table table-bordered table-striped" style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Fax</th>
                            <th>Opening/Formation Date</th>
                            @canany(['business-contact-info-edit','business-contact-info-delete'])
                                <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contactInfo as $key => $list)
                        <tr>
                            <td>#</td>
                            <td>{{$list->contact->con_first_name ?? ''}}</td>
                            <td>{{$list->contact->con_last_name ?? ''}}</td>
                            <td>{{$list->contact->con_email ?? ''}}</td>
                            <td>{{$list->contact->con_telephone ?? ''}}</td>
                            <td>{{$list->contact->con_fax ?? ''}}</td>
                            <td>{{\Carbon\Carbon::parse($list->contact->con_date ?? '')->format('d-M-Y')}}</td>
                            @canany(['business-contact-info-edit','business-contact-info-delete'])
                                <td>
                                    <div class="btn-group">
                                        @can('business-contact-info-edit')
                                            <a href="{{route('customer-business-contact-info-index',['cust_con_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}" class="btn btn-secondary btn-sm">Edit</a>
                                        @endcan
                                        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            @can('business-contact-info-edit')
                                                <a class="dropdown-item" href="{{route('customer-business-contact-info-index',['cust_con_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Edit</a>
                                            @endcan
                                            @can('business-contact-info-delete')
                                                <button class="dropdown-item btn-delete" data-redirect-url="{{route('customer-business-contact-info-delete')}}" data-id="{{$list->id}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Delete</button>
                                            @endcan
                                        </div>
                                    </div>
                                </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
