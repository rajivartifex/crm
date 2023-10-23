<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title" id="custom-header">Business Location</h4>
                @can('business-location-create')
                    <a href="{{ route('customer-business-location-index', ['cust_id' => $customer->id ?? '']) }}"
                        id="custom-button" class="btn btn-sm btn-secondary">New</a>
                @endcan
                <table id="business-location-tbl" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Location</th>
                            <th>Address</th>
                            <th>Suburb</th>
                            <th>State</th>
                            <th>Postcode</th>
                            <th>Country</th>
                            @canany(['business-location-edit', 'business-location-delete'])
                                <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($custLocation as $key => $list)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $list->cust_location_name ?? '' }}</td>
                                <td>{{ $list->cust_location_add1 ?? '' }} {{ $list->cust_location_add2 ?? '' }}</td>
                                <td>{{ $list->cust_location_suburb ?? '' }}</td>
                                <td>{{ $list->cust_location_state ?? '' }}</td>
                                <td>{{ $list->cust_location_postcode ?? '' }}</td>
                                <td>{{ $list->cust_location_country ?? '' }}</td>
                                @canany(['business-location-edit', 'business-location-delete'])
                                    <td>
                                        <div class="btn-group">
                                            @can('business-location-edit')
                                                <a href="{{ route('customer-business-location-index', ['loc_id' => $list->id ?? '', 'cust_id' => $customer->id ?? '']) }}"
                                                    class="btn btn-secondary btn-sm">Edit</a>
                                            @endcan
                                            <button type="button"
                                                class="btn btn-sm btn-secondary dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                @can('business-location-edit')
                                                    <a class="dropdown-item btn-sm"
                                                        href="{{ route('customer-business-location-index', ['loc_id' => $list->id ?? '', 'cust_id' => $customer->id ?? '']) }}"><i
                                                            class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true">
                                                        </i> Edit</a>
                                                @endcan
                                                @can('business-location-delete')
                                                    <button class="dropdown-item btn-delete btn-sm"
                                                        data-redirect-url="{{ route('customer-business-location-delete') }}"
                                                        data-id="{{ $list->id }}"><i
                                                            class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true">
                                                        </i> Delete</button>
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
