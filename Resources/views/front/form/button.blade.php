<?php 
    $id = array_get($attr, 'id', 'id');
    $label = array_get($attr, 'label', 'label');
    $typebutton = array_get($attr, 'typebutton', 'button');
    $buttontype = array_get($attr, 'buttontype', 'btn-primary');
    $buttonlabel = array_get($attr, 'buttonlabel', 'buttonlabel');
?>
<div class="form-group">
  <label class="col-md-3 control-label" for="<?php echo $id ?>"><?php echo $label ?></label>
  <div class="col-lg-6">
    <button id="<?php echo $id ?>" type="<?php echo $typebutton ?>" class='btn <?php echo $buttontype ?>'><?php echo $buttonlabel ?></button>
  </div>
</div>
