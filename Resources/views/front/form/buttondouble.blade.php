<?php 
    $id = array_get($attr, 'id', 'id');
    $id2 = array_get($attr, 'id2', 'id2');
    $label = array_get($attr, 'label', 'label');
    $button1type = array_get($attr, 'button1type', 'btn-primary');
    $button1label = array_get($attr, 'button1label', 'button1label');
    $typebutton1 = array_get($attr, 'typebutton1', 'button');
    $button2type = array_get($attr, 'button2type', 'btn-primary');
    $button2label = array_get($attr, 'button2label', 'button2label');
    $typebutton2 = array_get($attr, 'typebutton2', 'button');
?>
<div class="form-group">
  <label class="col-md-3 control-label" for="<?php echo $id ?>"><?php echo $label ?></label>
  <div class="col-lg-6">
	<button id="<?php echo $id ?>" type="<?php echo $typebutton1 ?>" class='btn <?php echo $button1type ?>'><?php echo $button1label ?></button>
	<button id="<?php echo $id2 ?>" type="<?php echo $typebutton2 ?>" class='btn <?php echo $button2type ?>'><?php echo $button2label ?></button>
  </div>
</div>

