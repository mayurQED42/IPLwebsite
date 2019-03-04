<?php

namespace Drupal\myform\Controller;

use Drupal\Core\Controller\ControllerBase;

class MyController extends ControllerBase {
    public function content() {
        return [
          '#type' => 'markup',
          '#markup' => '<h1><b>' . $this->t('Hello, World!') . '</b>',
        ];
      }
}