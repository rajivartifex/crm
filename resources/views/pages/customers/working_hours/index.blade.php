<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Working Hours</h3>
            </div>
            <form class="business-web-form">
            <div class="card-body">
                <?php foreach(['monday'=>'Monday','tuesday'=>'Tuesday','wednesday'=>'Wednesday','thursday'=>'Thursday','friday'=>'Friday','saturday'=>'Saturday','sunday'=>'Sunday'] as $k => $v): ?>
                <div class="row xui-sec-opening">
                    <div class="col form-group mb-3">
                        <div class="input-group input-group-sm" id="id-field-opening[<?=$k?>]">
                            <span class="input-group-text" style="width:100px"><?=$v?></span>
                            <select id="id-field-opening[<?=$k?>][state]" name="opening[<?=$k?>][state]" class="form-control xui-field-opening xui-on-form_updated" aria-label="Openings">
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                                <option value="multi">Multi</option>
                            </select>
                            <?php if($k == 'monday'): ?>
                                <button type="button" class="btn btn-outline-secondary xui-act-apply_all">Apply All</button>
                            <?php endif ?>
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
<?php endforeach; ?>

            </div>
            </form>
        </div>
    </div>
</div>


{{-- <div class="row mt-3">
    <h4>Working Hours</h4>
    <hr/>
</div> --}}
