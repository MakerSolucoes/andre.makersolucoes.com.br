<?php
define('USER_IS_LOGGED', is_user_logged_in());
if (USER_IS_LOGGED) {
	define('USER_ID', get_current_user_id());
	define('USER_IS_ADMIN', current_user_can('administrator'));
}