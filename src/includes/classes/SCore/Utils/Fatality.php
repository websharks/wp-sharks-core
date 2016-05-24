<?php
declare (strict_types = 1);
namespace WebSharks\WpSharks\Core\Classes\SCore\Utils;

use WebSharks\WpSharks\Core\Classes;
use WebSharks\WpSharks\Core\Interfaces;
use WebSharks\WpSharks\Core\Traits;
#
use WebSharks\Core\WpSharksCore\Classes as CoreClasses;
use WebSharks\Core\WpSharksCore\Classes\Core\Base\Exception;
use WebSharks\Core\WpSharksCore\Interfaces as CoreInterfaces;
use WebSharks\Core\WpSharksCore\Traits as CoreTraits;
#
use function assert as debug;
use function get_defined_vars as vars;

/**
 * Fatal error utils.
 *
 * @since 160524 WP notices.
 */
class Fatality extends Classes\SCore\Base\Core
{
    /**
     * Forbidden response.
     *
     * @since 160524 First documented version.
     */
    public function forbidden()
    {
        wp_die(__('Abnormal request; forbidden.', 'wp-sharks-core'), __('Forbidden', 'wp-sharks-core'), ['response' => 403, 'back_link' => true]);
    }
}
