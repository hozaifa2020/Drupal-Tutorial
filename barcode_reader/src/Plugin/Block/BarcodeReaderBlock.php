<?php

namespace Drupal\barcode_reader\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
/**
 * Provides a 'BarcodeReaderBlock' block.
 *
 * @Block(
 *  id = "barcode_reader_block",
 *  admin_label = @Translation("Barcode reader block"),
 * )
 */
class BarcodeReaderBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#theme'] = 'barcode_reader_block';
    $url = '';
    $node = \Drupal::routeMatch()->getParameter('node');
      if ($node instanceof \Drupal\node\NodeInterface) {
      if($node->hasField('field_product_url') && !$node->get('field_product_url')->isEmpty()){
        $url = $node->get('field_product_url')->getValue()[0]['uri'];
      }

    }


	
	  $build['#prefix'] = 'To Purchase this product on your app to avail exclusive app-only';
     $build['barcode_reader_block']['#markup'] = "
						<img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$url&choe=UTF-8'>";

       return $build;
	
  }
   public function getCacheMaxAge() {
    return 0;
   }

}
