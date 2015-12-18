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
        $content = '
            <div class="">
            <div class="myDiv">
                <div class="bg"></div>
                    <div class="block-title">
                        A basic drupal page created programmatically.
                        Some random text to show ooffff the transparent baaaccckkkkkkgrrrounnnnd
                </div>
            </div>
        ';
        $x = 1;
        $my_object = new \stdClass();
        $my_object->first_name = 'Jimbo';
        $my_object->last_name = 'Bob';
        $content .= 'Hello ' . $my_object->first_name . ' ' . $my_object->last_name . '</br>';
        foreach($my_object as $property) {
            $content .= ' property ' . $x . ' in the object is :' . $property . '</br>';
            $x = $x + 1;
        }
        $content .= '</div>';
        $element = array(
            '#markup' => $content,
            '#attached' => array(
                'library' => array(
                    'hello_world/hello-world',
                ),
            ),
        );
        return $element;
    }


    public function myCallbackMethod() {
        return array(
            '#theme' => 'hello_world_primary_page',
            '#items' => 100,
        );
    }
}

