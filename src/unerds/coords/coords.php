<?php





namespace unerds\coords;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;





class coords extends PluginBase {
	
	public function onEnable(){
	$this->getLogger()->info("/coords enabled.");
		return true;
	}

	public function onLoad(){
		$this->getLogger()->info("coords loaded");
	}

	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "coords":
				if($sender instanceof Player){
					$playerX = $sender->getX();
                			$playerY = $sender->getY();
                			$playerZ = $sender->getZ();
                			
                			$outX=round($playerX,1);
		                	$outY=round($playerY,1);
		                	$outZ=round($playerZ,1);

                			$playerLevel = $sender->getLevel()->getName();

                			$sender->sendMessage("x:" . $outX . ", y:" . $outY . ", z:" . $outZ . ". On: " . $playerLevel);

					return true;
				}

				else{
					$sender->sendMessage("This command only works in-game.");
            			}
		}
	}    

    public function onDisable(){
            $this->getLogger()->info("/coords disabled.");
            return true;
	}

}
