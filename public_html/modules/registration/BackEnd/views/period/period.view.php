<?php
require_once(__TSM_ROOT__."modules/registration/BackEnd/views/sidebar.view.php");
?>
<div class="span9">
    <h1>Periods</h1>
        <span style="float: right; margin-top: -45px; right: 20px; position: relative;"><a
                href="index.php?mod=registration&view=periods&action=addEditPeriod" class="addButton"
                title="Add a Period"></a></span>
  <?php
  if ($periods) {
    foreach ($periods as $period) {
      ?>
        <div class="smallItem well well-small">
            <span class="title"><?php echo $reg->displayPeriod($period); ?></span>
                <span class="buttons"><a
                        href="index.php?mod=registration&view=periods&action=addEditPeriod&period_id=<?php echo $period['period_id']; ?>"
                        class="editButton" title="Edit This Period"></a><a
                        href="index.php?mod=registration&view=periods&action=deletePeriod&period_id=<?php echo $period['period_id']; ?>"
                        class="deleteButton" title="Delete Period"></a></span>
        </div>
      <?php
    }
  }
  ?>
</div>