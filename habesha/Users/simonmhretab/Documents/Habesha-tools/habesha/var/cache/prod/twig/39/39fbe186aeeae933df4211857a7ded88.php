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

/* logo_remover/success.html.twig */
class __TwigTemplate_2e7333d1288ca4039cf40163a59165e2 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "logo_remover/success.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Logo Removed - Habesha Tools";
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
        <div class=\"col-12\">
            <div class=\"card shadow-sm\">
                <div class=\"card-body\">
                    <h1 class=\"card-title text-center mb-4\">Logo Removed Successfully!</h1>
                    
                    <div class=\"row mb-4\">
                        <div class=\"col-md-6\">
                            <div class=\"card\">
                                <div class=\"card-header\">Original Image</div>
                                <div class=\"card-body p-0\">
                                    <img src=\"";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Vich\UploaderBundle\Twig\Extension\UploaderExtensionRuntime')->asset(($context["image"] ?? null), "imageFile"), "html", null, true);
        yield "\" class=\"img-fluid\" alt=\"Original image\">
                                </div>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"card\">
                                <div class=\"card-header\">Processed Image</div>
                                <div class=\"card-body p-0\">
                                    <img src=\"";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/images/" . CoreExtension::getAttribute($this->env, $this->source, ($context["image"] ?? null), "resultImageName", [], "any", false, false, false, 26))), "html", null, true);
        yield "\" class=\"img-fluid\" alt=\"Processed image\">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=\"d-flex justify-content-between\">
                        <a href=\"";
        // line 33
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logo_remover");
        yield "\" class=\"btn btn-secondary\">Process Another Image</a>
                        <a href=\"";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/images/" . CoreExtension::getAttribute($this->env, $this->source, ($context["image"] ?? null), "resultImageName", [], "any", false, false, false, 34))), "html", null, true);
        yield "\" class=\"btn btn-primary\" download>Download Result</a>
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
        return "logo_remover/success.html.twig";
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
        return array (  109 => 34,  105 => 33,  95 => 26,  84 => 18,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "logo_remover/success.html.twig", "/Users/simonmhretab/Documents/Habesha-tools/habesha/templates/logo_remover/success.html.twig");
    }
}
