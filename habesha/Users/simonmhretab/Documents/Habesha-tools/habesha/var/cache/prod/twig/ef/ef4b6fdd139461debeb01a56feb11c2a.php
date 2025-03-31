<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* quiz/take.html.twig */
class __TwigTemplate_23dc52901d2bf6a7db534304bcba163b extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.html.twig", "quiz/take.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Take Quiz: ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "title", [], "any", false, false, false, 3), "html", null, true);
        yield " - Habesha Tools";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <style>
        .question-card {
            display: none;
        }
        .question-card.active {
            display: block;
        }
        .option-button {
            width: 100%;
            text-align: left;
            margin-bottom: 0.5rem;
            white-space: normal;
            height: auto;
            padding: 1rem;
        }
        .option-button.selected {
            background-color: #e3f2fd;
            border-color: #90caf9;
        }
        .option-button.correct {
            background-color: #c8e6c9;
            border-color: #81c784;
        }
        .option-button.incorrect {
            background-color: #ffcdd2;
            border-color: #e57373;
        }
        .progress {
            height: 0.5rem;
        }
        #results-container {
            display: none;
        }
    </style>
";
        yield from [];
    }

    // line 43
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 44
        yield "<div class=\"container py-5\">
    <div class=\"row justify-content-center\">
        <div class=\"col-lg-8\">
            <nav aria-label=\"breadcrumb\" class=\"mb-4\">
                <ol class=\"breadcrumb\">
                    <li class=\"breadcrumb-item\"><a href=\"";
        // line 49
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz");
        yield "\">Quizzes</a></li>
                    <li class=\"breadcrumb-item\"><a href=\"";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "id", [], "any", false, false, false, 50)]), "html", null, true);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "title", [], "any", false, false, false, 50), "html", null, true);
        yield "</a></li>
                    <li class=\"breadcrumb-item active\" aria-current=\"page\">Take Quiz</li>
                </ol>
            </nav>

            <div class=\"card\">
                <div class=\"card-body\">
                    <div class=\"d-flex justify-content-between align-items-center mb-4\">
                        <h1 class=\"h3 mb-0\">";
        // line 58
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "title", [], "any", false, false, false, 58), "html", null, true);
        yield "</h1>
                        <div class=\"text-muted\">
                            Question <span id=\"current-question\">1</span> of ";
        // line 60
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "questions", [], "any", false, false, false, 60)), "html", null, true);
        yield "
                        </div>
                    </div>

                    <div class=\"progress mb-4\">
                        <div class=\"progress-bar\" role=\"progressbar\" style=\"width: 0%\"></div>
                    </div>

                    <form id=\"quiz-form\" action=\"";
        // line 68
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz_submit", ["id" => CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "id", [], "any", false, false, false, 68)]), "html", null, true);
        yield "\" method=\"post\">
                        <div id=\"quiz-container\">
                            ";
        // line 70
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::sort($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "questions", [], "any", false, false, false, 70), function ($__a__, $__b__) use ($context, $macros) { $context["a"] = $__a__; $context["b"] = $__b__; return (CoreExtension::getAttribute($this->env, $this->source, ($context["a"] ?? null), "orderNumber", [], "any", false, false, false, 70) <=> CoreExtension::getAttribute($this->env, $this->source, ($context["b"] ?? null), "orderNumber", [], "any", false, false, false, 70)); }));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["question"]) {
            // line 71
            yield "                                <div class=\"question-card ";
            if (CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 71)) {
                yield "active";
            }
            yield "\" 
                                     data-question-index=\"";
            // line 72
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 72), "html", null, true);
            yield "\"
                                     data-correct-option=\"";
            // line 73
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "correctOption", [], "any", false, false, false, 73), "html", null, true);
            yield "\">
                                    <h5 class=\"card-title mb-4\">";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "questionText", [], "any", false, false, false, 74), "html", null, true);
            yield "</h5>
                                    <div class=\"options\">
                                        ";
            // line 76
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "options", [], "any", false, false, false, 76));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                // line 77
                yield "                                            <button type=\"button\" 
                                                    class=\"btn btn-outline-secondary option-button\"
                                                    data-option-index=\"";
                // line 79
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 79), "html", null, true);
                yield "\"
                                                    data-question-index=\"";
                // line 80
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "parent", [], "any", false, false, false, 80), "loop", [], "any", false, false, false, 80), "index0", [], "any", false, false, false, 80), "html", null, true);
                yield "\">
                                                ";
                // line 81
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["option"], "html", null, true);
                yield "
                                            </button>
                                        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            yield "                                        <input type=\"hidden\" name=\"answers[";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 84), "html", null, true);
            yield "]\" value=\"\">
                                    </div>
                                </div>
                            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['question'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        yield "                        </div>

                        <div id=\"results-container\" class=\"text-center\">
                            <h2 class=\"mb-4\">Quiz Results</h2>
                            <div class=\"display-4 mb-3\">
                                <span id=\"correct-answers\">0</span>/<span id=\"total-questions\">";
        // line 93
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "questions", [], "any", false, false, false, 93)), "html", null, true);
        yield "</span>
                            </div>
                            <div class=\"h5 mb-4\">
                                Score: <span id=\"score-percentage\">0</span>%
                            </div>
                            <div class=\"mb-4\">
                                <a href=\"";
        // line 99
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz_take", ["id" => CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "id", [], "any", false, false, false, 99)]), "html", null, true);
        yield "\" class=\"btn btn-primary me-2\">
                                    <i class=\"bi bi-arrow-clockwise\"></i> Try Again
                                </a>
                                <a href=\"";
        // line 102
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz");
        yield "\" class=\"btn btn-outline-secondary\">
                                    <i class=\"bi bi-list\"></i> Back to Quizzes
                                </a>
                            </div>
                        </div>

                        <div class=\"d-flex justify-content-between mt-4\" id=\"navigation-buttons\">
                            <button type=\"button\" class=\"btn btn-outline-primary\" id=\"prev-button\" disabled>
                                <i class=\"bi bi-arrow-left\"></i> Previous
                            </button>
                            <button type=\"button\" class=\"btn btn-primary\" id=\"next-button\">
                                Next <i class=\"bi bi-arrow-right\"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
