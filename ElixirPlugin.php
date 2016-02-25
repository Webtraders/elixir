<?php
namespace Craft;

class ElixirPlugin extends BasePlugin
{
	public function getName()
	{
		return Craft::t('Elixir');
	}

	public function getVersion()
	{
		return '1.0.2';
	}

	public function getDeveloper()
	{
		return 'Webtraders Nederland B.V.';
	}

	public function getDeveloperUrl()
	{
		return 'https://webtraders.nl';
	}

	public function hasCpSection()
	{
		return false;
	}

	public function addTwigExtension()
	{
		Craft::import('plugins.elixir.extensions.ElixirTwigExtension');
		return new ElixirTwigExtension();
	}

}
