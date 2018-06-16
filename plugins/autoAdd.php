<?php
/**
 * Auto Adding Users on creation
 *
 * @package   Auto Add User
 *
 * Plugin Name: Auto Add User
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */
 
add_action('wp','add_current_user_to_blog',10);
function add_current_user_to_blog(){

if(!is_user_logged_in())
return false;

global $current_user,
$blog_id;

switch_to_blog(1); //get role from main blog
$get_role = ($current_user->h0ndamcpr13_capabilities);
$add_role = key($get_role);
restore_current_blog();

if (!is_blog_user()) //check for current membership
add_user_to_blog($blog_id, $current_user->ID, $add_role); //copy to current blog so roles work

}

?>