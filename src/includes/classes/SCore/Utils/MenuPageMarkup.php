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
 * Menu page utils.
 *
 * @since 160524 Menu page utils.
 */
class MenuPageMarkup extends Classes\SCore\Base\Core
{
    /**
     * Note (smaller text).
     *
     * @since 160524 Menu page markup utils.
     *
     * @param string $note Note (can contain HTML markup).
     *
     * @return string Raw HTML markup.
     */
    public function note(string $note): string
    {
        return '<div class="-note">'.$note.'</div>';
    }

    /**
     * Hover tip; via jQuery UI tooltip.
     *
     * @since 160524 Menu page markup utils.
     *
     * @param string $tip Tip (can contain HTML markup).
     *
     * @return string Raw HTML markup.
     */
    public function tip(string $tip): string
    {
        return '<i class="-tip" data-toggle="core.jquery-ui-tooltip" title="'.esc_attr($tip).'"></i>';
    }

    /**
     * A menu page form class instance.
     *
     * @since 160524 Menu page markup utils.
     *
     * @param string $action ReST action identifier.
     *
     * @return Classes\SCore\MenuPageForm Class instance.
     */
    public function form(string $action): Classes\SCore\MenuPageForm
    {
        return $this->App->Di->get(Classes\SCore\MenuPageForm::class, compact('action'));
    }

    /**
     * Notice errors.
     *
     * @since 160524 Menu page markup utils.
     *
     * @param string $heading        Heading (can contain HTML markup).
     * @param array  $error_messages Error messages.
     *
     * @return string Raw HTML markup.
     */
    public function noticeErrors(string $heading, array $error_messages): string
    {
        if (!$error_messages) {
            return ''; // No errors.
        }
        $markup  = ''; // Initialize markup.
        $heading = $heading && mb_strpos($heading, '</i>') === false
            ? '<i class="sharkicon sharkicon-enty-exclamation" style="color:#E03A39;"></i> '.$heading : $heading;
        $error_messages = $this->c::markdown($error_messages, ['no_p' => true]);

        if ($heading) { // Heading is always optional here.
            $markup .= '<h3 style="margin:1em 0 1em 0; padding:0; line-height:1em;">'.$heading.'</h3>';
        }
        $markup .= '<ul style="margin:1em 0 1em 0; padding:0 0 0 3em; list-style:disc;">'.
                       '<li style="margin:0; padding:0; list-style:disc;">'.
                           implode('</li><li class="margin:.5em 0 0 0; padding:0; list-style:disc;">', $error_messages).
                       '</li>'.
                   '</ul>';

        return $markup;
    }
}