<?php
namespace Drupal\student;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a Student entity.
 * @ingroup student
 */
interface StudentInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
?>