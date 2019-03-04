<?php

namespace Drupal\mytest\Controller;
 
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\user\UserInterface;
use Drupal\node\NodeInterface;
 
class UpcastingController extends ControllerBase {
  public function content(NodeInterface $node) {
    $author = $node->getOwner();
    $author_name1 = $author->getUsername();
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello @author_name', array('@author_name' => $author_name1)),
    );
  }
}