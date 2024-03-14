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

  function remove_editor_plus_role() {
    // gets the editor_plus role
    $role = get_role( 'editor_plus' );
    // del capabilities
    $role->remove_cap( 'customize' );
    $role->remove_cap( 'edit_theme_options' );
    // remove the editor_plus role
    remove_role( 'editor_plus', 'Editor Plus', get_role( 'editor' )->capabilities );
  }

  /**
   * Register the "Subscriber Plus" role
   */
  function create_subscriber_plus_role() {
    // add the new role
    add_role( 'subscriber_plus', 'Subscriber Plus', get_role( 'subscriber' )->capabilities );
    // gets the subscriber_plus role
    $role = get_role( 'subscriber_plus' );
    // add capabilities
    $role->add_cap( 'read_private_posts' );
  }

  function remove_subscriber_plus_role() {
    // gets the subscriber_plus role
    $role = get_role( 'subscriber_plus' );
    // del capabilities
    $role->remove_cap( 'read_private_posts' );
    // remove the subscriber_plus role 
    remove_role( 'subscriber_plus', 'Subscriber Plus', get_role( 'subscriber' )->capabilities );
  }

  /**
   * Register the "Moderator" role
   */
  function create_moderator_role()
  {
    // add the new role
    add_role('moderator', 'Moderator', get_role('subscriber')->capabilities);
    // gets the moderator role
    $role = get_role('moderator');
    // add capabilities
    $role->add_cap('moderate_comments');
  }

  function remove_moderator_role()
  {
    // gets the moderator role
    $role = get_role('moderator');
    // del capabilities
    $role->remove_cap('moderate_comments');
    // remove the moderator role 
    remove_role('moderator', 'Moderator', get_role('subscriber')->capabilities);
  }
?>
