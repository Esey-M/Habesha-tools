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

/* quiz/coming_soon.html.twig */
class __TwigTemplate_24f30b4de9f458a1ae71319964d41cde extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "quiz/coming_soon.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Quiz - Coming Soon - Habesha Tools";
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
        <div class=\"col-lg-8 text-center\">
            <div class=\"card shadow-sm\">
                <div class=\"card-body py-5\">
                    <h1 class=\"display-4 mb-4\">🎯 Quiz Feature Coming Soon!</h1>
                    
                    <div class=\"mb-4\">
                        <i class=\"fas fa-tools fa-3x text-primary mb-3\"></i>
                    </div>
                    
                    <p class=\"lead mb-4\">
                        We're working hard to bring you an exciting new quiz feature. Stay tuned!
                    </p>
                    
                    <div class=\"features mb-4\">
                        <h3 class=\"h5 mb-3\">What to expect:</h3>
                        <div class=\"row justify-content-center\">
                            <div class=\"col-md-8\">
                                <ul class=\"list-unstyled text-start\">
                                    <li class=\"mb-2\">✨ Interactive Learning Experience</li>
                                    <li class=\"mb-2\">📚 Comprehensive Question Bank</li>
                                    <li class=\"mb-2\">🏆 Achievement System</li>
                                    <li class=\"mb-2\">📊 Progress Tracking</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <a href=\"";
        // line 35
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"btn btn-primary btn-lg\">
                        Return to Home
                    </a>
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
        return "quiz/coming_soon.html.twig";
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
        return array (  101 => 35,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "quiz/coming_soon.html.twig", "/Users/simonmhretab/Documents/Habesha-tools/habesha/templates/quiz/coming_soon.html.twig");
    }
}
