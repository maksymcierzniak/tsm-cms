<?php
require_once(__TSM_ROOT__."modules/registration/BackEnd/views/sidebar.view.php");
?>
<style>
    .smallItem .title {
        cursor: pointer;
    }
</style>
<div class="span9">
    <h1>Teachers</h1>
      <span style="float: right; margin-top: -45px; right: 20px; position: relative;"><a
              href="index.php?mod=registration&view=teacher&action=addEditTeacher" class="addButton"
              title="Add a Teacher"></a></span>
  <?php
  foreach ($teachers as $teacher) {
    ?>
      <div class="smallItem well well-small">
          <a class="title"
             href="index.php?mod=registration&view=student&action=viewTeacher&teacher_id=<?php echo $teacher['teacher_id']; ?>"><?php echo $teacher['last_name'].", ".$teacher['first_name']; ?></a>
              <span class="buttons"><!--<a
                      href="index.php?mod=registration&view=teacher&action=viewTeacher&teacher_id=<?php echo $teacher['teacher_id']; ?>"
                      class="reviewButton" title="Review This Teacher"></a>--><a
                      href="index.php?mod=registration&view=teacher&action=addEditTeacher&teacher_id=<?php echo $teacher['teacher_id']; ?>"
                      class="editButton" title="Edit This Teacher"></a></span>

          <div class="itemDetails">
          </div>
      </div>
    <?php
  }
  ?>
</div>