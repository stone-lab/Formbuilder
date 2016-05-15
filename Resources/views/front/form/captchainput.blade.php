<?php 
    $name = array_get($attr, 'name', 'name');
    $label = array_get($attr, 'label', 'label');
    $placeholder = array_get($attr, 'placeholder', $label);
    $inputsize = array_get($attr, 'inputsize', 'col-md-6');
    $inputheight = array_get($attr, 'inputheight', '');
    $helptext = array_get($attr, 'helptext', '');
?>
<div class="form-group required-control {{ $errors->has($name) ? ' has-error' : '' }}">
  <label class="col-md-3 control-label" for="<?php echo $name ?>"><?php echo $label ?></label>
  <div class="<?php echo $inputsize ?>">
	<div class="captcha-image">
		<img id="captcha" src="/formbuilder/captcha" alt="CAPTCHA Image" />
	</div>
    <input id="<?php echo $name ?>" name="<?php echo $name ?>" value="{!! old($name) !!}" type="text" placeholder="<?php echo $placeholder ?>" class="form-control <?php echo $inputheight ?>" required/>
    <?php if ($helptext) {
    ?><p class="help-block"><?php echo $helptext ?></p><?php 
} ?>
  </div>
</div>
