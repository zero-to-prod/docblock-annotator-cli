<?php

namespace Zerotoprod\DocblockAnnotatorCli;

use Symfony\Component\Console\Application;
use Zerotoprod\DocblockAnnotatorCli\Src\SrcCommand;
use Zerotoprod\DocblockAnnotatorCli\Update\UpdateCommand;

class DocblockAnnotatorCli
{
    public static function register(Application $Application): void
    {
        $Application->add(new SrcCommand());
        $Application->add(new UpdateCommand());
    }
}