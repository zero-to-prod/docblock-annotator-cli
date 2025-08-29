<?php

namespace Zerotoprod\DocblockAnnotatorCli\UpdateDirectory;

use PHPUnit\Event\Code\Throwable;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Zerotoprod\DocblockAnnotator\DocblockAnnotator;
use Zerotoprod\DocblockAnnotator\Modifier;
use Zerotoprod\DocblockAnnotator\Statement;

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
    public const signature = 'docblock-annotator-cli:update-directory';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $Args = UpdateDirectoryArguments::from($input->getArguments());
        $Options = UpdateDirectoryOptions::from($input->getOptions());

        /** @var array{success: string[], failure: string[]} $messages */
        $messages = ['success' => [], 'failure' => []];
        $DocblockAnnotator = new DocblockAnnotator(
            $Options->modifiers,
            $Options->statements,
            function (string $file) use (&$messages) {
                return $messages['success'][] = $file;
            },
            function (Throwable $e) use (&$messages) {
                return $messages['failure'][] = $e->message();
            }
        );

        try {
            $DocblockAnnotator->updateDirectory(
                $Args->comments,
                $Args->directory,
                $Options->recursive
            );
        } catch (\Throwable $e) {
            $output->writeln($e->getMessage());

            return Command::FAILURE;
        }

        foreach ($messages as $list) {
            foreach ($list as $message) {
                $output->writeln($message);
            }
        }

        return empty($messages['failure'])
            ? Command::SUCCESS
            : Command::FAILURE;
    }

    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public function configure(): void
    {
        $this->addArgument(UpdateDirectoryArguments::directory, InputArgument::REQUIRED, 'The directory to update php files.');
        $this->addArgument(UpdateDirectoryArguments::comments, InputArgument::IS_ARRAY, "The comments to add to the docblock. (e.g. 'app:foo bar baz' = ['bar', 'baz'])");
        $this->addOption(UpdateDirectoryOptions::modifiers, null, InputOption::VALUE_IS_ARRAY | InputOption::VALUE_OPTIONAL, 'The modifier of the member: public, private, protected. (e.g. --modifier=public --modifier=private --modifier=protected)', [Modifier::public]);
        $this->addOption(UpdateDirectoryOptions::statements, null, InputOption::VALUE_IS_ARRAY | InputOption::VALUE_OPTIONAL, 'The statements to annotate: class_method, const, class, class_const, enum_case, enum, function, trait, property, interface. (e.g. --statements=class_method --statements=const --statements=class --statements=class_const --statements=enum_case --statements=enum --statements=function --statements=trait --statements=property --statements=interface)', [Statement::ClassMethod, Statement::Const_, Statement::Class_, Statement::ClassConst, Statement::EnumCase, Statement::Enum_, Statement::Function_, Statement::Trait_, Statement::Property, Statement::Interface_,]);
        $this->addOption(UpdateDirectoryOptions::recursive, null, InputOption::VALUE_NEGATABLE, 'Recursively searches for files. (e.g. --recursive --no-recursive) ');
    }
}