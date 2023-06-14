<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Business Identity</h3>
    </div>
    <form class="business-identity-form">
        <input type="hidden" name="ff[cust_id]" value="{{$customer->id ?? ''}}" />
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Business Name *</label>
                        <input type="text" name="ff[cust_business_name]" class="form-control form-control-sm" value="{{$customer->cust_business_name ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Country this business is based in *</label>
                        <input type="text" name="ff[cust_business_country]" class="form-control form-control-sm" value="{{$customer->cust_business_country ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Business Telephone *</label>
                        <input type="text" name="ff[cust_business_telephone]" class="form-control form-control-sm" value="{{$customer->cust_business_telephone ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Business Website *</label>
                        <input type="text" name="ff[cust_business_website]" class="form-control form-control-sm" value="{{$customer->cust_business_website ?? ''}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary business-identity-submit">Submit</button>
            <button type="#" class="btn btn-secondary">Back</button>
        </div>
    </form>
</div>
@section('script')
@endsection
@section('bottom-js')
@include('pages.customers.profile_section.bus_identity.script')
@endsection
