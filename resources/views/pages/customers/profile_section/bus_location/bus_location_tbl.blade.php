<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Business Location</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{route('customer-business-location-index',['cust_id' => $customer->id ?? ''])}}" class="btn btn-sm btn-secondary" type="button">New</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Location</th>
                            <th>Address</th>
                            <th>Suburb</th>
                            <th>State</th>
                            <th>Postcode</th>
                            <th>Country</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#</td>
                            <td>USA</td>
                            <td>USA</td>
                            <td>XYZ</td>
                            <td>New York</td>
                            <td>12345</td>
                            <td>USA</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('customer-business-location-index')}}" class="btn btn-secondary btn-sm">Edit</a>
                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{route('customer-business-location-index')}}">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Location</th>
                            <th>Address</th>
                            <th>Suburb</th>
                            <th>State</th>
                            <th>Postcode</th>
                            <th>Country</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
