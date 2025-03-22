<?php

namespace App\Command;

use App\Entity\Quiz;
use App\Entity\Question;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CreateTestQuizCommand extends Command
{
    protected static $defaultName = 'app:create-test-quiz';

    private EntityManagerInterface $entityManager;
    private SymfonyStyle $io;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this->setDescription('Creates a test quiz with 10 questions about Ethiopian history and culture');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->io = new SymfonyStyle($input, $output);

        // Create the quiz
        $quiz = new Quiz();
        $quiz->setTitle('Ethiopian History and Culture Quiz');
        $quiz->setDescription('Test your knowledge about Ethiopian history, culture, and traditions with these 10 questions.');
        $quiz->setCreatedAt(new \DateTimeImmutable());

        // Questions data
        $questions = [
            [
                'text' => 'What is the capital city of Ethiopia?',
                'options' => ['Addis Ababa', 'Dire Dawa', 'Gondar', 'Harar'],
                'correct' => 0,
                'order' => 1
            ],
            [
                'text' => 'Which Ethiopian emperor is known for modernizing the country and defeating the Italian invasion at the Battle of Adwa?',
                'options' => ['Haile Selassie', 'Menelik II', 'Tewodros II', 'Yohannes IV'],
                'correct' => 1,
                'order' => 2
            ],
            [
                'text' => 'What is the official language of Ethiopia?',
                'options' => ['Amharic', 'Oromiffa', 'Tigrinya', 'Somali'],
                'correct' => 0,
                'order' => 3
            ],
            [
                'text' => 'Which ancient Ethiopian kingdom is known for its obelisks and stelae?',
                'options' => ['Axum', 'Gondar', 'Lalibela', 'Yeha'],
                'correct' => 0,
                'order' => 4
            ],
            [
                'text' => 'What is the traditional Ethiopian coffee ceremony called?',
                'options' => ['Buna', 'Jebena', 'Tella', 'Tej'],
                'correct' => 0,
                'order' => 5
            ],
            [
                'text' => 'Which Ethiopian dish consists of injera served with various stews?',
                'options' => ['Doro Wat', 'Shiro', 'Beyaynetu', 'Tibs'],
                'correct' => 2,
                'order' => 6
            ],
            [
                'text' => 'What is the name of the ancient Ethiopian script?',
                'options' => ['Ge\'ez', 'Amharic', 'Fidel', 'Ethiopic'],
                'correct' => 0,
                'order' => 7
            ],
            [
                'text' => 'Which Ethiopian city is known for its rock-hewn churches?',
                'options' => ['Lalibela', 'Axum', 'Gondar', 'Harar'],
                'correct' => 0,
                'order' => 8
            ],
            [
                'text' => 'What is the traditional Ethiopian calendar based on?',
                'options' => ['Julian Calendar', 'Gregorian Calendar', 'Coptic Calendar', 'Islamic Calendar'],
                'correct' => 0,
                'order' => 9
            ],
            [
                'text' => 'Which Ethiopian mountain range is known as the "Roof of Africa"?',
                'options' => ['Simien Mountains', 'Bale Mountains', 'Choke Mountains', 'Menagesha Mountains'],
                'correct' => 0,
                'order' => 10
            ]
        ];

        // Add questions to the quiz
        foreach ($questions as $questionData) {
            $question = new Question();
            $question->setQuestionText($questionData['text']);
            $question->setOptions($questionData['options']);
            $question->setCorrectOption($questionData['correct']);
            $question->setOrderNumber($questionData['order']);
            $question->setQuiz($quiz);
            
            $this->entityManager->persist($question);
        }

        $this->entityManager->persist($quiz);
        $this->entityManager->flush();

        $this->io->success('Test quiz created successfully!');
        return Command::SUCCESS;
    }
} 