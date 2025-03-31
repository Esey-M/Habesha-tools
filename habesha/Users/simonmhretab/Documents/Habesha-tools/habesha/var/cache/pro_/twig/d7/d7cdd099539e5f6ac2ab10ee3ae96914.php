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

/* quiz/index.html.twig */
class __TwigTemplate_380fd9fb296dab358225bb2fe497a84b extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "quiz/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Quizzes - Habesha Tools";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "<div class=\"container py-5\">
    <div class=\"row mb-4\">
        <div class=\"col-md-8\">
            <h1>Available Quizzes</h1>
        </div>
        <div class=\"col-md-4 text-end\">
            <a href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz_new");
        yield "\" class=\"btn btn-primary\">
                <i class=\"bi bi-plus-circle\"></i> Create New Quiz
            </a>
        </div>
    </div>

    <div class=\"row\">
        ";
        // line 19
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["quizzes"] ?? null)) > 0)) {
            // line 20
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["quizzes"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["quiz"]) {
                // line 21
                yield "                <div class=\"col-md-6 mb-4\">
                    <div class=\"card h-100\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">";
                // line 24
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "title", [], "any", false, false, false, 24), "html", null, true);
                yield "</h5>
                            <p class=\"card-text\">";
                // line 25
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "description", [], "any", false, false, false, 25), "html", null, true);
                yield "</p>
                            <p class=\"text-muted\">
                                <small>";
                // line 27
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "questions", [], "any", false, false, false, 27)), "html", null, true);
                yield " questions</small> •
                                <small>Created ";
                // line 28
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "createdAt", [], "any", false, false, false, 28), "Y-m-d H:i"), "html", null, true);
                yield "</small>
                            </p>
                        </div>
                        <div class=\"card-footer bg-transparent\">
                            <div class=\"d-flex justify-content-between\">
                                <a href=\"";
                // line 33
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 33)]), "html", null, true);
                yield "\" class=\"btn btn-outline-primary\">View Details</a>
                                <a href=\"";
                // line 34
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz_take", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 34)]), "html", null, true);
                yield "\" class=\"btn btn-primary\">Take Quiz</a>
                            </div>
                        </div>
                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['quiz'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            yield "        ";
        } else {
            // line 41
            yield "            <div class=\"col-12\">
                <div class=\"alert alert-info\">
                    No quizzes available yet. <a href=\"";
            // line 43
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz_new");
            yield "\">Create one now!</a>
                </div>
            </div>
        ";
        }
        // line 47
        yield "    </div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "quiz/index.html.twig";
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
        return array (  151 => 47,  144 => 43,  140 => 41,  137 => 40,  125 => 34,  121 => 33,  113 => 28,  109 => 27,  104 => 25,  100 => 24,  95 => 21,  90 => 20,  88 => 19,  78 => 12,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "quiz/index.html.twig", "/Users/simonmhretab/Documents/Habesha-tools/habesha/templates/quiz/index.html.twig");
    }
}
