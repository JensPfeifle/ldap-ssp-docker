<?php
# Debug mode
# true: log and display any errors or warnings (use this in configuration/testing)
# false: log only errors and do not display them (use this in production)
$debug = true;

# LDAP
$ldap_url = "ldap://localhost:389";
$ldap_starttls = false;
$ldap_binddn = "cn=admin,dc=example,dc=de";
$ldap_bindpw = "secret";
$ldap_base = "dc=example,dc=de";
$ldap_login_attribute = "uid";
$ldap_fullname_attribute = "cn";
$ldap_filter = "(&(objectClass=inetOrgPerson)(uid={login}))";

# Logo
#$logo = "images/custom_logo.png";

# Background image
#$background_image = "images/custom_background.png";

?>
