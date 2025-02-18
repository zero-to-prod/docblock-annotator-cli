<?php

namespace Zerotoprod\DocblockAnnotatorCli\Update;

use Zerotoprod\DataModel\DataModel;

/**
 * @link https://github.com/zero-to-prod/docblock-annotator-cli
 */
class UpdateArguments
{
    use DataModel;

    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const directory = 'directory';
    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public string $directory;

    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const comments = 'comments';
    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public array $comments;
}