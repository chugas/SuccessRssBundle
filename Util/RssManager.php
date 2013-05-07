<?php

namespace Success\RssBundle\Util;

class RssManager {

  /**
   * findByTitle: Retorna un item del rss buscandolo por el titulo
   *
   * @static
   * 
   * @param SimplePie $feed
   * @param String $title
   *
   * @return item array
   * 
   * @author Gaston Caldeiro
   */
  public static function findByTitle($feed, $var) {
    $is_var_string = !is_array($var);
    $search = (is_array($var) ? $var : array($var));
    
    $tmp = array();
    $return = array();

    $list = $feed->get_items();
    
    foreach($list as $item){
      $tmp[$item->get_title()] = $item;
    }
    
    foreach($search as $title){
      if(array_key_exists($title, $tmp))
        $return[$title] = $tmp[$title]; 
    }
    
    if($is_var_string && count($return) == 1)
      return $return[$var];
    
    return $return;
  }

}
