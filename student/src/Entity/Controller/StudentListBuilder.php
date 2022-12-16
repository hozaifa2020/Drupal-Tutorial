<?php
namespace Drupal\student\Entity\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Url;
use Drupal\Core\Config\Entity;

/**
 * Provides a list controller for content_entity_student entity.
 *
 * @ingroup student
 */
class StudentListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   *
   * We override ::render() so that we can add our own content above the table.
   * parent::render() is where EntityListBuilder creates the table using our
   * buildHeader() and buildRow() implementations.
   */
  public function render() {
    $build['description'] = array(
      '#markup' => $this->t('You can manage the fields on the <a href="@adminlink">student admin page</a>.', array(
        '@adminlink' => \Drupal::urlGenerator()
          ->generateFromRoute('student.student_settings'),
      )),
    );
    $build['table'] = parent::render();
    return $build;
  }

  /**
   * {@inheritdoc}
   *
   * Building the header and content lines for the student list.
   *
   * Calling the parent::buildHeader() adds a column for the possible actions
   * and inserts the 'edit' and 'delete' links as defined for the entity type.
   */
  public function buildHeader() {
    $header['id'] = $this->t('Roll Number');
    $header['name'] = $this->t('Name');
    $header['class'] = $this->t('Student Class');
    $header['contact'] = $this->t('Contact Number');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row['id'] = $entity->id();
    $row['name'] = $entity->name->value;
    $row['class'] = $entity->class->value;
	$row['contact'] = $entity->contact->value;
    return $row + parent::buildRow($entity);
}

}

?>
