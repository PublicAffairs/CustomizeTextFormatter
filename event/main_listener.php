<?php
/**
 *
 * Customize TextFormatter. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2020, johnd0e
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace johnd0e\customizetf\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Customize TextFormatter Event listener.
 */
class main_listener implements EventSubscriberInterface
{
	public static function getSubscribedEvents()
	{
		return array(
			'core.text_formatter_s9e_configure_after'	=> array('configure_tf',-100), // lowest priority to execute afher all others
		);
	}

	/* @var \phpbb\language\language */
	protected $language;

	/**
	 * Constructor
	 *
	 * @param \phpbb\language\language	$language	Language object
	 */
	public function __construct(\phpbb\language\language $language)
	{
		$this->language = $language;
	}

	/**
	 * Configure TextFormatter to fit some specific purpose.
	 *
	 * @event  text_formatter_s9e_configure_after
	 * @param  \phpbb\event\data	$event		The event object
	 * @return void
	 * @access public
	 */
	public function configure_tf($event)
	{
		$configurator = $event['configurator'];

		// this rule generator is enabled by Litedown plugin
		// phpBB itselfs does not use paragraphs in content (instead it uses <br>)
		// so we remove it in order to avoid style issues.
		$configurator->rulesGenerator->remove('ManageParagraphs');
	}
}
