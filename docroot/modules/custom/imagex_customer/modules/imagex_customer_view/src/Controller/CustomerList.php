<?php

namespace Drupal\imagex_customer_view\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\views\Views;

/**
 * Defines CustomerList class.
 */
class CustomerList extends ControllerBase {

  /**
   * Render the Customer List view, filtering based on cid provided.
   *
   * @param cid
   *  ID Value of a customer entity, defaults to 'all'
   * @return array
   *  Return markup array.
   */
  public function content($cid) {

    $view = Views::getView('customers');

    //Check if view exists on site, set arugment to current cid
    if (is_object($view)) {
      $view->setDisplay('default');
      $view->setArguments([$cid]);
      $view->preExecute();
      $view->execute();
      $content = $view->buildRenderable();

      return $content;
    } else {
      return [
        '#markup' => t('The customer view does not exist on the site.'),
      ];
    }

  }

}
