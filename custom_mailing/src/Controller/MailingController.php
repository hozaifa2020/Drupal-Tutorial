<?php

namespace Drupal\custom_mailing\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * An example controller.
 */
class MailingController extends ControllerBase {

  /**
   * Returns a render-able array for a test page.
   */
  public function content() {

    $config = \Drupal::config('custom_mailing.settings');
    $config->get('custome_email');



    $build = [
      '#markup' => $config->get('custome_email'),
    ];
    return $build;
  }
}
