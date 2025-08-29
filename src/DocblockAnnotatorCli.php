<?php

namespace Zerotoprod\DocblockAnnotatorCli;

use Symfony\Component\Console\Application;
use Zerotoprod\DocblockAnnotatorCli\Src\SrcCommand;
use Zerotoprod\DocblockAnnotatorCli\UpdateDirectory\UpdateDirectoryCommand;
use Zerotoprod\DocblockAnnotatorCli\UpdateFile\UpdateFileCommand;

/**
 * A cli for annotating Docblocks.
 *
 * @link https://github.com/zero-to-prod/docblock-annotator-cli
 */
class DocblockAnnotatorCli
{
    public static function register(Application $Application): void
    {
        $Application->add(new SrcCommand());
        $Application->add(new UpdateDirectoryCommand());
        $Application->add(new UpdateFileCommand());
    }
}