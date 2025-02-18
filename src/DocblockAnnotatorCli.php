<?php

namespace Zerotoprod\DocblockAnnotatorCli;

use Symfony\Component\Console\Application;
use Zerotoprod\DocblockAnnotatorCli\Src\SrcCommand;
use Zerotoprod\DocblockAnnotatorCli\Update\UpdateCommand;

/**
 * @link https://github.com/zero-to-prod/docblock-annotator-cli
 */
class DocblockAnnotatorCli
{
    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public static function register(Application $Application): void
    {
        $Application->add(new SrcCommand());
        $Application->add(new UpdateCommand());
    }
}