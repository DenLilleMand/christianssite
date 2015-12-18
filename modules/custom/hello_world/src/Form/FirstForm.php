<?php

/**
 * @file
 * Contains \Drupal\hello_world\Form\FirstForm.
 */

namespace Drupal\hello_world\Form;


use Drupal\Core\Form\FormInterface;
use Drupal\Core\Form\FormStateInterface;


/**
 * Provides a simple example form.
 */
class FirstForm implements FormInterface {

    /**
     * Returns a unique string identifying the form.
     *
     * @return string
     *   The unique string identifying the form.
     */
    public function getFormId() {
       return 'first_form';
    }

    /**
     * Form constructor.
     *
     * @param array $form
     *   An associative array containing the structure of the form.
     * @param \Drupal\Core\Form\FormStateInterface $form_state
     *   The current state of the form.
     *
     * @return array
     *   The form structure.
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['title'] = array(
            '#title' => t('Title'),
            '#type' => 'textfield',
            '#maxlength' => 120,
        );
        $form['body'] = array(
            '#title' => t('body'),
            '#type' => 'textarea',
        );
        $form['author'] = array(
            '#type' => 'textfield',
            '#title' => t('Author'),
            '#description' => t('Choose who the node should appear written by'),
            '#size' => 40,
            '#maxlength' => 60,
        );
        $form['submit'] = array(
            '#type' => 'submit',
            '#value' => t('Search'),
        );
        return $form;
    }

    /**
     * @param array $form
     * @param FormStateInterface $form_state
     * @return bool
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        $author = $form_state->getValue('author');
        if(preg_match('#[\d]#', $author)) {
            $form_state->setErrorByName('author', 'You need to submit a name, a name does not contain numbers');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * Form submission handler.
     *
     * @param array $form
     *   An associative array containing the structure of the form.
     * @param \Drupal\Core\Form\FormStateInterface $form_state
     *   The current state of the form.
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $author = $form_state->getValue('author');
        $body = $form_state->getValue('body');
        $title = $form_state->getValue('title');
        drupal_set_message('Thanks for submitting the form! you typed in the following as author:' . $author . ' . body:' . $body . '. title:' . $title);
    }
}
