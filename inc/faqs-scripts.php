<?php

add_action( 'wp_enqueue_scripts', 'so_enqueue_scriptsss' );

function so_enqueue_scriptsss(){





  

 

 // wp_register_script( 'xlsx', plugins_url().'/fees/js/xlsx.full.min.js', array(), false, true );
  // wp_enqueue_script( 'xlsx' );

  // CSS

  // wp_register_style('prefix_bootstrap1', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');

  // wp_enqueue_style('prefix_bootstrap1');



  wp_register_style('fontawesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css');

  wp_enqueue_style('fontawesome');



   // JS

   // wp_register_script('prefix_bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array(), false, true);

   // wp_enqueue_script('prefix_bootstrap');

  // CSS

  // wp_register_style('prefix_bootstrap3', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css');

  // wp_enqueue_style('prefix_bootstrap3');

  // JS

  // wp_register_script('prefix_bootstrap4', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array(), false, true);

  // wp_enqueue_script('prefix_bootstrap4');

  // JS

  // wp_register_script('prefix_bootstrap4', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', array(), false, true);
  // wp_register_script('prefix_bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js', array(), false, true);
  // wp_register_script('prefix_bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css', array(), false, true);
  
  // wp_enqueue_script('prefix_bootstrap4');

wp_register_script( 'cufaqs', plugins_url().'/cufaqs/js/faqs.js', array(), false, true );
 wp_enqueue_script( 'cufaqs' );

  // wp_enqueue_style('cms-style', plugins_url(). '/cms-plugin/css/cms-style.css');

   wp_enqueue_style('cufaqs-style', plugins_url(). '/cufaqs/css/faqs.css');

}