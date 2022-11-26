<?php

declare(strict_types=1);

namespace Charescape\Backslasher;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Script\Event;
use Composer\Script\ScriptEvents;

class Plugin implements PluginInterface, EventSubscriberInterface
{
    public function activate(Composer $composer, IOInterface $io): void
    {
    }

    public function deactivate(Composer $composer, IOInterface $io): void
    {
    }

    public function uninstall(Composer $composer, IOInterface $io): void
    {
    }

    public static function getSubscribedEvents()
    {
        return [
            ScriptEvents::POST_UPDATE_CMD => 'run',
            ScriptEvents::POST_INSTALL_CMD => 'run',
        ];
    }

    public function run(Event $event): void
    {
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        $extra = $event->getComposer()->getPackage()->getExtra();

        $targetDirs = (array) ($extra['backslasher-target'] ?? []);
        $ignored = (array) ($extra['backslasher-ignore'] ?? []);

        foreach ($targetDirs as $targetDir) {
            if (!str_starts_with($targetDir, '/')) {
                $targetDir = "/$targetDir";
            }

            $targetDir = dirname($vendorDir) . $targetDir;

            $backslasher = new Backslasher($event->getIO(), $ignored);
            $backslasher->processDir($targetDir);
        }
    }
}
