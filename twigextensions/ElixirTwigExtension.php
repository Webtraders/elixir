<?php
/**
 * Elixir plugin for Craft CMS
 *
 * Elixir Twig Extension
 *
 * @author    Webtraders Nederland B.V.
 * @copyright Copyright (c) 2016 Webtraders Nederland B.V.
 * @link      http://webtraders.nl
 * @package   Elixir
 * @since     1.0.3
 */

namespace Craft;

use Twig_Extension;

class ElixirTwigExtension extends \Twig_Extension
{
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'Elixir';
    }

    /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     *      {{ elixir('css/app.css') }}
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'elixir' => new \Twig_Function_Method($this, 'elixir'),
        );
    }

    /**
     * Get the path to a versioned Elixir file.
     *
     * @param  string  $file
     * @return string
     */
    public function elixir($file)
    {
        static $manifest = null;

        if (is_null($manifest)) {
            $manifest = json_decode(file_get_contents('build/rev-manifest.json'), true);
        }

        if (isset($manifest[$file])) {
            return '/build/' . $manifest[$file];
        }

        throw new HttpException(500, "File {$file} not defined in asset manifest.");
    }
}