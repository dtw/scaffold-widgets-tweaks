<?php
  /**
   * Register the "Editor Plus" role
   */
  function create_editor_plus_role() {
    // add the new role
    add_role( 'editor_plus', 'Editor Plus', get_role( 'editor' )->capabilities );
    // gets the editor_plus role
    $role = get_role( 'editor_plus' );
    // add capabilities
    $role->add_cap( 'customize' );
    $role->add_cap( 'edit_theme_options' );
  }
  //add_action( 'init', 'create_editor_plus_role' );

  function remove_editor_plus_role() {
    // gets the editor_plus role
    $role = get_role( 'editor_plus' );
    // del capabilities
    $role->remove_cap( 'customize' );
    $role->remove_cap( 'edit_theme_options' );
    // remove the new role
    remove_role( 'editor_plus', 'Editor Plus', get_role( 'editor' )->capabilities );
  }
  //add_action( 'init', 'remove_editor_plus_role' );
?>
