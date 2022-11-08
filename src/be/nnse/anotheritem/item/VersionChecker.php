<?php

declare(strict_types=1);

namespace be\nnse\anotheritem\item;

use be\nnse\api\item\command\CommandItem;
use pocketmine\item\ItemIds;

class VersionChecker extends CommandItem
{
    public function __construct()
    {
        parent::__construct(
            ItemIds::STICK,
            20,
            "version",
            "anotheritem:version_checker",
            "Check Server Version"
        );
    }
}