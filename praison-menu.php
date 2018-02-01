<?php
/**
 * @package Praison Menu
 * @version 1.0
 */
/*
Plugin Name: Praison Menu
Plugin URI: https://praison.com/
Description: Adding WordPress Plugin Admin Menu
Author: Mervin Praison
Version: 1.0
Author URI: https://praison.com/
*/


class Praison_Menu{
  
	private $my_plugin_screen_name;
	private static $instance;
  
	static function GetInstance()
	{
	  
	  if (!isset(self::$instance))
	  {
	      self::$instance = new self();
	  }
	  return self::$instance;
	}
      
    public function PluginMenu()
    {
     	$this->my_plugin_screen_name = add_menu_page(
                                        __( 'Home', 'textdomain' ), 
                                        __( 'Home', 'textdomain' ), 
                                        'manage_options',
                                        'praison-home', 
                                        array($this, 'RenderPage'), 
                                        'dashicons-store'
                                        );
      
    	add_submenu_page('praison-home', __( 'About', 'textdomain' ), __( 'About', 'textdomain' ), 'manage_options', 'praison-about', array($this, 'RenderAboutPage'));
   		add_submenu_page('praison-home', __( 'Contact', 'textdomain' ), __( 'Contact', 'textdomain' ), 'manage_options', 'praison-contact', array($this, 'RenderContactPage'));
    }

	public function RenderPage(){
		?>
		<div class='wrap'>
		<h2>Home</h2>
		</div>
		<?php
	}
	public function RenderAboutPage(){
		?>
		<div class='wrap'>
		<h2>About</h2>
		</div>
		<?php
	}
	public function RenderContactPage(){
		?>
		<div class='wrap'>
		<h2>Contact</h2>
		</div>
		<?php
	}
      
    

	public function InitPlugin()
	{
	   add_action('admin_menu', array($this, 'PluginMenu'));
	}
  
 }
 
$Praison_Menu = Praison_Menu::GetInstance();
$Praison_Menu->InitPlugin();


?>
