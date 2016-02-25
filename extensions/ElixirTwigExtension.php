<?php namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class ElixirTwigExtension extends \Twig_Extension
{
    public function getName()
    {
        return 'Elixir';
    }

    public function getFunctions()
    {
        return array('elixir' => new \Twig_Function_Method($this, 'elixir'));
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
