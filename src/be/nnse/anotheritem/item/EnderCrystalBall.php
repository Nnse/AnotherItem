<?php

declare(strict_types=1);

namespace be\nnse\anotheritem\item;

use be\nnse\anotheritem\projectile\EnderCrystal;
use be\nnse\api\item\default\CustomProjectileItem;
use pocketmine\entity\Location;
use pocketmine\entity\projectile\Throwable;
use pocketmine\item\ItemIds;
use pocketmine\player\Player;

class EnderCrystalBall extends CustomProjectileItem
{
    public function __construct()
    {
        parent::__construct(
            ItemIds::END_CRYSTAL,
            20,
            "anotheritem:ender_crystal_ball",
            "Ender Crystal Ball"
        );
    }

    public function getThrowForce() : float
    {
        return 1.1;
    }

    protected function createEntity(Location $location, Player $thrower) : Throwable
    {
        return new EnderCrystal($location, $thrower);
    }
}