<?php

namespace Zerotoprod\DocblockAnnotatorCli\UpdateDirectory;

use PHPUnit\Event\Code\Throwable;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Zerotoprod\DocblockAnnotator\Annotator;
use Zerotoprod\DocblockAnnotator\DocblockAnnotator;

/**
 * @link https://github.com/zero-to-prod/docblock-annotator-cli
 */
#[AsCommand(
    name: UpdateDirectoryCommand::signature,
    description: 'Adds lines to a php docblock.',
    aliases: ['docblock-annotator-cli:update']
)]
class UpdateDirectoryCommand extends Command
{
    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const signature = 'docblock-annotator-cli:update-directory';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $Args = UpdateDirectoryArguments::from($input->getArguments());
        $Options = UpdateDirectoryOptions::from($input->getOptions());

        DocblockAnnotator::updateDirectory(
            $Args->directory,
            $Args->comments,
            $Options->visibility,
            $Options->members,
            static function (string $file) {
                echo $file.PHP_EOL;
            },
            static function (Throwable $Throwable) {
                echo $Throwable->message().PHP_EOL;
            },
            $Options->recursive
        );

        return Command::SUCCESS;
    }

    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public function configure(): void
    {
        $this->addArgument(UpdateDirectoryArguments::directory, InputArgument::REQUIRED, 'The directory to update php files.');
        $this->addArgument(UpdateDirectoryArguments::comments, InputArgument::IS_ARRAY, "The comments to add to the docblock. (e.g. 'app:foo bar baz' = ['bar', 'baz'])");
        $this->addOption(UpdateDirectoryOptions::visibility, null, InputOption::VALUE_IS_ARRAY | InputOption::VALUE_OPTIONAL, 'The visibility of the member: public, private, protected. (e.g. --visibility=public --visibility=private --visibility=protected)', [Annotator::public]);
        $this->addOption(UpdateDirectoryOptions::members, null, InputOption::VALUE_IS_ARRAY | InputOption::VALUE_OPTIONAL, 'The kinds of elements to annotate: method, property, constant, class. (e.g. --members=method --members=property --members=constant --members=class --members=enum --members=enum_case --members=interface --members=trait)', [Annotator::method, Annotator::property, Annotator::constant, Annotator::class_, Annotator::enum, Annotator::enum_case, Annotator::interface_, Annotator::trait_]);
        $this->addOption(UpdateDirectoryOptions::recursive, null, InputOption::VALUE_NEGATABLE, 'Recursively searches for files. (e.g. --recursive --no-recursive) ');
    }
}