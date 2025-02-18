<?php

namespace Zerotoprod\DocblockAnnotatorCli\UpdateFile;

use Zerotoprod\DataModel\DataModel;
use Zerotoprod\DocblockAnnotator\Annotator;

/**
 * @link https://github.com/zero-to-prod/docblock-annotator-cli
 */
class UpdateFileOptions
{
    use DataModel;

    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const visibility = 'visibility';
    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public array $visibility = [Annotator::public];

    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const members = 'members';
    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public array $members = [Annotator::method, Annotator::property, Annotator::constant, Annotator::class_, Annotator::trait_];

    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const recursive = 'recursive';
    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public bool $recursive = true;
}