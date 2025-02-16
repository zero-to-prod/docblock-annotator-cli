<?php

namespace Zerotoprod\DocblockAnnotatorCli\Update;

use Zerotoprod\DataModel\DataModel;
use Zerotoprod\DocblockAnnotator\Annotator;

class UpdateOptions
{
    use DataModel;

    public const visibility = 'visibility';
    public array $visibility = [Annotator::public];

    public const members = 'members';
    public array $members = [Annotator::method, Annotator::property, Annotator::constant];

    public const recursive = 'recursive';
    public bool $recursive = true;
}