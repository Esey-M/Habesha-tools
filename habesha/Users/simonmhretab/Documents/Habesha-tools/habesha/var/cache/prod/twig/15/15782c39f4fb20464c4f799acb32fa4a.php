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

/* quiz/show.html.twig */
class __TwigTemplate_b1f4ed7242a8dfa83d6cc671f6d8fbab extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "quiz/show.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "title", [], "any", false, false, false, 3), "html", null, true);
        yield " - Habesha Tools";
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
    <div class=\"row justify-content-center\">
        <div class=\"col-lg-8\">
            <nav aria-label=\"breadcrumb\" class=\"mb-4\">
                <ol class=\"breadcrumb\">
                    <li class=\"breadcrumb-item\"><a href=\"";
        // line 11
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz");
        yield "\">Quizzes</a></li>
                    <li class=\"breadcrumb-item active\" aria-current=\"page\">";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "title", [], "any", false, false, false, 12), "html", null, true);
        yield "</li>
                </ol>
            </nav>

            <div class=\"card\">
                <div class=\"card-body\">
                    <h1 class=\"h3 mb-4\">";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "title", [], "any", false, false, false, 18), "html", null, true);
        yield "</h1>
                    
                    ";
        // line 20
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "description", [], "any", false, false, false, 20)) {
            // line 21
            yield "                        <p class=\"text-muted mb-4\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "description", [], "any", false, false, false, 21), "html", null, true);
            yield "</p>
                    ";
        }
        // line 23
        yield "
                    <div class=\"mb-4\">
                        <h5 class=\"mb-3\">Questions (";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "questions", [], "any", false, false, false, 25)), "html", null, true);
        yield ")</h5>
                        <div class=\"list-group\">
                            ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::sort($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "questions", [], "any", false, false, false, 27), function ($__a__, $__b__) use ($context, $macros) { $context["a"] = $__a__; $context["b"] = $__b__; return (CoreExtension::getAttribute($this->env, $this->source, ($context["a"] ?? null), "orderNumber", [], "any", false, false, false, 27) <=> CoreExtension::getAttribute($this->env, $this->source, ($context["b"] ?? null), "orderNumber", [], "any", false, false, false, 27)); }));
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
            // line 28
            yield "                                <div class=\"list-group-item\">
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <div>
                                            <h6 class=\"mb-1\">Question ";
            // line 31
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 31), "html", null, true);
            yield "</h6>
                                            <p class=\"mb-1\">";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "questionText", [], "any", false, false, false, 32), "html", null, true);
            yield "</p>
                                            <small class=\"text-muted\">
                                                ";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["question"], "options", [], "any", false, false, false, 34)), "html", null, true);
            yield " options
                                            </small>
                                        </div>
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
        // line 40
        yield "                        </div>
                    </div>

                    <div class=\"d-flex gap-2\">
                        <a href=\"";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz_take", ["id" => CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "id", [], "any", false, false, false, 44)]), "html", null, true);
        yield "\" class=\"btn btn-primary\">
                            <i class=\"bi bi-play-fill\"></i> Take Quiz
                        </a>
                        <a href=\"";
        // line 47
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz");
        yield "\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-arrow-left\"></i> Back to Quizzes
                        </a>
                    </div>
                </div>
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
        return "quiz/show.html.twig";
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
        return array (  176 => 47,  170 => 44,  164 => 40,  144 => 34,  139 => 32,  135 => 31,  130 => 28,  113 => 27,  108 => 25,  104 => 23,  98 => 21,  96 => 20,  91 => 18,  82 => 12,  78 => 11,  71 => 6,  64 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "quiz/show.html.twig", "/Users/simonmhretab/Documents/Habesha-tools/habesha/templates/quiz/show.html.twig");
    }
}
