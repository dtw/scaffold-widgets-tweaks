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

add_filter('sg_security_2fa_setup_string', 'modify_2fa_setup_string');

function modify_2fa_setup_string()
{
  return 'The administrator of this site has asked that you enable 2-factor authentication. To do that, use the Microsoft Authenticator app and scan the QR code below to add a token for this website.';
}

?>