<?php

namespace Driesboy\EggWars\Commands;

use Driesboy\EggWars\EggWars;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;

class HubCommand extends Command{

  public function __construct(){
    parent::__construct("hub", "Hub Command");
    $this->setAliases(array("lobby", "spawn", "leave"));
  }

  public function execute(CommandSender $g, string $label, array $args){
    $main = EggWars::getInstance();
    if($main->IsInArena($g->getName())){
      $arena = $main->IsInArena($g->getName());
      $main->RemoveArenaPlayer($arena, $g->getName());
      $g->teleport(Server::getInstance()->getDefaultLevel()->getSafeSpawn());
      $g->sendMessage("§8» §aYou are teleported to the Lobby");
    }
  }
}
