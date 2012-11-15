<?php
require_once(__TSM_ROOT__."admin/views/registration/sidebar.view.php");
?>

<div class="contentWithSideBar">
  <h1><?php echo $pageTitle; ?></h2>
  <?php foreach($feeConditions as $condition){ ?>
    <div class="smallItem">
      <span class="title"><?php echo $condition['name']; ?></span>
      <span class="buttons">
      <a href="index.php?com=registration&view=programs&action=addCondition&program_id=<?php echo $program_id; ?>&addCondition=<?php echo $condition['fee_condition_id']; ?>&fee_id=<?php echo $fee_id; ?>" class="addButton24" title="Add to <?php echo $feeName; ?>"></a>
      </span>
    </div>  
  <?php } ?>
</div>
<script type="text/javascript">
$(document).ready( function(){
  $(".addButton24").click( function(){
    $.get($(this).attr('href'),function(data){
      if(data == "0"){
        alert("There was an error adding the fee condition. It may already be added to <?php echo $feeName; ?>.");
        parent.window.location.reload();
      } else {
        parent.window.location.reload();
      }
    });
    
    return false;
  });
  $("#searchField").focus(function(){
    if($(this).val() == "Search..."){
      $(this).val('');
    }
  }).blur( function(){
    if($(this).val() == ""){
      $(this).val('Search...');
    }
  });
});
</script>