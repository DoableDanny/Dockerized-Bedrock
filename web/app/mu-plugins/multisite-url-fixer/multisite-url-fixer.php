<?php

/**
 * Plugin Name: Multisite URL Fixer
 * Plugin URI: https://github.com/roots/multisite-url-fixer
 * Description: Fixes WordPress issues with home and site URL on multisite when using Bedrock
 * Version: 1.0.0
 * Author: Roots
 * Author URI: https://roots.io/
 * License: MIT License
 */

// class_exists('Roots\Bedrock\URLFixer') || require_once __DIR__.'/vendor/autoload.php';
// class_exists('Roots\Bedrock\URLFixer');

// use Roots\Bedrock\URLFixer;

/**
 * Class URLFixer
 * @package Roots\Bedrock
 * @author Roots
 * @link https://roots.io/
 */
class URLFixer
{
    /**
     * Add filters to verify / fix URLs.
     */
    public function addFilters()
    {
        add_filter('option_home', [$this, 'fixHomeURL']);
        add_filter('option_siteurl', [$this, 'fixSiteURL']);
        add_filter('network_site_url', [$this, 'fixNetworkSiteURL'], 10, 3);
    }

    /**
     * Ensure that home URL does not contain the /wp subdirectory.
     *
     * @param string $value the unchecked home URL
     * @return string the verified home URL
     */
    public function fixHomeURL($value)
    {
        if (substr($value, -3) === '/wp') {
            $value = substr($value, 0, -3);
        }
        return $value;
    }

    /**
     * Ensure that site URL contains the /wp subdirectory.
     *
     * @param string $url the unchecked site URL
     * @return string the verified site URL
     */
    public function fixSiteURL($url)
    {
        if (substr($url, -3) !== '/wp' && (is_main_site() || is_subdomain_install())) {
            $url .= '/wp';
        }
        return $url;
    }

    /**
     * Ensure that the network site URL contains the /wp subdirectory.
     *
     * @param string $url    the unchecked network site URL with path appended
     * @param string $path   the path for the URL
     * @param string $scheme the URL scheme
     * @return string the verified network site URL
     */
    public function fixNetworkSiteURL($url, $path, $scheme)
    {
        $path = ltrim($path, '/');
        $url = substr($url, 0, strlen($url) - strlen($path));

        if (substr($url, -3) !== 'wp/') {
            $url .= 'wp/';
        }

        return $url . $path;
    }
}

// echo is_multisite();

if (is_multisite()) {
    // echo "is multi";
    (new URLFixer)->addFilters();
}
