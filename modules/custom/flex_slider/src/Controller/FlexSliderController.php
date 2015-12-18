<?php
/**
 * Created by PhpStorm(so what lol??).
 * User: denlillemand
 * Date: 12/14/15
 * Time: 12:02 PM
 * @file
 * Contains \Drupal\hello_world\HelloWorldController
 */

namespace Drupal\hello_world\Controller;
use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * Provides route responses for the hello world page example.
 */
class HelloWorldController extends ContainerAware
{
    /**
     * Returns a simple hello world page.
     *
     * @return array
     *  A very simple renderable array is returned.
     */
    public function myCallbackMethod1()
    {

    }


    public function myCallbackMethod() {
        return array(
            '#markup' => '<div>the wrong content</div>'
        );
    }
}

