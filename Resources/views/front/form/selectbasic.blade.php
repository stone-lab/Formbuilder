<?php 
    $name = array_get($attr, 'name', 'name');
    $label = array_get($attr, 'label', 'label');
    $inputsize = array_get($attr, 'inputsize', 'col-md-6');
    $inputheight = array_get($attr, 'inputheight', '');
    $values = array_get($attr, 'values');
    $values = explode('; ', $values);
?>
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
  <label class="col-md-3 control-label" for="<?php echo $name ?>"><?php echo $label ?></label>
  <div class="<?php echo $inputsize ?>">
	 <select id="<?php echo $name ?>" name="<?php echo $name ?>" class="form-control <?php echo $inputheight ?>">
		<?php $i = 1; foreach ($values as $value): ?>
			<?php if (trim($value)): ?>
			<option value="<?php echo $value ?>"><?php echo $value ?></option>
			<?php endif; ?>
		<?php ++$i; endforeach; ?>
	</select>
  </div>
</div>
