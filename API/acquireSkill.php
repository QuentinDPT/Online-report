<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST')
{
  header('Location: ' . $LOCATION . '/');
  exit;
}

session_start();

if ( !isset($_POST['nbobs']) || !isset($_POST['status']) || !isset($_POST['UID']) || !isset($_POST['SkID']) )
{
  exit;
}

require_once $ROOT . "/Controllers/SkillAcquireController.php" ;

SkillAcquireController::acquireSkill($_POST['UID'], $_POST['SkID'], $_POST['status'], $_POST['nbobs'], !isset($_POST['note']) ? "" : $_POST['note']) ;
