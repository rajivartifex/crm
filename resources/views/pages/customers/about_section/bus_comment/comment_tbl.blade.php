<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Comments</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        @can('comments-create')
                            <div class="input-group-append">
                                <a href="{{route('customer-comment-index',['cust_id' => $customer->id ?? ''])}}" class="btn btn-sm btn-secondary" type="button">New</a>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="business-comment-tbl" class="table table-bordered table-striped" style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Comment</th>
                            @canany(['comments-edit','comments-delete'])
                                <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($custComments as $key => $list)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{\Str::limit($list->comment ?? '', 70)}} @if(\Str::length($list->comment ?? 0) >= 70 ) <a href="{{route('customer-comment-index',['c_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}">Read More</a> @endif</td>
                            @canany(['comments-edit','comments-delete'])
                                <td>
                                    <div class="btn-group">
                                        @can('comments-edit')
                                            <a href="{{route('customer-comment-index',['c_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}" class="btn btn-secondary btn-sm">Edit</a>
                                        @endcan
                                        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            @can('comments-edit')
                                                <a class="dropdown-item btn-sm" href="{{route('customer-comment-index',['c_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Edit</a>
                                            @endcan
                                            @can('comments-delete')
                                                <button class="dropdown-item btn-delete btn-sm" data-redirect-url="{{route('customer-comment-delete')}}" data-id="{{$list->id}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Delete</button>
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
