<?php
require_once(__TSM_ROOT__."modules/registration/BackEnd/views/sidebar.view.php");
?>
<div class="span9">
    <input id="searchItems" rel="smallItem" class="search-query" style="float: right; position: relative; top: 10px;"
           value="Search..."/>

    <h1>Fee Conditions - <a class="btn btn-primary"
                            href="index.php?mod=registration&view=fees&action=addEditCondition" class="addButton"
                            title="Add a Condition">Add</a></h1>
    <span style="float: right; margin-top: -45px; right: 20px; position: relative;"></span>
  <?php
  if ($conditionsList) {
    foreach ($conditionsList as $condition) {
      ?>
        <div class="smallItem well well-small">
            <span class="title"><?php echo $condition['name']; ?></span>
                <span class="buttons"><a
                        href="index.php?mod=registration&view=fees&action=addEditCondition&fee_condition_id=<?php echo $condition['fee_condition_id']; ?>"
                        class="editButton" title="Edit This Condition"></a><a
                        href="index.php?mod=registration&view=fees&action=deleteFee&fee_id=<?php echo $condition['fee_condition_id']; ?>"
                        class="deleteButton" title="Delete Condition"></a><a
                        href="index.php?mod=registration&view=fees&action=addConditionToFees&fee_condition_id=<?php echo $condition['fee_condition_id']; ?>"
                        class="addButton fb" title="Add To Fees"></a></span>
        </div>
      <?php
    }
  }
  ?>
</div>