";
        yield from [];
    }

    // line 124
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 125
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quizContainer = document.getElementById('quiz-container');
            const resultsContainer = document.getElementById('results-container');
            const navigationButtons = document.getElementById('navigation-buttons');
            const prevButton = document.getElementById('prev-button');
            const nextButton = document.getElementById('next-button');
            const currentQuestionSpan = document.getElementById('current-question');
            const progressBar = document.querySelector('.progress-bar');
            const quizForm = document.getElementById('quiz-form');
            
            const questions = document.querySelectorAll('.question-card');
            const totalQuestions = questions.length;
            let currentQuestionIndex = 0;
            let userAnswers = new Array(totalQuestions).fill(null);
            
            function updateNavigation() {
                prevButton.disabled = currentQuestionIndex === 0;
                if (currentQuestionIndex === totalQuestions - 1) {
                    nextButton.innerHTML = 'Finish <i class=\"bi bi-check-lg\"></i>';
                } else {
                    nextButton.innerHTML = 'Next <i class=\"bi bi-arrow-right\"></i>';
                }
                
                currentQuestionSpan.textContent = currentQuestionIndex + 1;
                progressBar.style.width = `\${((currentQuestionIndex + 1) / totalQuestions) * 100}%`;
            }
            
            function showQuestion(index) {
                questions.forEach(q => q.classList.remove('active'));
                questions[index].classList.add('active');
                currentQuestionIndex = index;
                updateNavigation();
            }
            
            function calculateResults() {
                let correctCount = 0;
                questions.forEach((question, index) => {
                    const correctOption = parseInt(question.dataset.correctOption);
                    if (userAnswers[index] === correctOption) {
                        correctCount++;
                    }
                });
                
                const percentage = Math.round((correctCount / totalQuestions) * 100);
                document.getElementById('correct-answers').textContent = correctCount;
                document.getElementById('score-percentage').textContent = percentage;
            }
            
            function showResults() {
                quizContainer.style.display = 'none';
                navigationButtons.style.display = 'none';
                resultsContainer.style.display = 'block';
                calculateResults();
            }
            
            // Handle option selection
            document.querySelectorAll('.option-button').forEach(button => {
                button.addEventListener('click', function() {
                    const questionCard = this.closest('.question-card');
                    const questionIndex = parseInt(questionCard.dataset.questionIndex);
                    const optionIndex = parseInt(this.dataset.optionIndex);
                    
                    // Remove previous selection
                    questionCard.querySelectorAll('.option-button').forEach(btn => {
                        btn.classList.remove('selected');
                    });
                    
                    // Add new selection
                    this.classList.add('selected');
                    userAnswers[questionIndex] = optionIndex;
                    
                    // Update hidden input
                    const hiddenInput = questionCard.querySelector('input[type=\"hidden\"]');
                    hiddenInput.value = optionIndex;
                    
                    // Enable next button if it was disabled
                    nextButton.disabled = false;
                });
            });
            
            // Navigation button handlers
            prevButton.addEventListener('click', function() {
                if (currentQuestionIndex > 0) {
                    showQuestion(currentQuestionIndex - 1);
                }
            });
            
            nextButton.addEventListener('click', function() {
                if (currentQuestionIndex === totalQuestions - 1) {
                    // Submit the form
                    quizForm.submit();
                } else if (currentQuestionIndex < totalQuestions - 1) {
                    showQuestion(currentQuestionIndex + 1);
                }
            });
            
            // Initialize
            showQuestion(0);
            nextButton.disabled = true;
        });
    </script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "quiz/take.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  325 => 125,  318 => 124,  292 => 102,  286 => 99,  277 => 93,  270 => 88,  251 => 84,  234 => 81,  230 => 80,  226 => 79,  222 => 77,  205 => 76,  200 => 74,  196 => 73,  192 => 72,  185 => 71,  168 => 70,  163 => 68,  152 => 60,  147 => 58,  134 => 50,  130 => 49,  123 => 44,  116 => 43,  74 => 6,  67 => 5,  54 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "quiz/take.html.twig", "/Users/simonmhretab/Documents/Habesha-tools/habesha/templates/quiz/take.html.twig");
    }
}
