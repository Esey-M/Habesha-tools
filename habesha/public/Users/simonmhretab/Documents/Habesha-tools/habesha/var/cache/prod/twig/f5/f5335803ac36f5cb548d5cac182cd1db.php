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

/* home/index.html.twig */
class __TwigTemplate_743d99916226b3e045f4554aea5dafd0 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "home/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Habesha Tools - Home";
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
        yield "<div class=\"container mt-5\">
    <h1 class=\"text-center mb-5\">Welcome to Habesha Tools</h1>
    
    <div class=\"row\">
        <div class=\"col-md-4 mb-4\">
            <div class=\"card h-100\">
                <div class=\"card-body\">
                    <h5 class=\"card-title\">Background Remover</h5>
                    <p class=\"card-text\">Remove backgrounds from your images using AI technology.</p>
                    <a href=\"";
        // line 15
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_background_remover");
        yield "\" class=\"btn btn-primary\">Try it now</a>
                </div>
            </div>
        </div>
        
        <div class=\"col-md-4 mb-4\">
            <div class=\"card h-100\">
                <div class=\"card-body\">
                    <h5 class=\"card-title\">Logo Remover</h5>
                    <p class=\"card-text\">Remove logos and watermarks from images.</p>
                    <a href=\"";
        // line 25
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logo_remover");
        yield "\" class=\"btn btn-primary\">Try it now</a>
                </div>
            </div>
        </div>
        
        <div class=\"col-md-4 mb-4\">
            <div class=\"card h-100\">
                <div class=\"card-body\">
                    <h5 class=\"card-title\">Quiz System</h5>
                    <p class=\"card-text\">Create and take quizzes on various topics.</p>
                    <a href=\"";
        // line 35
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz");
        yield "\" class=\"btn btn-primary\">Try it now</a>
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
        return "home/index.html.twig";
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
        return array (  107 => 35,  94 => 25,  81 => 15,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "home/index.html.twig", "/Users/simonmhretab/Documents/Habesha-tools/habesha/templates/home/index.html.twig");
    }
}
