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
}
