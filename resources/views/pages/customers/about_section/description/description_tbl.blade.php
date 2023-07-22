<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Descriptions</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        @can('description-create')
                            <div class="input-group-append">
                                <a href="{{route('customer-description-index',['cust_id' => $customer->id ?? ''])}}" class="btn btn-sm btn-secondary" type="button">New</a>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="business-description-tbl" class="table table-bordered table-striped" style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Short Description</th>
                            <th>Long Description</th>
                            <th>Alternate Description</th>
                            @canany(['description-edit','description-delete'])
                                <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($custDesc as $key => $list)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{\Str::limit($list->cust_short_desc ?? '', 70)}} @if(\Str::length($list->cust_short_desc ?? 0) >= 70 ) <a href="{{route('customer-description-index',['desc_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}">Read More</a>  @endif </td>
                            <td>{{\Str::limit($list->cust_long_desc ?? '', 70)}} @if(\Str::length($list->cust_short_desc ?? 0) >= 70 ) <a href="{{route('customer-description-index',['desc_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}">Read More</a> @endif </td>
                            <td>{{\Str::limit($list->cust_alter_desc ?? '', 70)}} @if(\Str::length($list->cust_short_desc ?? 0) >= 70 ) <a href="{{route('customer-description-index',['desc_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}">Read More</a> @endif </td>
                            @canany(['description-edit','description-delete'])
                                <td>
                                    <div class="btn-group">
                                        @can('description-edit')
                                            <a href="{{route('customer-description-index',['desc_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}" class="btn btn-secondary btn-sm">Edit</a>
                                        @endcan
                                        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            @can('description-edit')
                                                <a class="dropdown-item btn-sm" href="{{route('customer-description-index',['desc_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Edit</a>
                                            @endcan
                                            @can('description-delete')
                                                <button class="dropdown-item btn-delete btn-sm" data-redirect-url="{{route('customer-description-delete')}}" data-id="{{$list->id}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Delete</button>
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
