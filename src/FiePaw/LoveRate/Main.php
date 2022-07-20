<?php

namespace FiePaw\LoveRate;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\plugin\PluginBase;
use pocketmine\event\EventListener;
use pocketmine\utils\TextFormat as T;

use jojoe77777\FormAPI\CustomForm;

class Main extends PluginBase{

    public function onEnable(): void{
        
    }

    public function onCommand(CommandSender $p, Command $c, string $l, array $arg): bool{
        switch($c->getName()){
	      case "loverate":
            if($p instanceof Player){
                if(isset($arg[0])){
                    $cht = implode(" ", $arg);
                    $this->getServer()->broadcastMessage(T::GREEN."Love Rate dari: §e".$p->getName().T::GREEN."\nLoveRate: ".$cht);
                    switch(rand(0, 6)){
                       case 0:
                           $this->getServer()->broadcastMessage("Jawaban: ".T::GREEN."100000000000000000000000000%");
                       break;
                       case 1:
                           $this->getServer()->broadcastMessage("Jawaban: ".T::DARK_RED."100%");
                       break;
                       case 2:
                           $this->getServer()->broadcastMessage("Jawaban: ".T::RED."75%");
                       break;
                       case 3:
                           $this->getServer()->broadcastMessage("Jawaban: ".T::GREEN."65%"); 
                       break;
                       case 4:
                           $this->getServer()->broadcastMessage("Jawaban: ".T::GREEN."55%"); 
                       break;
                       case 5:
                           $this->getServer()->broadcastMessage("Jawaban: ".T::WHITE."45%"); 
                       break;
                       case 6:
                           $this->getServer()->broadcastMessage("Jawaban: ".T::WHITE."35%"); 
                       break;
                       case 7:
                           $this->getServer()->broadcastMessage("Jawaban: ".T::WHITE."25%"); 
                       break;
                       case 8:
                           $this->getServer()->broadcastMessage("Jawaban: ".T::WHITE."10%"); 
                       break;
                       case 9:
                           $this->getServer()->broadcastMessage("Jawaban: ".T::DARK_RED."0%. Dia Tidak mencintaimu :c"); 
                       break;
                    }
                }else{
                    $p->sendMessage(T::RED."usage: /loverate (Pertanyaanmu)");
                }
            } else { 
                $p->sendMessage("your not player");
            }
	      break;
	      case "love":
	        if($p instanceof Player){
		      if($p->hasPermission("use.loverate")){
			      $this->loverate($p);
		      }
		    } else{
		      $p->sendMessage("Use this Command in-game.");
		      return true;
		    }
	      break;
        }
    return true;
    }
	
	public function loverate(Player $player){
		$form = new CustomForm(function(Player $player, array $data = null){
		    if($data === null){
				return true;
			}
            $command = "loverate ";
			$this->getServer()->getCommandMap()->dispatch($player, $command . $data[1]);
	    });
		
		$form->setTitle("§c§lLove§6Rate");
		$form->addLabel("Kamu bisa mengetahui tingkat cintamu disini!");
		
		$form->addInput("§eMasukan Nama orang yang kamu suka§r");
		
		$form->sendToPlayer($player);
		return $form;
	}
}
