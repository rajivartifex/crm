<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <h4 class="card-title" id="custom-header">About the Business</h4>
                @if (!count($custEmp) > 0)
                    @can('business-about-create')
                        <a href="{{ route('customer-no-emp-index', ['cust_id' => $customer->id ?? '']) }}" id="custom-button"
                            class="btn btn-sm btn-secondary">New</a>
                    @endcan
                @endif
                <table id="business-about-emp-tbl" class="table table-bordered table-striped"
                    style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Of Employees</th>
                            @canany(['business-about-edit', 'business-about-delete'])
                                <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($custEmp as $key => $list)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $list->cust_of_emps ?? '' }} </td>
                                @canany(['business-about-edit', 'business-about-delete'])
                                    <td>
                                        <div class="btn-group">
                                            @can('business-about-edit')
                                                <a href="{{ route('customer-no-emp-index', ['emp_id' => $list->id ?? '', 'cust_id' => $customer->id ?? '']) }}"
                                                    class="btn btn-secondary btn-sm">Edit</a>
                                            @endcan
                                            <button type="button"
                                                class="btn btn-sm btn-secondary dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                @can('business-about-edit')
                                                    <a class="dropdown-item btn-sm"
                                                        href="{{ route('customer-no-emp-index', ['emp_id' => $list->id ?? '', 'cust_id' => $customer->id ?? '']) }}"><i
                                                            class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true">
                                                        </i> Edit</a>
                                                @endcan
                                                @can('business-about-delete')
                                                    <button class="dropdown-item btn-delete btn-sm"
                                                        data-redirect-url="{{ route('customer-no-emp-delete') }}"
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
