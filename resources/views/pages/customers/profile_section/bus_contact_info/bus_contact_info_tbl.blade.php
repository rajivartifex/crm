<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title text-bold">Business Location Contact Info</h2>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{route('customer-business-contact-info-index',['cust_id' => $customer->id ?? ''])}}" class="btn btn-sm btn-primary" type="button">New</a>
                        </div>
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
                            <th>Action</th>
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
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('customer-business-contact-info-index',['cust_con_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}" class="btn btn-primary btn-sm">View</a>
                                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Fax</th>
                            <th>Opening/Formation Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
