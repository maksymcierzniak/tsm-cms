<?php
$programs = $currentCampus->getPrograms();
if (isset($programs)) {
  foreach ($programs as $program) {
    $programObject = new TSM_REGISTRATION_PROGRAM($program['program_id']);
    $programs[$program['program_id']]['courses'] = $programObject->getCourses();
  }
}
$studentColumns = $tsm->getColumnsFor("tsm_reg_students");

if (isset($generateReport)) {
  $programs = Array();
  foreach ($_POST as $key => $value) {
    if ($key == "programs") {
      foreach ($value as $key2 => $program_id) {
        $programs[$program_id] = Array();
      }
    } elseif (stristr($key, ":courses")) {
      $array = explode(":", $key);
      $program_id = $array[1];
      if (!isset($programs[$program_id])) {
        $programs[$program_id] = Array();
      }
      foreach ($value as $course_id) {
        array_push($programs[$program_id], $course_id);
      }
      //echo $program_id."<br />";

    }
  }
  $students = $currentCampus->getStudents();
  foreach ($students as $student) {
    $studentObject = new TSM_REGISTRATION_STUDENT($student['student_id']);
    foreach ($programs as $program_id => $courses) {
      if (!$studentObject->inProgram($program_id)) {
        unset($students[$student['student_id']]);
      } else {
        foreach ($courses as $course_id) {
          if (!$studentObject->inCourse($course_id)) {
            unset($students[$student['student_id']]);
          }
        }
      }
    }

    if ($grade_1 != null) {
      if (!($student['grade'] >= $grade_1)) {
        unset($students[$student['student_id']]);
      }
    }

    if ($grade_2 != null) {
      if (!($student['grade'] <= $grade_2)) {
        unset($students[$student['student_id']]);
      }
    }

    if ($student_status != null) {
      if ($student['approved'] != $student_status) {
        unset($students[$student['student_id']]);
      }
    }

    if (isset($students[$student['student_id']])) {
      $family = new TSM_REGISTRATION_FAMILY($student['family_id']);
      $familyInfo = $family->getInfo();

      $students[$student['student_id']] = array_merge($student, $familyInfo);
      ;
    }

  }

  $tsm->arrayToCSV($students, $campusInfo['name']." - Custom Report");
  //print_r($_POST);
  //die();
}
?>