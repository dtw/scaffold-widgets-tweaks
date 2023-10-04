<?php

/* Add Siteground Security two-factor authentication (2FA) to the custom roles created by this plugin
--------------------------------------------------------------------------------- */

add_filter('sg_security_2fa_roles', 'add_user_roles_to_2fa');

function add_user_roles_to_2fa($roles)
{

  $roles[] = 'editor_plus';
  $roles[] = 'subscriber_plus';

  return $roles;
}

?>