<?php

namespace BlockHorizons\StackerPE\commands;

use BlockHorizons\StackerPE\Loader;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\utils\TextFormat;

class StackerCommand extends Command  implements PluginIdentifiableCommand {

	private $loader;
	
	public function __construct(Loader $loader) {
		parent::__construct("stacker", "Ride on other players", "/stacker");
		$this->loader = $loader;
		$this->setPermission("stackerpe.command.stacker");
	}
	
	public function execute(CommandSender $sender, $label, array $args) {
		if(!$this->testPermission($sender)) {
			return;
		}
		
		switch(strtolower($args[0])) {
			case "info":
				$sender->sendMessage(TextFormat::LIGHT_PURPLE . "———" . TextFormat::AQUA .  " StackerPE Information " . TextFormat::LIGHT_PURPLE . "———");
				$sender->sendMessage(TextFormat::GREEN . "Version: " . TextFormat::YELLOW . $this->getLoader()->getDescription()->getVersion());
				$sender->sendMessage(TextFormat::GREEN . "Organization: " . TextFormat::YELLOW . "BlockHorizons (https://github.com/BlockHorizons/StackerPE)");
				$sender->sendMessage(TextFormat::GREEN . "Authors: " . TextFormat::YELLOW . "TheDiamondYT (@TheDiamondYT1)");
				break;
				
			case "reload":
				$this->getLoader()->onEnable();
				$sender->sendMessage(TextFormat::GREEN . "Reload complete.");
				break;
		}
	}

	/**
	 * @return Loader
	 */
	public function getLoader(): Loader {
		return $this->loader;
	}
	
	/**
	 * @return Loader
	 */
	public function getPlugin(): Loader {
		return $this->loader;
	}
}
