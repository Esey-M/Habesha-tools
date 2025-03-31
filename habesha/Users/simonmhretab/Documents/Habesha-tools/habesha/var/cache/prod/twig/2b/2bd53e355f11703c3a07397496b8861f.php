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

/* quiz/new.html.twig */
class __TwigTemplate_cabf25bc824040b979d644aeb8036888 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "quiz/new.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Create Quiz - Habesha Tools";
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
            position: relative;
            margin-bottom: 1rem;
        }
        .remove-question {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
        }
        .option-row {
            position: relative;
            margin-bottom: 0.5rem;
        }
        .remove-option {
            position: absolute;
            top: 50%;
            right: -2rem;
            transform: translateY(-50%);
        }
    </style>
";
        yield from [];
    }

    // line 30
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 31
        yield "<div class=\"container py-5\">
    <div class=\"row\">
        <div class=\"col-12\">
            <h1 class=\"mb-4\">Create New Quiz</h1>

            ";
        // line 36
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
        yield "
                <div class=\"card mb-4\">
                    <div class=\"card-body\">
                        <div class=\"mb-3\">
                            ";
        // line 40
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "title", [], "any", false, false, false, 40), 'label');
        yield "
                            ";
        // line 41
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "title", [], "any", false, false, false, 41), 'widget');
        yield "
                            ";
        // line 42
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "title", [], "any", false, false, false, 42), 'errors');
        yield "
                        </div>

                        <div class=\"mb-3\">
                            ";
        // line 46
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "description", [], "any", false, false, false, 46), 'label');
        yield "
                            ";
        // line 47
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "description", [], "any", false, false, false, 47), 'widget');
        yield "
                            ";
        // line 48
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "description", [], "any", false, false, false, 48), 'errors');
        yield "
                        </div>
                    </div>
                </div>

                <h3 class=\"mb-3\">Questions</h3>
                <div class=\"questions-wrapper\" 
                     data-prototype=\"";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "questions", [], "any", false, false, false, 55), "vars", [], "any", false, false, false, 55), "prototype", [], "any", false, false, false, 55), 'widget'), "html_attr");
        yield "\"
                     data-index=\"";
        // line 56
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "questions", [], "any", false, false, false, 56)), "html", null, true);
        yield "\">
                    
                    ";
        // line 58
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "questions", [], "any", false, false, false, 58));
        foreach ($context['_seq'] as $context["_key"] => $context["questionForm"]) {
            // line 59
            yield "                        <div class=\"card question-card\">
                            <div class=\"card-body\">
                                <button type=\"button\" class=\"btn btn-danger btn-sm remove-question\">
                                    <i class=\"bi bi-trash\"></i>
                                </button>

                                <div class=\"mb-3\">
                                    ";
            // line 66
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["questionForm"], "questionText", [], "any", false, false, false, 66), 'label', ["label" => "Question"]);
            yield "
                                    ";
            // line 67
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["questionForm"], "questionText", [], "any", false, false, false, 67), 'widget');
            yield "
                                    ";
            // line 68
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["questionForm"], "questionText", [], "any", false, false, false, 68), 'errors');
            yield "
                                </div>

                                <div class=\"mb-3 options-wrapper\"
                                     data-prototype=\"";
            // line 72
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["questionForm"], "options", [], "any", false, false, false, 72), "vars", [], "any", false, false, false, 72), "prototype", [], "any", false, false, false, 72), 'widget'), "html_attr");
            yield "\"
                                     data-index=\"";
            // line 73
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["questionForm"], "options", [], "any", false, false, false, 73)), "html", null, true);
            yield "\">
                                    <label>Options</label>
                                    ";
            // line 75
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["questionForm"], "options", [], "any", false, false, false, 75));
            foreach ($context['_seq'] as $context["_key"] => $context["optionForm"]) {
                // line 76
                yield "                                        <div class=\"option-row\">
                                            ";
                // line 77
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["optionForm"], 'widget');
                yield "
                                            <button type=\"button\" class=\"btn btn-danger btn-sm remove-option\">
                                                <i class=\"bi bi-x\"></i>
                                            </button>
                                        </div>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['optionForm'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 83
            yield "                                    <button type=\"button\" class=\"btn btn-outline-secondary btn-sm add-option\">
                                        <i class=\"bi bi-plus\"></i> Add Option
                                    </button>
                                </div>

                                <div class=\"row\">
                                    <div class=\"col-md-6\">
                                        <div class=\"mb-3\">
                                            ";
            // line 91
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["questionForm"], "correctOption", [], "any", false, false, false, 91), 'label', ["label" => "Correct Option (0-based index)"]);
            yield "
                                            ";
            // line 92
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["questionForm"], "correctOption", [], "any", false, false, false, 92), 'widget');
            yield "
                                            ";
            // line 93
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["questionForm"], "correctOption", [], "any", false, false, false, 93), 'errors');
            yield "
                                        </div>
                                    </div>
                                    <div class=\"col-md-6\">
                                        <div class=\"mb-3\">
                                            ";
            // line 98
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["questionForm"], "orderNumber", [], "any", false, false, false, 98), 'label', ["label" => "Question Order"]);
            yield "
                                            ";
            // line 99
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["questionForm"], "orderNumber", [], "any", false, false, false, 99), 'widget');
            yield "
                                            ";
            // line 100
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["questionForm"], "orderNumber", [], "any", false, false, false, 100), 'errors');
            yield "
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['questionForm'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 107
        yield "                </div>

                <button type=\"button\" class=\"btn btn-outline-primary mb-4\" id=\"add-question\">
                    <i class=\"bi bi-plus\"></i> Add Question
                </button>

                <div class=\"d-grid\">
                    <button type=\"submit\" class=\"btn btn-primary btn-lg\">Create Quiz</button>
                </div>
            ";
        // line 116
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        yield "
        </div>
    </div>
</div>
";
        yield from [];
    }

    // line 122
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 123
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const questionsWrapper = document.querySelector('.questions-wrapper');
            let questionIndex = parseInt(questionsWrapper.dataset.index);

            // Add new question
            document.getElementById('add-question').addEventListener('click', function() {
                const prototype = questionsWrapper.dataset.prototype;
                const newForm = prototype.replace(/__name__/g, questionIndex);
                const questionCard = document.createElement('div');
                questionCard.className = 'card question-card';
                questionCard.innerHTML = `
                    <div class=\"card-body\">
                        <button type=\"button\" class=\"btn btn-danger btn-sm remove-question\">
                            <i class=\"bi bi-trash\"></i>
                        </button>
                        \${newForm}
                    </div>
                `;
                questionsWrapper.appendChild(questionCard);
                
                // Set initial order number
                const orderInput = questionCard.querySelector('[id\$=\"_orderNumber\"]');
                if (orderInput) {
                    orderInput.value = questionIndex + 1;
                }

                // Initialize option handling for the new question
                initializeOptionHandling(questionCard);
                questionIndex++;
            });

            // Remove question
            questionsWrapper.addEventListener('click', function(e) {
                if (e.target.closest('.remove-question')) {
                    e.target.closest('.question-card').remove();
                }
            });

            // Initialize option handling for existing questions
            document.querySelectorAll('.question-card').forEach(initializeOptionHandling);

            function initializeOptionHandling(questionCard) {
                const optionsWrapper = questionCard.querySelector('.options-wrapper');
                if (!optionsWrapper) return;

                let optionIndex = parseInt(optionsWrapper.dataset.index);

                // Add new option
                const addOptionBtn = questionCard.querySelector('.add-option');
                if (addOptionBtn) {
                    addOptionBtn.addEventListener('click', function() {
                        const prototype = optionsWrapper.dataset.prototype;
                        const newForm = prototype.replace(/__name__/g, optionIndex);
                        const optionRow = document.createElement('div');
                        optionRow.className = 'option-row';
                        optionRow.innerHTML = `
                            \${newForm}
                            <button type=\"button\" class=\"btn btn-danger btn-sm remove-option\">
                                <i class=\"bi bi-x\"></i>
                            </button>
                        `;
                        addOptionBtn.before(optionRow);
                        optionIndex++;
                    });
                }

                // Remove option
                optionsWrapper.addEventListener('click', function(e) {
                    if (e.target.closest('.remove-option')) {
                        e.target.closest('.option-row').remove();
                    }
                });
            }
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
        return "quiz/new.html.twig";
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
        return array (  295 => 123,  288 => 122,  278 => 116,  267 => 107,  254 => 100,  250 => 99,  246 => 98,  238 => 93,  234 => 92,  230 => 91,  220 => 83,  208 => 77,  205 => 76,  201 => 75,  196 => 73,  192 => 72,  185 => 68,  181 => 67,  177 => 66,  168 => 59,  164 => 58,  159 => 56,  155 => 55,  145 => 48,  141 => 47,  137 => 46,  130 => 42,  126 => 41,  122 => 40,  115 => 36,  108 => 31,  101 => 30,  72 => 6,  65 => 5,  54 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "quiz/new.html.twig", "/Users/simonmhretab/Documents/Habesha-tools/habesha/templates/quiz/new.html.twig");
    }
}
