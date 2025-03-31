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

/* background_remover/success.html.twig */
class __TwigTemplate_440fdb605798092a7eebba7ec8abc06b extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "background_remover/success.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Background Removed Successfully - Habesha Tools";
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
    <div class=\"row\">
        <div class=\"col-md-10 mx-auto\">
            <div class=\"card shadow-sm\">
                <div class=\"card-body\">
                    <div class=\"text-center mb-4\">
                        <i class=\"bi bi-check-circle-fill text-success display-1\"></i>
                        <h1 class=\"card-title mt-3\">Background Removed Successfully!</h1>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <div class=\"card\">
                                <div class=\"card-header\">
                                    <h5 class=\"card-title mb-0\">Original Image</h5>
                                </div>
                                <div class=\"card-body\">
                                    <img src=\"";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Vich\UploaderBundle\Twig\Extension\UploaderExtensionRuntime')->asset(($context["image_process"] ?? null), "imageFile"), "html", null, true);
        yield "\" 
                                         class=\"img-fluid rounded\" 
                                         alt=\"Original image\">
                                </div>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"card\">
                                <div class=\"card-header\">
                                    <h5 class=\"card-title mb-0\">Processed Image</h5>
                                </div>
                                <div class=\"card-body\">
                                    <img src=\"";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/images/" . CoreExtension::getAttribute($this->env, $this->source, ($context["image_process"] ?? null), "resultImageName", [], "any", false, false, false, 35))), "html", null, true);
        yield "\" 
                                         class=\"img-fluid rounded\" 
                                         alt=\"Processed image\">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=\"text-center mt-4\">
                        <div class=\"btn-group\">
                            <a href=\"";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/images/" . CoreExtension::getAttribute($this->env, $this->source, ($context["image_process"] ?? null), "resultImageName", [], "any", false, false, false, 45))), "html", null, true);
        yield "\" 
                               class=\"btn btn-success\" 
                               download=\"processed_image.png\">
                                <i class=\"bi bi-download me-2\"></i>Download Result
                            </a>
                            <a href=\"";
        // line 50
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_background_remover");
        yield "\" class=\"btn btn-primary\">
                                <i class=\"bi bi-arrow-repeat me-2\"></i>Process Another Image
                            </a>
                            <a href=\"";
        // line 53
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"btn btn-outline-secondary\">
                                <i class=\"bi bi-house me-2\"></i>Return to Home
                            </a>
                        </div>
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
        return "background_remover/success.html.twig";
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
        return array (  131 => 53,  125 => 50,  117 => 45,  104 => 35,  89 => 23,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "background_remover/success.html.twig", "/Users/simonmhretab/Documents/Habesha-tools/habesha/templates/background_remover/success.html.twig");
    }
}
