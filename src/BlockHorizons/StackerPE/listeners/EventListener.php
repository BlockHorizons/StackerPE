<?php

namespace BlockHorizons\StackerPE\listeners;

use BlockHorizons\StackerPE\Loader;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\Player;

class EventListener implements Listener {

	private $loader;
	
	public function __construct(Loader $loader) {
		$this->loader = $loader;
	}
	
	/**
	 * @param EntityDamageEvent $event
	 *
	 * @priority        HIGHEST
	 * @ignoreCancelled true
	 */
	public function onEntityDamage(EntityDamageEvent $event) {
		$player = $event->getEntity();
		if($player instanceof Player) {
			if($event instanceof EntityDamageByEntityEvent) {
				if($event->isCancelled()) {
					return;
				}
				// TODO
			}
		}
	}
	
	/**
	 * @return Loader
	 */
	public function getLoader(): Loader {
		return $this->loader;
	}
}
