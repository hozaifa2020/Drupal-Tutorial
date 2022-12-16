<?php
namespace Drupal\result;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a Result entity.
 * @ingroup result
 */
interface ResultInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
?>