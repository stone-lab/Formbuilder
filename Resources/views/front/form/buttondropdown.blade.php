<?php 
    $name = array_get($attr, 'name', 'name');
    $label = array_get($attr, 'label', 'label');
    $placeholder = array_get($attr, 'placeholder', $label);
    $required = array_get($attr, 'required', 0);
    $inputsize = array_get($attr, 'inputsize', 'col-md-6');
    $inputheight = array_get($attr, 'inputheight', '');
    $helptext = array_get($attr, 'helptext', '');
    $buttontext = array_get($attr, 'buttontext', '');
    $buttonoptions = array_get($attr, 'buttonoptions');
    $buttonoptions = explode('; ', $buttonoptions);
?>
<div class="form-group<?php if ($required) {
    ?> required-control<?php 
} ?>{{ $errors->has($name) ? ' has-error' : '' }}">
  <label class="col-md-3 control-label" for="<?php echo $name ?>"><?php echo $label ?></label>
  <div class="<?php echo $inputsize ?>">
    <div class="input-group">
		<input id="<?php echo $name ?>" value="{!! old($name) !!}" name="<?php echo $name ?>" type="text" placeholder="<?php echo $placeholder ?>" class="form-control <?php echo $inputheight ?>" <?php if ($required) {
    ?> required <?php 
} ?> />
		<div class="input-group-btn">
			<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			  <?php echo $buttontext ?>
			  <span class="caret"></span>
			</button>
			<ul class="dropdown-menu pull-right">
				<?php foreach ($buttonoptions as $value): ?>
					<?php if (trim($value)): ?>
					<li><a href="#"><?php echo $value ?></a></li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
  </div>
</div>
