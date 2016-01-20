<?php 
    $name = array_get($attr, 'name', 'name');
    $label = array_get($attr, 'label', 'label');
    $placeholder = array_get($attr, 'placeholder', $label);
    $required = array_get($attr, 'required', 0);
    $inputsize = array_get($attr, 'inputsize', 'col-md-6');
    $inputheight = array_get($attr, 'inputheight', '');
    $helptext = array_get($attr, 'helptext', '');
    $checked = array_get($attr, 'checked', 0);
?>
<div class="form-group<?php if ($required) {
    ?> required-control<?php 
} ?>{{ $errors->has($name) ? ' has-error' : '' }}">
  <label class="col-md-3 control-label" for="<?php echo $name ?>"><?php echo $label ?></label>
  <div class="<?php echo $inputsize ?>">
    <div class="input-group">
		<span class="input-group-addon">
			<input type="checkbox" <?php if ($checked == 'true') {
    ?>checked="checked"<?php 
} ?>>
		</span>
		<input id="<?php echo $name ?>" name="<?php echo $name ?>" value="{!! old($name) !!}" type="text" placeholder="<?php echo $placeholder ?>" class="form-control <?php echo $inputheight ?>" <?php if ($required) {
    ?> required <?php 
} ?> />
	</div>
  </div>
</div>
