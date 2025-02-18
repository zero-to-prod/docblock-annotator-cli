<?php

namespace Zerotoprod\DocblockAnnotatorCli\UpdateFile;

use Zerotoprod\DataModel\DataModel;

/**
 * @link https://github.com/zero-to-prod/docblock-annotator-cli
 */
class UpdateFileArguments
{
    use DataModel;

    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const file = 'file';
    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public string $file;

    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const comments = 'comments';
    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public array $comments;
}