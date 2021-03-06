<?php
require_once(__TSM_ROOT__."modules/registration/BackEnd/views/sidebar.view.php");
?>

<div class="span9">
    <input id="searchItems" rel="smallItem" class="search-query" style="float: right; position: relative; top: 10px;"
           value="Search..."/>

    <h1><?php echo $pageTitle; ?></h1>
  <?php foreach ($feeConditions as $condition) { ?>
    <div class="smallItem well well-small">
        <span class="title"><?php echo $condition['name']; ?></span>
      <span class="buttons">
      <a href="index.php?mod=registration&view=courses&action=addCondition&course_id=<?php echo $course_id; ?>&addCondition=<?php echo $condition['fee_condition_id']; ?>&fee_id=<?php echo $fee_id; ?>&program_id=<?php echo $program_id; ?>"
         class="addButton24" title="Add to <?php echo $feeName; ?>"></a>
      </span>
    </div>
  <?php } ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".addButton24").click(function () {
            $.get($(this).attr('href'), function (data) {
                if (data == "0") {
                    alert("There was an error adding the fee condition. It may already be added to <?php echo $feeName; ?>.");
                    parent.window.location.reload();
                } else {
                    parent.window.location.reload();
                }
            });

            return false;
        });
        $("#searchField").focus(function () {
            if ($(this).val() == "Search...") {
                $(this).val('');
            }
        }).blur(function () {
                    if ($(this).val() == "") {
                        $(this).val('Search...');
                    }
                });
    });
</script>