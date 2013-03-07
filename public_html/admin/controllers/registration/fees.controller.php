<?php
if (!isset($action)) {
  $action = null;
}

switch ($action) {
  case null:
    $feesList = $currentCampus->getFees();
    $activeView = __TSM_ROOT__."admin/views/registration/fees.view.php";
    break;
  case "addEditFee":
    require_once(__TSM_ROOT__."admin/controllers/registration/addEdit.fees.controller.php");
    $activeView = __TSM_ROOT__."admin/views/registration/addEdit.fees.view.php";
    break;
  case "quickbooksInfo":
    require_once(__TSM_ROOT__."admin/controllers/registration/fee/quickbooksInfo.fee.controller.php");
    $activeView = __TSM_ROOT__."admin/views/registration/fee/quickbooksInfo.fee.view.php";
    break;
  case "conditions":
    $conditionsList = $currentCampus->getFeeConditions();
    $activeView = __TSM_ROOT__."admin/views/registration/conditions.fees.view.php";
    break;
  case "paymentPlans":
    $paymentPlans = $currentCampus->getPaymentPlans();
    foreach ($paymentPlans as $paymentPlan) {
      $paymentPlanObject = new TSM_REGISTRATION_PAYMENT_PLAN($paymentPlan['payment_plan_id']);
      $paymentPlans[$paymentPlan['payment_plan_id']]['num_families'] = $paymentPlanObject->getNumFamilies();
    }
    $activeView = __TSM_ROOT__."admin/views/registration/paymentPlans.fees.view.php";
    break;
  case "addEditPaymentPlan":
    require_once(__TSM_ROOT__."admin/controllers/registration/addEdit.paymentPlan.fees.controller.php");
    $activeView = __TSM_ROOT__."admin/views/registration/addEdit.paymentPlan.fees.view.php";
    break;
  case "addEditCondition":
    require_once(__TSM_ROOT__."admin/controllers/registration/addEditConditions.controller.php");
    $activeView = __TSM_ROOT__."admin/views/registration/addEditCondition.fees.view.php";
    break;
  case "getConditionForm":
    require_once(__TSM_ROOT__."admin/controllers/registration/conditionForm.fees.controller.php");
    break;
  case "addConditionToFees":
    require_once(__TSM_ROOT__."admin/controllers/registration/addToFees.conditions.fees.controller.php");
    $activeView = __TSM_ROOT__."admin/views/registration/addToFees.conditions.fees.view.php";
    break;
}

?>