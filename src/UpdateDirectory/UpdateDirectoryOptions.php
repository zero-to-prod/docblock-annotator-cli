<?php

namespace Zerotoprod\DocblockAnnotatorCli\UpdateDirectory;

use Zerotoprod\DataModel\DataModel;

/**
 * @link https://github.com/zero-to-prod/docblock-annotator-cli
 */
class UpdateDirectoryOptions
{
    use DataModel;

    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const visibility = 'visibility';
    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public array $visibility = [];

    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const members = 'members';
    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public array $members = [];

    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const recursive = 'recursive';
    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public bool $recursive = true;
}