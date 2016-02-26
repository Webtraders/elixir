<?php
/**
 * Elixir plugin for Craft CMS
 *
 * Integrations Laravel Elixir version with the Twig template engine.
 *
 * @author    Webtraders Nederland B.V.
 * @copyright Copyright (c) 2016 Webtraders Nederland B.V.
 * @link      http://webtraders.nl
 * @package   Elixir
 * @since     1.0.3
 */

namespace Craft;

class ElixirPlugin extends BasePlugin
{

    /**
     * Returns the user-facing name.
     *
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('Elixir');
    }

    /**
     * Plugins can have descriptions of themselves displayed on the Plugins page by adding a getDescription() method
     * on the primary plugin class:
     *
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Integrates Laravel Elixir version with the Twig template engine.');
    }

    /**
     * Plugins can have links to their documentation on the Plugins page by adding a getDocumentationUrl() method on
     * the primary plugin class:
     *
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/Webtraders/elixir/blob/master/README.md';
    }

    /**
     * Plugins can now take part in Craft’s update notifications, and display release notes on the Updates page, by
     * providing a JSON feed that describes new releases, and adding a getReleaseFeedUrl() method on the primary
     * plugin class.
     *
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/Webtraders/elixir/master/releases.json';
    }

    /**
     * Returns the version number.
     *
     * @return string
     */
    public function getVersion()
    {
        return '1.0.3';
    }

    /**
     * As of Craft 2.5, Craft no longer takes the whole site down every time a plugin’s version number changes, in
     * case there are any new migrations that need to be run. Instead plugins must explicitly tell Craft that they
     * have new migrations by returning a new (higher) schema version number with a getSchemaVersion() method on
     * their primary plugin class:
     *
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * Returns the developer’s name.
     *
     * @return string
     */
    public function getDeveloper()
    {
        return 'Webtraders Nederland B.V.';
    }

    /**
     * Returns the developer’s website URL.
     *
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://webtraders.nl';
    }

    /**
     * Returns whether the plugin should get its own tab in the CP header.
     *
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     * Add any Twig extensions.
     *
     * @return mixed
     */
    public function addTwigExtension()
    {
        Craft::import('plugins.elixir.twigextensions.ElixirTwigExtension');

        return new ElixirTwigExtension();
    }
}