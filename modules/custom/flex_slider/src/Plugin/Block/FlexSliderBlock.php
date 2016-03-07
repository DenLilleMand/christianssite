<?php
/**
 * Created by PhpStorm.
 * User: denlillemand
 * Date: 12/17/15
 * Time: 11:56 AM
 */

/**
 * @file
 * Contains \Drupal\flex_slider\Plugin\Block\FlexSliderBlock
 */

namespace Drupal\flex_slider\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Provides a block containing a flex slider
 *
 * @Block(
 *   id = "flex_slider",
 *   admin_label = "Flex slider",
 *   module = "flex_slider"
 * )
 */
class FlexSliderBlock extends BlockBase {
    /**
     * Builds and returns the renderable array for this block plugin.
     *
     * If a block should not be rendered because it has no content, then this
     * method must also ensure to return no content: it must then only return an
     * empty array, or an empty array with #cache set (with cacheability metadata
     * indicating the circumstances for it being empty).
     *
     * @return array
     *   A renderable array representing the content of the block.
     *
     * @see \Drupal\block\BlockViewBuilder
     */
    public function build() {
        return array(
            '#theme' => 'flex_slider_primary_page',
            '#attached' => array(
                'library' => array(
                    'flex_slider/flex-slider'
                ),
            ),
        );
    }





}
