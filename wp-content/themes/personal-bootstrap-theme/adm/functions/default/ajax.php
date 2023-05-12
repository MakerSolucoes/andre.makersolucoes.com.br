<?php

// Url ajax wordpress
function ms_url_ajax()
{ ?>
<script type="text/javascript">
var url_ajax = "<?php echo get_site_url() ?>/wp-admin/admin-ajax.php";
</script><?php
			}
			add_action('wp_footer', 'ms_url_ajax');