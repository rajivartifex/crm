<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Social Media</h3>
            </div>
            <form class="business-web-form">
            <div class="card-body">
                <input type="hidden" name="ff[cust_id]" value="{{$customer->id ?? ''}}" />
                @if(count($custWebs) > 0)
                    @foreach($custWebs as $key => $list)
                        <div class="col-sm-12">
                            <div class="row web_link_wrapper align-items-end">
                                <input type="hidden" name="ff[web_id]" class="web_id" value="{{$list->id}}" />
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Media Name</label>
                                        <input type="text" class="form-control form-control-sm" name="ff[cust_media_name]" value="{{$list->cust_media_name ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Media Link</label>
                                        <input type="text" class="form-control form-control-sm" name="ff[cust_media_link]" value="{{$list->cust_media_link ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <input type="hidden" class="web_delete" name="web_delete">
                                        <button type="button" class="btn btn-sm btn-danger" data-id="{{$list->id ?? ''}}" onclick="$(this).specialDelete();"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                <?php $arr = ["Facebook", "Twitter","Linkedin","Instagram","Youtube"]; ?>
                    @for($i=0; $i<=4; $i++)
                        <div class="col-sm-12">
                            <div class="row web_link_wrapper align-items-end">
                                <input type="hidden" name="ff[web_id]" class="web_id" value="0" />
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Media Name</label>
                                        <input type="text" class="form-control form-control-sm" name="ff[cust_media_name]" value="{{$arr[$i]}}">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Media Link</label>
                                        <input type="text" class="form-control form-control-sm" name="ff[cust_media_link]">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <input type="hidden" class="web_delete" name="web_delete">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endif
                <div class="col-sm-12">
                    <div class="media_link_dynamic"></div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <a class="btn-sm btn btn-secondary add_web_link_btn float-right"><i class="fas fa-plus"></i> Social Media</a>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn-sm btn btn-secondary">Submit</button>
                <a href="{{route('customer-add-index',['cust_id' => $customer->id ?? ''])}}" class="btn-sm btn btn-default">Back</a>
            </div>
        </form>
        </div>
    </div>
</div>
