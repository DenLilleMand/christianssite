<?php
/**
 * Created by PhpStorm.
 * User: denlillemand
 * Date: 12/14/15
 * Time: 5:11 PM
 */

/**
 * @file
 * Contains \Drupal\hello_world\Plugin\Block\HelloWorldBlock1
 */

namespace Drupal\hello_world\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Provides a simple block.
 *
 * @Block(
 *   id = "hello_world_block1",
 *   admin_label = "Hello World Block1",
 *   module = "hello_world"
 * )
 */
class HelloWorldBlock extends BlockBase {

    /**
     * Implements \Drupal\block\BlockBase::blockBuild();
     */
    public function build() {
        return array(
            '#theme' => 'hello_world_primary_page',
            '#attached' => array(
                'library' => array(
                    'hello_world/hello-world',
                ),
            ),
        );
    }

    /**
     * Indicates whether the block should be shown.
     *
     * This method allows base implementations to add general access restrictions
     * that should apply to all extending block plugins.
     *
     * @param \Drupal\Core\Session\AccountInterface $account
     *   The user session for which to check access.
     * @param bool $return_as_object
     *   (optional) Defaults to FALSE.
     *
     * @return bool|\Drupal\Core\Access\AccessResultInterface
     *   The access result. Returns a boolean if $return_as_object is FALSE (this
     *   is the default) and otherwise an AccessResultInterface object.
     *   When a boolean is returned, the result of AccessInterface::isAllowed() is
     *   returned, i.e. TRUE means access is explicitly allowed, FALSE means
     *   access is either explicitly forbidden or "no opinion".
     *
     * @see \Drupal\block\BlockAccessControlHandler
     */
    public function access(AccountInterface $account, $return_as_object = FALSE)
    {
        return AccessResult::allowedIfHasPermission($account, 'access content');
    }


    /**
     * Adds block type-specific submission handling for the block form.
     *
     * Note that this method takes the form structure and form state for the full
     * block configuration form as arguments, not just the elements defined in
     * BlockPluginInterface::blockForm().
     *
     * @param array $form
     *   The form definition array for the full block configuration form.
     * @param \Drupal\Core\Form\FormStateInterface $form_state
     *   The current state of the form.
     *
     * @see \Drupal\Core\Block\BlockPluginInterface::blockForm()
     * @see \Drupal\Core\Block\BlockPluginInterface::blockValidate()
     */
    public function blockSubmit($form, FormStateInterface $form_state)
    {


    }

    /**
     * Returns the configuration form elements specific to this block plugin.
     *
     * Blocks that need to add form elements to the normal block configuration
     * form should implement this method.
     *
     * @param array $form
     *   The form definition array for the block configuration form.
     * @param \Drupal\Core\Form\FormStateInterface $form_state
     *   The current state of the form.
     *
     * @return array $form
     *   The renderable form array representing the entire configuration form.
     */
    public function blockForm($form, FormStateInterface $form_state)
    {
        $form = parent::blockForm($form, $form_state);
        return $form;
    }


}