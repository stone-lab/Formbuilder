<?php 
    $name = array_get($attr, 'name', 'name');
    $label = array_get($attr, 'label', 'label');
    $placeholder = array_get($attr, 'placeholder', $label);
    $required = array_get($attr, 'required', 0);
    $inputsize = array_get($attr, 'inputsize', 'col-md-6');
    $inputheight = array_get($attr, 'inputheight', '');
    $helptext = array_get($attr, 'helptext', '');
    $prepend = array_get($attr, 'prepend', $label);
?>
<div class="form-group<?php if ($required) {
    ?> required-control<?php 
} ?>{{ $errors->has($name) ? ' has-error' : '' }}">
  <label class="col-md-3 control-label" for="<?php echo $name ?>"><?php echo $label ?></label>
  <div class="<?php echo $inputsize ?>">
    <div class="input-group">
      <span class="input-group-addon"><?php echo $prepend ?></span>
      <input id="<?php echo $name ?>" name="<?php echo $name ?>" value="{!! old($name) !!}" type="text" placeholder="<?php echo $placeholder ?>" class="form-control <?php echo $inputheight ?>" <?php if ($required) {
    ?> required <?php 
} ?> />
    </div>
    <?php if ($helptext) {
    ?><p class="help-block"><?php echo $helptext ?></p><?php 
} ?>
  </div>
</div>
