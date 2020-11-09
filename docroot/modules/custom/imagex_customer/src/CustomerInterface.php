<?php

namespace Drupal\imagex_customer;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a Customer entity.
 */
interface CustomerInferface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
