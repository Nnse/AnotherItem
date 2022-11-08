<?php

declare(strict_types=1);

namespace be\nnse\anotheritem;

use be\nnse\anotheritem\item\DirectionChecker;
use be\nnse\anotheritem\item\EnderCrystalBall;
use be\nnse\anotheritem\item\GoldenCarrotEnchanted;
use be\nnse\anotheritem\item\PositionStorage;
use be\nnse\anotheritem\item\RenamedFishingRod;
use be\nnse\anotheritem\item\RenamedGoldenAxe;
use be\nnse\anotheritem\item\SnowballBow;
use be\nnse\anotheritem\item\VersionChecker;
use be\nnse\anotheritem\projectile\EnderCrystal;
use be\nnse\api\item\CustomItemFactory;
use be\nnse\api\item\CustomItemListener;
use pocketmine\data\bedrock\EntityLegacyIds;
use pocketmine\entity\EntityDataHelper;
use pocketmine\entity\EntityFactory;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\plugin\PluginBase;
use pocketmine\world\World;

class AnotherItem extends PluginBase
{
    public function onEnable() : void
    {
        CustomItemListener::register($this);

        $factory = CustomItemFactory::getInstance();
        $factory->register(new DirectionChecker(), true);
        $factory->register(new GoldenCarrotEnchanted(), true);
        $factory->register(new RenamedFishingRod(), true);
        $factory->register(new RenamedGoldenAxe(), true);
        $factory->register(new SnowballBow(), true);
        $factory->register(new EnderCrystalBall(), true);
        $factory->register(new VersionChecker(), true);
        $factory->register(new PositionStorage(), true);

        EntityFactory::getInstance()->register(EnderCrystal::class,
            function(World $world, CompoundTag $nbt) : EnderCrystal {
                return new EnderCrystal(EntityDataHelper::parseLocation($nbt, $world), null, $nbt);
            }, ["EnderCrystal", "minecraft:ender_crystal"], EntityLegacyIds::ENDER_CRYSTAL
        );
    }
}