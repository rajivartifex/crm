<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title text-bold"></h2>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{route('enum-payment-form')}}" class="btn btn-sm btn-secondary" type="button">Add Payment Type</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="business-payment-type-tbl" class="table table-bordered table-striped" style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Payment Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $k => $payment)
                        <tr>
                            <td>{{$k+1}}</td>
                            <td><span class="badge badge-primary"> {{$payment->payment ?? ''}}</span> </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('enum-payment-form',['pay_id' => $payment->id ?? ''])}}" class="btn btn-secondary btn-sm">Edit</a>
                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{route('enum-payment-form',['pay_id' => $payment->id ?? ''])}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Edit</a>
                                        <button class="dropdown-item btn-delete" data-redirect-url="{{route('enum-payment-delete')}}" data-id="{{$payment->id}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
