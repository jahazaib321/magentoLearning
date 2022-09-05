<?php

namespace Mage4\Inquiry\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Mage4\Inquiry\Model\ItemFactory;
use Magento\Framework\Console\Cli;

class AddItem extends Command
{
    const INPUT_KEY_NAME = 'name';
    const INPUT_KEY_EMAIL = 'email';
    const INPUT_KEY_OCCUPATION = 'occupation';
    const INPUT_KEY_ACTIVITIES = 'activities';
    const INPUT_KEY_DOB = 'dob';

    private $itemFactory;

    public function __construct(ItemFactory $itemFactory)
    {
        $this->itemFactory = $itemFactory;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('inquiry:item:add')
            ->addArgument(
                self::INPUT_KEY_NAME,
                InputArgument::REQUIRED,
                'Item name'
            )->addArgument(
                self::INPUT_KEY_EMAIL,
                InputArgument::OPTIONAL,
                'Item email'
            )->addArgument(
                self::INPUT_KEY_OCCUPATION,
                InputArgument::OPTIONAL,
                'Item occupation'
            )->addArgument(
                self::INPUT_KEY_ACTIVITIES,
                InputArgument::OPTIONAL,
                'Item activities'
            )->addArgument(
                self::INPUT_KEY_DOB,
                InputArgument::OPTIONAL,
                'Item dob'
            );
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $item = $this->itemFactory->create();
        $item->setName($input->getArgument(self::INPUT_KEY_NAME));
        $item->setDescription($input->getArgument(self::INPUT_KEY_DESCRIPTION));
        $item->setIsObjectNew(true);
        $item->save();
        return Cli::RETURN_SUCCESS;
    }
}
