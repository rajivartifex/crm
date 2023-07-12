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
                    {{-- {{dd(json_decode($workingHours['cust_working_hours']))}} --}}
                    <?php //foreach(['monday'=>'Monday','tuesday'=>'Tuesday','wednesday'=>'Wednesday','thursday'=>'Thursday','friday'=>'Friday','saturday'=>'Saturday','sunday'=>'Sunday'] as $k => $v): ?>
                    <?php foreach(json_decode($workingHours['cust_working_hours']) as $k => $v): ?>
                        <div class="row xui-sec-opening">
                            <div class="col form-group mb-3">
                                <div class="input-group input-group-sm" id="id-field-opening[<?=$k?>]">
                                    <span class="input-group-text" style="width:100px"><?=$k?></span>
                                    <select id="id-field-opening[<?=$v->state?>][state]" name="opening[<?=$v->state?>][state]" class="form-control xui-field-opening xui-on-form_updated" aria-label="Openings">
                                        <option value="open" {{$v->state == "open" ? 'selected' : ''}}>Open</option>
                                        <option value="closed" {{$v->state == "closed" ? 'selected' : ''}}>Closed</option>
                                        <option value="multi" {{$v->state == "multi" ? 'selected' : ''}}>Multi</option>
                                    </select>
                                    <?php if($k == 'monday'): ?>
                                        <button type="button" class="btn btn-outline-secondary xui-act-apply_all">Apply All</button>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="col form-group mb-3">
                                <div class="input-group input-group-sm xui-mk xui-mk-0" id="id-field-opening[<?=$k?>][0]" style="display:none">
                                    <span class="input-group-text">From</span>
                                    <input type="time" id="id-field-opening[<?=$v?>][0][from]" name="opening[<?=$v?>][0][from]" class="form-control xui-mk-from" placeholder="" aria-label="">
                                    <span class="input-group-text">Till</span>
                                    <input type="time" id="id-field-opening[<?=$v?>][0][till]" name="opening[<?=$v?>][0][till]" class="form-control xui-mk-till" placeholder="" aria-label="">
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
                    <?php endforeach; ?>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn-sm btn btn-secondary">Submit</button>
                    <a href="{{route('customer-add-index',['cust_id' => $customer->id ?? ''])}}" class="btn-sm btn btn-default">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
