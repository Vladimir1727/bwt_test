<?php
namespace bwt_test;
ini_set('display_errors', 1);
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
require_once 'service/bdtools.php';
require_once 'service/recaptchalib.php';
session_start();
Route::start();