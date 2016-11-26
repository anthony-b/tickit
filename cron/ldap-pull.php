<?php
require "../current_session.php";
require "../config.php";
/**
 * Get a list of users from Active Directory.
 */

$ldap_connection = ldap_connect(LDAP_HOST, LDAP_PORT);
if (FALSE === $ldap_connection){
    // Uh-oh, something is wrong...
}else{
}

// We have to set this option for the version of Active Directory we are using.
ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3) or die('Unable to set LDAP protocol version');
ldap_set_option($ldap_connection, LDAP_OPT_REFERRALS, 0); // We need this for doing an LDAP search.

$users_list = array();
if (TRUE === ldap_bind($ldap_connection)){
    $ldap_base_dn = LDAP_USERS_DN.",".LDAP_BASE_DN;
    $search_filter = '(uid=*)';
    $result = ldap_search($ldap_connection, $ldap_base_dn, $search_filter);
    if (FALSE !== $result){
        $entries = ldap_get_entries($ldap_connection, $result);
        for ($x=0; $x<$entries['count']; $x++){
            
             array_push($users_list,$entries[$x]['uid'][0]); //$entries[$x]['samaccountname'][0];
             
        }
    }else{echo "Search Failed";};
    ldap_unbind($ldap_connection); // Clean up after ourselves.
}else{echo "Bind Failed";};
?>