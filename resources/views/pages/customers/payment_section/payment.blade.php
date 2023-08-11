<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Payment Methods Accepted</h3>
                @if(!count($custPayments) > 0)
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            @can('payment-accepted-create')
                                <div class="input-group-append">
                                    <a href="{{route('customer-payment-method-index',['cust_id' => $customer->id ?? ''])}}" class="btn btn-sm btn-secondary" type="button">New</a>
                                </div>
                            @endcan
                        </div>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <table id="business-payment-tbl" class="table table-bordered table-striped" style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Payments</th>
                            @canany(['payment-accepted-edit','payment-accepted-delete'])
                                <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($custPayments as $key => $list)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <?php
                                    $payments = \App\Models\Payment::whereIn('id',$list->cust_payment_id)->pluck('payment')->toArray();
                                ?>
                                 {{ implode(", ", $payments ?? '') }}
                            </td>
                            @canany(['payment-accepted-edit','payment-accepted-delete'])
                                <td>
                                    <div class="btn-group">
                                        @can('payment-accepted-edit')
                                            <a href="{{route('customer-payment-method-index',['pay_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}" class="btn btn-secondary btn-sm">Edit</a>
                                        @endcan
                                        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            @can('payment-accepted-edit')
                                                <a class="dropdown-item btn-sm" href="{{route('customer-payment-method-index',['pay_id' => $list->id ?? '','cust_id' => $customer->id ?? ''])}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Edit</a>
                                            @endcan
                                            @can('payment-accepted-delete')
                                                <button class="dropdown-item btn-delete btn-sm" data-redirect-url="{{route('customer-payment-method-delete')}}" data-id="{{$list->id}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Delete</button>
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
