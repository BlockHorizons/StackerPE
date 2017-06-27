<?php

namespace BlockHorizons\StackerPE;

use BlockHorizons\StackerPE\listeners\EventListener;
use BlockHorizons\StackerPE\commands\StackerCommand;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase {

	private $ridingPlayers = [];

	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
		$this->getServer()->getCommandMap()->register("stackerpe", new StackerCommand($this));
	}
	
	/**
	 * Returns whether the given player has stacking enabled.
	 *
	 * @param Player $player
	 *
	 * @return bool
	 */
	public function hasStackingEnabled(Player $player): bool {
		if(isset($this->ridingPlayers[$player->getName()])) {
			return true;
		}
		return false;
	}
	
	/**
	 * Toggles stacking for the given player.
	 *
	 * @param Player $player
	 * @param bool   $value
	 */
	public function setStackingEnabled(Player $player, bool $value = true) {
		if($value) {
			$this->ridingPlayers[$player->getName()] = $player;
		} else {
			unset($this->ridingPlayers[$player->getName()]);
		}
	}
}
