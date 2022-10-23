<?php

namespace GamilinoMC;

use jojoe77777\FormAPI\SimpleForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

class main extends PluginBase
{
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool
    {
        if ($cmd->getName() === "vanish") {
            if($sender instanceof Player){
                $this->VanishUI($sender);
            }
            return true;
        }
    return true;
    }

    public function VanishUI(Player $player){
        $form = new SimpleForm(function (Player $player, $data = null){
            if ($data === null){
                return;
            }
            switch ($data) {
                case 0:
                    $player->setInvisible(true);
                    $player->setSilent(true);
                    $player->setFlying(true);
                    $player->setAllowFlight(true);
                    $player->sendPopup("§aYou are vanished now!");
                    break;

                case 1:
                    $player->setInvisible(false);
                    $player->setSilent(false);
                    $player->setFlying(false);
                    $player->setAllowFlight(false);
                    $player->sendPopup("§cYou have been unvanished!");
                    break;
            }
        });
        $form->setTitle("§bVanish §eUI");
        $form->setContent("§2Choose wether you want to be Vanished or not");
        $form->addButton("§a§lVanish");
        $form->addButton("§c§lUnvanish");
        $form->sendToPlayer($player);
        return $form;
    }
}
