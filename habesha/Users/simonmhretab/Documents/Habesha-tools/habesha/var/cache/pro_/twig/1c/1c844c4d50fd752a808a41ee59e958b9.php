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

/* quiz/result.html.twig */
class __TwigTemplate_803f127aed54ba00d6f829f8261d27e5 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "quiz/result.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Quiz Results - Habesha Tools";
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
        .question-feedback {
            margin-bottom: 1.5rem;
            padding: 1rem;
            border-radius: 0.5rem;
        }
        .question-feedback.correct {
            background-color: #e8f5e9;
            border: 1px solid #c8e6c9;
        }
        .question-feedback.incorrect {
            background-color: #ffebee;
            border: 1px solid #ffcdd2;
        }
        .option {
            padding: 0.5rem;
            margin: 0.25rem 0;
            border-radius: 0.25rem;
        }
        .option.selected {
            background-color: #e3f2fd;
            border: 1px solid #90caf9;
        }
        .option.correct {
            background-color: #c8e6c9;
            border: 1px solid #81c784;
        }
    </style>
";
        yield from [];
    }

    // line 37
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 38
        yield "<div class=\"container py-5\">
    <div class=\"row justify-content-center\">
        <div class=\"col-lg-8\">
            <nav aria-label=\"breadcrumb\" class=\"mb-4\">
                <ol class=\"breadcrumb\">
                    <li class=\"breadcrumb-item\"><a href=\"";
        // line 43
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz");
        yield "\">Quizzes</a></li>
                    <li class=\"breadcrumb-item\"><a href=\"";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["result"] ?? null), "quiz", [], "any", false, false, false, 44), "id", [], "any", false, false, false, 44)]), "html", null, true);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["result"] ?? null), "quiz", [], "any", false, false, false, 44), "title", [], "any", false, false, false, 44), "html", null, true);
        yield "</a></li>
                    <li class=\"breadcrumb-item active\" aria-current=\"page\">Results</li>
                </ol>
            </nav>

            <div class=\"card\">
                <div class=\"card-body\">
                    <div class=\"text-center mb-4\">
                        <h1 class=\"h3 mb-3\">Quiz Results</h1>
                        <div class=\"display-4 mb-3\">
                            ";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["result"] ?? null), "correctAnswers", [], "any", false, false, false, 54), "html", null, true);
        yield "/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["result"] ?? null), "totalQuestions", [], "any", false, false, false, 54), "html", null, true);
        yield "
                        </div>
                        <div class=\"h5 mb-4\">
                            Score: ";
        // line 57
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["result"] ?? null), "scorePercentage", [], "any", false, false, false, 57), "html", null, true);
        yield "%
                        </div>
                    </div>

                    <div class=\"mb-4\">
                        <a href=\"";
        // line 62
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz_take", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["result"] ?? null), "quiz", [], "any", false, false, false, 62), "id", [], "any", false, false, false, 62)]), "html", null, true);
        yield "\" class=\"btn btn-primary me-2\">
                            <i class=\"bi bi-arrow-clockwise\"></i> Try Again
                        </a>
                        <a href=\"";
        // line 65
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz");
        yield "\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-list\"></i> Back to Quizzes
                        </a>
                    </div>

                    <hr class=\"my-4\">

                    <h2 class=\"h4 mb-3\">Question Review</h2>
                    ";
        // line 73
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::sort($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["result"] ?? null), "quiz", [], "any", false, false, false, 73), "questions", [], "any", false, false, false, 73), function ($__a__, $__b__) use ($context, $macros) { $context["a"] = $__a__; $context["b"] = $__b__; return (CoreExtension::getAttribute($this->env, $this->source, ($context["a"] ?? null), "orderNumber", [], "any", false, false, false, 73) <=> CoreExtension::getAttribute($this->env, $this->source, ($context["b"] ?? null), "orderNumber", [], "any", false, false, false, 73)); }));
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
            // line 74
            yield "                        ";
            $context["userAnswer"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["result"] ?? null), "answers", [], "any", false, true, false, 74), CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 74), [], "array", true, true, false, 74)) ? (Twig\Extension\CoreExtension::default((($_v0 = CoreExtension::getAttribute($this->env, $this->source, ($context["result"] ?? null), "answers", [], "any", false, false, false, 74)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 74)] ?? null) : null), null)) : (null));
            // line 75
            yield "                        ";
            $context["isCorrect"] = (($context["userAnswer"] ?? null) == CoreExtension::getAttribute($this->env, $this->source, $context["question"], "correctOption", [], "any", false, false, false, 75));
            // line 76
            yield "                        <div class=\"question-feedback ";
            if (($context["isCorrect"] ?? null)) {
                yield "correct";
            } else {
                yield "incorrect";
            }
            yield "\">
                            <h5 class=\"mb-3\">Question ";
            // line 77
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 77), "html", null, true);
            yield "</h5>
                            <p class=\"mb-3\">";
            // line 78
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "questionText", [], "any", false, false, false, 78), "html", null, true);
            yield "</p>
                            <div class=\"options\">
                                ";
            // line 80
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "options", [], "any", false, false, false, 80));
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
                // line 81
                yield "                                    <div class=\"option 
                                        ";
                // line 82
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 82) == ($context["userAnswer"] ?? null))) {
                    yield "selected";
                }
                // line 83
                yield "                                        ";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 83) == CoreExtension::getAttribute($this->env, $this->source, $context["question"], "correctOption", [], "any", false, false, false, 83))) {
                    yield "correct";
                }
                yield "\">
                                        ";
                // line 84
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["option"], "html", null, true);
                yield "
                                        ";
                // line 85
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 85) == CoreExtension::getAttribute($this->env, $this->source, $context["question"], "correctOption", [], "any", false, false, false, 85))) {
                    // line 86
                    yield "                                            <i class=\"bi bi-check-circle-fill text-success ms-2\"></i>
                                        ";
                }
                // line 88
                yield "                                        ";
                if (((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 88) == ($context["userAnswer"] ?? null)) &&  !($context["isCorrect"] ?? null))) {
                    // line 89
                    yield "                                            <i class=\"bi bi-x-circle-fill text-danger ms-2\"></i>
                                        ";
                }
                // line 91
                yield "                                    </div>
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
            // line 93
            yield "                            </div>
                            ";
            // line 94
            if ( !($context["isCorrect"] ?? null)) {
                // line 95
                yield "                                <div class=\"mt-2 text-danger\">
                                    <small>Your answer was incorrect. The correct answer is: ";
                // line 96
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v1 = CoreExtension::getAttribute($this->env, $this->source, $context["question"], "options", [], "any", false, false, false, 96)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[CoreExtension::getAttribute($this->env, $this->source, $context["question"], "correctOption", [], "any", false, false, false, 96)] ?? null) : null), "html", null, true);
                yield "</small>
                                </div>
                            ";
            }
            // line 99
            yield "                        </div>
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
        // line 101
        yield "                </div>
            </div>
        </div>
    </div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "quiz/result.html.twig";
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
        return array (  306 => 101,  291 => 99,  285 => 96,  282 => 95,  280 => 94,  277 => 93,  262 => 91,  258 => 89,  255 => 88,  251 => 86,  249 => 85,  245 => 84,  238 => 83,  234 => 82,  231 => 81,  214 => 80,  209 => 78,  205 => 77,  196 => 76,  193 => 75,  190 => 74,  173 => 73,  162 => 65,  156 => 62,  148 => 57,  140 => 54,  125 => 44,  121 => 43,  114 => 38,  107 => 37,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "quiz/result.html.twig", "/Users/simonmhretab/Documents/Habesha-tools/habesha/templates/quiz/result.html.twig");
    }
}
