<?php

namespace Drupal\myform\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;

/**
 * Provides a 'custom form' block.
 *
 * @Block(
 *   id = "my_block",
 *   admin_label = @Translation("My Customblock"),
 *   category = @Translation("Custom block example")
 * )
 */

class MyBlock extends BlockBase{
    public function build() {
        $form = \Drupal::formBuilder()->getForm('Drupal\myform\Form\SimpleForm');
        return $form;
    }
}