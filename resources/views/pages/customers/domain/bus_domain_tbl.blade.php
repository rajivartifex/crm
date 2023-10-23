<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                    </div>
                </div>
            </div>
            <div class="card-body" id="domain">
                <h4 class="card-title" id="custom-header">Domain</h4>
                @can('domain-create')
                    <a href="{{ route('customer-domain-index', ['cust_id' => $customer->id ?? '']) }}" id="custom-button"
                        class="btn btn-sm btn-secondary">New</a>
                @endcan
                <table id="business-domain-tbl" class="table table-bordered table-striped"
                    style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Domain Name</th>
                            <th>Start Date</th>
                            <th>Renewal Date</th>
                            @canany(['domain-edit', 'domain-delete'])
                                <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($custDomains as $key => $list)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $list->cust_domain_name ?? '' }}</td>
                                <td>{{ $list->cust_domain_start_date ?? '' }}</td>
                                <td>{{ $list->cust_domain_renewal_date ?? '' }}</td>
                                @canany(['domain-edit', 'domain-delete'])
                                    <td>
                                        <div class="btn-group">
                                            @can('domain-edit')
                                                <a href="{{ route('customer-domain-index', ['dom_id' => $list->id ?? '', 'cust_id' => $customer->id ?? '']) }}"
                                                    class="btn btn-secondary btn-sm">Edit</a>
                                            @endcan
                                            <button type="button"
                                                class="btn btn-sm btn-secondary dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                @can('domain-edit')
                                                    <a class="dropdown-item btn-sm"
                                                        href="{{ route('customer-domain-index', ['dom_id' => $list->id ?? '', 'cust_id' => $customer->id ?? '']) }}"><i
                                                            class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true">
                                                        </i> Edit</a>
                                                @endcan
                                                @can('domain-delete')
                                                    <button class="dropdown-item btn-delete btn-sm"
                                                        data-redirect-url="{{ route('customer-domain-delete') }}"
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
