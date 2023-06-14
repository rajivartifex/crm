<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Descriptions</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{route('customer-description-index',['cust_id' => $customer->id ?? ''])}}" class="btn btn-sm btn-primary" type="button">New</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Short Description</th>
                            <th>Long Description</th>
                            <th>Alternate Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($custDesc as $key => $list)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$list->cust_short_desc ?? ''}}</td>
                            <td>{{$list->cust_long_desc ?? ''}}</td>
                            <td>{{$list->cust_alter_desc ?? ''}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('customer-description-index',['desc_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}" class="btn btn-primary btn-sm">View</a>
                                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <button class="dropdown-item btn-delete" data-redirect-url="{{route('customer-description-delete')}}" data-id="{{$list->id}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Short Description</th>
                            <th>Long Description</th>
                            <th>Alternate Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
