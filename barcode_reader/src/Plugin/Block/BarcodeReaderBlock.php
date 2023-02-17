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
    $node = \Drupal::routeMatch()->getParameter('node');
   if ($node instanceof \Drupal\node\NodeInterface) {
      $nid = $node->id();
	  $node = \Drupal\node\Entity\Node::load($nid);
	  $product_url = $node->field_product_url->uri;
    }	
	$build['#prefix'] = 'To Purchase this product on your app to avail exclusive app-only';
     $build['barcode_reader_block']['#markup'] = "
						<img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$product_url&choe=UTF-8'>";

    return $build;
  }

}
