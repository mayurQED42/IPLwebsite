<?php

namespace Drupal\mytest\Controller;

use Drupal\Core\Controller\ControllerBase;

class SimpleController extends ControllerBase {
    public function content() {
        return [
          '#type' => 'markup',
          '#markup' => '<h1><b>' . $this->t('Hello, World!') . '</b>',
        ];
      }
}