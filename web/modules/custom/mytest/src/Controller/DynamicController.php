<?php

namespace Drupal\mytest\Controller;
 
use Drupal\Core\Controller\ControllerBase;
 
class DynamicController extends ControllerBase {
  public function content($name) {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello @name', array('@name' => $name)),
    );
  }
}