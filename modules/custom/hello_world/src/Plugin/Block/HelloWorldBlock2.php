<?php
/**
 * Created by PhpStorm.
 * User: denlillemand
 * Date: 12/14/15
 * Time: 11:46 PM
 */

/**
 * @file
 * Contains Drupal\hello_world\Plugin\Block\HelloWorldBlock2
 */

namespace Drupal\hello_world\Plugin\Block;


use Drupal\Core\Block\BlockBase;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Database\Database;


/**
 * Class HelloWorldBlock2
 * @package Drupal\hello_world\Plugin\Block
 * @Block(
 *  id="Hello_world_block_2",
 *  admin_label= @Translation("hello world 2"),
 *  module = "hello_world"
 * )
 */
class HelloWorldBlock2 extends BlockBase
{
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
    public function build()
    {
        /**
         * aparently the explanation for this Drupal::database, call is to get around the fact that
         * db_query is deprecated:
         *      $herpderp = db_query()
         * the reason for the deprecation follows:
         * @deprecated as of Drupal 8.0.x, will be removed in Drupal 9.0.0. Instead, get
         *   a database connection injected into your service from the container and
         *   call query() on it. E.g.
         *   $injected_database->query($query, $args, $options);
         *
         *
         *
         * Okay, so i asked the question, http://drupal.stackexchange.com/questions/184042/regarding-term-clarification-in-the-database-api
         *
         * And further, the following mysql queries are "kind of wrong", should look at the drupal database docs, aparently
         * if we do write custom mysql we have to wrap table tables in angle brackets {} so that other things
         * can override them. And i think writeing mysql syntax ruins the whole "multiple databases feature" of drupal, so we should obviously
         * be useing their ORM/query language to do this sort of stuff anyway.
         */
        $connection = \Drupal::database();
        //list of the most recent articles
        $result = $connection->query("SELECT n.title, u.uid, n.created FROM node_field_data n, users u WHERE u.uid = n.uid AND n.type = :type ORDER BY n.created DESC LIMIT 5", array(
            'type' => 'article',
        ));
        $content = '<ul>';
        if ($result) {
            while ($row = $result->fetchAssoc()) {
                $content .= '<li>' . $row['title'] . '</li>';
            }
            $content .= '</ul>';
        } else {
            $content .= '<li>No blog posts to show </li> </ul>';
        }

        //single field queries
        $fetchSingleField = $connection->query("SELECT n.nid, n.title FROM node_field_data n WHERE n.title ='article3'")->fetchField();
        $singleFieldTitle = 'no single field result';
        if ($fetchSingleField) {
            $singleFieldTitle = '<div>Single field nid: ' . $fetchSingleField['title'] . '</div></br>';
        }


        //Distinct all users what have contributed to the website
        $distinctUsers = $connection->query("SELECT DISTINCT(uid) FROM node_field_data");
        $distinctUsersContent = '<div> All of the users that have contributed to the page:</div><ul> ';
        if($distinctUsers) {
            while($distinctUser = $distinctUsers->fetchAssoc()) {
                $distinctUsersContent .= '<li> User id:' . $distinctUser['uid'] . '</li>';
            }
        } else {
            $distinctUsersContent .= '<li>There was no user content to show</li>';
        }
        $distinctUsersContent .= '</ul></br>';


        //Other surgestions is to query for a specific users blog posts in a specific language etc.



        return array(
            '#markup' => '
                <div>' .
                $singleFieldTitle .
                $content .
                $distinctUsersContent .
                '</div>',

        );
    }
}
