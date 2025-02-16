<?php

namespace Zerotoprod\DocblockAnnotatorCli\Update;

use PHPUnit\Event\Code\Throwable;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Zerotoprod\DocblockAnnotator\Annotator;
use Zerotoprod\DocblockAnnotator\DocblockAnnotator;

#[AsCommand(
    name: UpdateCommand::signature,
    description: 'Adds lines to a php docblock.'
)]
class UpdateCommand extends Command
{
    public const signature = 'docblock-annotator-cli:update';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $Args = UpdateArguments::from($input->getArguments());
        $Options = UpdateOptions::from($input->getOptions());

        DocblockAnnotator::update(
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

    public function configure(): void
    {
        $this->addArgument(UpdateArguments::directory, InputArgument::REQUIRED, 'The directory to update php files.');
        $this->addArgument(UpdateArguments::comments, InputArgument::IS_ARRAY, "The comments to add to the docblock. (e.g. 'app:foo bar baz' = ['bar', 'baz'])");
        $this->addOption(UpdateOptions::visibility, null, InputOption::VALUE_IS_ARRAY | InputOption::VALUE_OPTIONAL, 'The visibility of the member: public, private, protected. (e.g. --visibility=public --visibility=private --visibility=protected)', [Annotator::public]);
        $this->addOption(UpdateOptions::members, null, InputOption::VALUE_IS_ARRAY | InputOption::VALUE_OPTIONAL, 'The kinds of elements to annotate: method, property, constant. (e.g. --members=method --members=property --members=constant)', [Annotator::method, Annotator::property, Annotator::constant]);
        $this->addOption(UpdateOptions::recursive, null, InputOption::VALUE_NEGATABLE, 'Recursively searches for files. (e.g. --recursive --no-recursive) ');
    }
}