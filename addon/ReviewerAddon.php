<?php

namespace WPMVC\Addons\Reviewer;

use WPMVC\Addon;

/**
 * Addon class.
 * Wordpress MVC.
 *
 * @link http://www.wordpress-mvc.com/v1/add-ons/
 * @author 10 Quality <info@10quality.com>
 * @package wpmvc-addon-reviewer
 * @license GPLv3
 * @version 1.0.0
 */
class ReviewerAddon extends Addon
{
    /**
     * Function called when user is on admin dashboard.
     * Add wordpress hooks (actions, filters) here.
     * @since 1.0.0
     */
    public function on_admin()
    {
        add_action( 'admin_notices', [&$this, 'admin_notices'] );
        add_action( 'wp_ajax_wpmvc_addon_reviewer', [&$this, 'ajax'] );
        add_action( 'admin_enqueue_scripts', [&$this, 'register_assets'] )
    }
    /**
     * Evals and displays review notice.
     * @since 1.0.0
     * 
     * @hook admin_notices
     */
    public function admin_notices()
    {
        $this->mvc->call( 'ReviewController@admin_notices', $this->main );
    }
    /**
     * Process ajax action request and response.
     * @since 1.0.0
     * 
     * @hook wp_ajax_wpmvc_addon_reviewer
     */
    public function ajax()
    {
        $this->mvc->call( 'ReviewController@ajax' );
    }
    /**
     * Registers addon assets.
     * @since 1.0.0
     * 
     * @hook admin_enqueue_scripts
     */
    public function register_assets()
    {
        $this->mvc->call( 'ReviewController@assets' );
    }
}