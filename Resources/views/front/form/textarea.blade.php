<?php 
    $name = array_get($attr, 'name', 'name');
    $label = array_get($attr, 'label', 'label');
    $placeholder = array_get($attr, 'placeholder', $label);
    $required = array_get($attr, 'required', 0);
    $inputsize = array_get($attr, 'inputsize', 'col-md-6');
    $inputheight = array_get($attr, 'inputheight', '');
    $textarea = array_get($attr, 'textarea', '');
?>
<div class="form-group<?php if ($required) {
    ?> required-control<?php 
} ?>{{ $errors->has($name) ? ' has-error' : '' }}">
	<label class="col-md-3 control-label" for="<?php echo $name ?>"><?php echo $label ?></label>
	<div class="<?php echo $inputsize ?>">
		<textarea id="<?php echo $name ?>" name="<?php echo $name ?>" <?php if ($required) {
    ?> required <?php 
} ?> class="form-control <?php echo $inputheight ?>"><?php echo old($name, $textarea) ?></textarea>
	</div>
</div>
