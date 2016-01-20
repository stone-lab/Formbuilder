<?php 
    $name = array_get($attr, 'name', 'name');
    $label = array_get($attr, 'label', 'label');
    $values = array_get($attr, 'values');
    $values = explode('; ', $values);
?>
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
  <label class="col-md-3 control-label" for="<?php echo $name ?>"><?php echo $label ?></label>
  <div class="col-lg-6">
	<?php $i = 1; foreach ($values as $value): ?>
		<?php if (trim($value)): ?>
		<div class="checkbox">
		<label for="<?php echo $name . '-' . $i ?>">
		  <input type="checkbox" name="<?php echo $name ?>" id="<?php echo $name . '-' . $i ?>" value="<?php echo $value ?>">
		  <?php echo $value ?>
		</label>
		</div>
		<?php endif; ?>
	<?php ++$i; endforeach; ?>
  </div>
</div>
