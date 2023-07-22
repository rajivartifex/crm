<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Business Category</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        @can('business-category-create')
                            <div class="input-group-append">
                                <a href="{{route('customer-business-category-index',['cust_id' => $customer->id ?? ''])}}" class="btn btn-sm btn-secondary" type="button">New</a>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="business-category-tbl" class="table table-bordered table-striped" style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Service Tags</th>
                            @canany(['business-category-edit','business-category-delete'])
                                <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($custCategories as $key => $list)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$list->categories->cat_name ?? ''}}</td>
                            <?php
                                $serviceTags = \App\Models\ServiceTag::where('cust_categories_id',$list->id)->pluck('service_tag')->toArray();
                            ?>
                            <td>
                                @foreach($serviceTags as $tag)
                                    <span class="badge badge-primary">{{$tag}}</span>
                                @endforeach
                            </td>
                            @canany(['business-category-edit','business-category-delete'])
                                <td>
                                    <div class="btn-group">
                                        @can('business-category-edit')
                                            <a href="{{route('customer-business-category-index',['cat_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}" class="btn btn-secondary btn-sm">Edit</a>
                                        @endcan
                                        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            @can('business-category-edit')
                                                <a class="dropdown-item" href="{{route('customer-business-category-index',['cat_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Edit</a>
                                            @endcan
                                            @can('business-category-delete')
                                                <button class="dropdown-item btn-delete btn-sm" data-redirect-url="{{route('customer-business-category-delete')}}" data-id="{{$list->id}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Delete</button>
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
