<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Working Hours</h3>
            </div>
            <form class="working-hours">
                <input type="hidden" name="ff[cust_id]" value="{{$customer->id ?? ''}}" />
                <input type="hidden" name="ff[working_hours_id]" value="{{$workingHours->id ?? ''}}" />
                <div class="card-body">
                    @if($workingHours)
                        <?php foreach(json_decode($workingHours['cust_working_hours']) as $k => $v): ?>
                            <div class="row xui-sec-opening">
                                <div class="col form-group mb-3">
                                    <div class="input-group input-group-sm" id="id-field-opening[<?=$v->state?>]">
                                        <span class="input-group-text" style="width:120px"><?=$k?></span>
                                        <select id="id-field-opening[<?=$v->state?>][state]" name="opening[<?=$k?>][state]" class="form-control xui-field-opening xui-on-form_updated" aria-label="Openings">
                                            <option value="open" {{$v->state == "open" ? 'selected' : ''}}>Open</option>
                                            <option value="closed" {{$v->state == "closed" ? 'selected' : ''}}>Closed</option>
                                            <option value="multi" {{$v->state == "multi" ? 'selected' : ''}}>Multi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col form-group mb-3">
                                    <div class="input-group input-group-sm xui-mk xui-mk-0" id="id-field-opening[<?=$k?>][0]" style="display: none">
                                        <span class="input-group-text">From</span>
                                        <input type="time" id="id-field-opening[<?=$v->state?>][0][from]" name="opening[<?=$k?>][0][from]" class="form-control xui-mk-from mr-2" value="{{$v->{0}->from}}">
                                        <span class="input-group-text">Till</span>
                                        <input type="time" id="id-field-opening[<?=$v->state?>][0][till]" name="opening[<?=$k?>][0][till]" class="form-control xui-mk-till" value="{{$v->{0}->till}}">
                                    </div>
                                </div>
                                <div class="col form-group mb-3">
                                    <div class="input-group input-group-sm xui-mk xui-mk-1" id="id-field-opening[<?=$k?>][1]" style="display: none">
                                        <span class="input-group-text">From</span>
                                        <input type="time" id="id-field-opening[<?=$v->state?>][1][from]" name="opening[<?=$k?>][1][from]" class="form-control xui-mk-from mr-2" value="{{$v->{1}->from}}">
                                        <span class="input-group-text">Till</span>
                                        <input type="time" id="id-field-opening[<?=$v->state?>][1][till]" name="opening[<?=$k?>][1][till]" class="form-control  xui-mk-till" value="{{$v->{1}->till}}">
                                    </div>
                                </div>
                            </div>
                            @can('working-hours-edit')
                                <?php if($k == 'monday'): ?>
                                    <button type="button" class="btn btn-outline-secondary xui-act-apply_all">Apply All</button>
                                <?php endif ?>
                            @endcan
                        <?php endforeach; ?>
                    @else
                        <?php foreach(['monday'=>'monday','tuesday'=>'tuesday','wednesday'=>'wednesday','thursday'=>'thursday','friday'=>'friday','saturday'=>'saturday','sunday'=>'sunday'] as $k => $v): ?>
                            <div class="row xui-sec-opening">
                                <div class="col form-group mb-3">
                                    <div class="input-group input-group-sm" id="id-field-opening[<?=$k?>]">
                                        <span class="input-group-text" style="width:100px"><?=$v?></span>
                                        <select id="id-field-opening[<?=$k?>][state]" name="opening[<?=$k?>][state]" class="form-control xui-field-opening xui-on-form_updated" aria-label="Openings">
                                            <option value="open">Open</option>
                                            <option value="closed">Closed</option>
                                            <option value="multi">Multi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col form-group mb-3">
                                    <div class="input-group input-group-sm xui-mk xui-mk-0" id="id-field-opening[<?=$k?>][0]" style="display:none">
                                        <span class="input-group-text">From</span>
                                        <input type="time" id="id-field-opening[<?=$k?>][0][from]" name="opening[<?=$k?>][0][from]" class="form-control xui-mk-from" placeholder="" aria-label="">
                                        <span class="input-group-text">Till</span>
                                        <input type="time" id="id-field-opening[<?=$k?>][0][till]" name="opening[<?=$k?>][0][till]" class="form-control xui-mk-till" placeholder="" aria-label="">
                                    </div>
                                </div>
                                <div class="col form-group mb-3">
                                    <div class="input-group input-group-sm xui-mk xui-mk-1" id="id-field-opening[<?=$k?>][1]" style="display:none">
                                        <span class="input-group-text">From</span>
                                        <input type="time" id="id-field-opening[<?=$k?>][1][from]" name="opening[<?=$k?>][1][from]" class="form-control xui-mk-from" placeholder="" aria-label="">
                                        <span class="input-group-text">Till</span>
                                        <input type="time" id="id-field-opening[<?=$k?>][1][till]" name="opening[<?=$k?>][1][till]" class="form-control  xui-mk-till" placeholder="" aria-label="">
                                    </div>
                                </div>
                            </div>
                            @can('working-hours-edit')
                                <?php if($k == 'monday'): ?>
                                    <button type="button" class="btn btn-outline-secondary xui-act-apply_all">Apply All</button>
                                <?php endif ?>
                            @endcan
                        <?php endforeach; ?>
                    @endif
                </div>
                <div class="card-footer">
                    @can('working-hours-edit')
                        <button type="submit" class="btn-sm btn btn-secondary">Submit</button>
                    @endcan
                    <a href="{{route('customer-add-index',['cust_id' => $customer->id ?? ''])}}" class="btn-sm btn btn-default">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
