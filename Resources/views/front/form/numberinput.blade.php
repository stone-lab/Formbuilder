<?php 
    $name = array_get($attr, 'name', 'name');
    $label = array_get($attr, 'label', 'label');
    $placeholder = array_get($attr, 'placeholder', $label);
    $required = array_get($attr, 'required', 0);
    $inputsize = array_get($attr, 'inputsize', 'col-md-6');
    $inputheight = array_get($attr, 'inputheight', '');
    $helptext = array_get($attr, 'helptext', '');
    $min = array_get($attr, 'min');
    $max = array_get($attr, 'max');
?>
<div class="form-group<?php if ($required) {
    ?> required-control<?php 
} ?>{{ $errors->has($name) ? ' has-error' : '' }}">
  <label class="col-md-3 control-label" for="<?php echo $name ?>"><?php echo $label ?></label>
  <div class="<?php echo $inputsize ?>">
    <input id="<?php echo $name ?>" value="{!! old($name) !!}" name="<?php echo $name ?>" type="number" <?php if ($min) {
    ?>min="<?php echo $min ?>"<?php 
} ?> <?php if ($max) {
    ?>max="<?php echo $max ?>"<?php 
} ?> placeholder="<?php echo $placeholder ?>" class="form-control <?php echo $inputheight ?>" <?php if ($required) {
    ?> required <?php 
} ?> />
    <?php if ($helptext) {
    ?><p class="help-block"><?php echo $helptext ?></p><?php 
} ?>
  </div>
</div>
