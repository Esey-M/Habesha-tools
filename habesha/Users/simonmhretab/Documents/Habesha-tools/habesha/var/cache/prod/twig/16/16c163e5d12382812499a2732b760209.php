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

/* logo_remover/index.html.twig */
class __TwigTemplate_1e6c6207c0c71bcd6af7c31e8e979830 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "logo_remover/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Logo Remover - Habesha Tools";
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
            <h1 class=\"mb-4\">Logo Remover</h1>
            
            ";
        // line 11
        if ( !($context["isAuthenticated"] ?? null)) {
            // line 12
            yield "                <div class=\"alert alert-info mb-4\">
                    <i class=\"bi bi-info-circle me-2\"></i>
                    Free Usage: ";
            // line 14
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["remainingFreeUsage"] ?? null), "html", null, true);
            yield " images remaining today.
                    <a href=\"";
            // line 15
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
            yield "\" class=\"alert-link\">Register</a> or
                    <a href=\"";
            // line 16
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\" class=\"alert-link\">login</a> for unlimited access!
                </div>
            ";
        }
        // line 19
        yield "
            <div class=\"alert alert-info mb-4\">
                <i class=\"bi bi-info-circle me-2\"></i>
                Please note: Uploaded and processed images will be automatically deleted after 7 days.
            </div>

            ";
        // line 25
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start', ["attr" => ["class" => "card"]]);
        yield "
            <div class=\"card-body\">
                <div class=\"mb-3\">
                    ";
        // line 28
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "imageFile", [], "any", false, false, false, 28), 'label');
        yield "
                    ";
        // line 29
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "imageFile", [], "any", false, false, false, 29), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                    ";
        // line 30
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "imageFile", [], "any", false, false, false, 30), 'help');
        yield "
                    ";
        // line 31
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "imageFile", [], "any", false, false, false, 31), 'errors');
        yield "
                </div>

                <button type=\"submit\" class=\"btn btn-primary\">
                    <i class=\"bi bi-upload me-2\"></i>Upload Image
                </button>
            </div>
            ";
        // line 38
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        yield "

            ";
        // line 40
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["recent_processes"] ?? null)) > 0)) {
            // line 41
            yield "                <div class=\"mt-5\">
                    <h2 class=\"h4 mb-4\">Recent Images</h2>
                    <div class=\"row\">
                        ";
            // line 44
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["recent_processes"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["process"]) {
                // line 45
                yield "                            <div class=\"col-md-6 mb-4\">
                                <div class=\"card h-100\">
                                    <div class=\"card-header bg-transparent\">
                                        <h6 class=\"mb-0\">";
                // line 48
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["process"], "imageName", [], "any", false, false, false, 48), "html", null, true);
                yield "</h6>
                                    </div>
                                    
                                    ";
                // line 51
                if (CoreExtension::getAttribute($this->env, $this->source, $context["process"], "imageName", [], "any", false, false, false, 51)) {
                    // line 52
                    yield "                                        <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/images/" . CoreExtension::getAttribute($this->env, $this->source, $context["process"], "imageName", [], "any", false, false, false, 52))), "html", null, true);
                    yield "\" 
                                             class=\"card-img-top\" 
                                             alt=\"Original image\"
                                             style=\"max-height: 200px; object-fit: contain;\">
                                    ";
                }
                // line 57
                yield "                                    
                                    ";
                // line 58
                if (CoreExtension::getAttribute($this->env, $this->source, $context["process"], "resultImageName", [], "any", false, false, false, 58)) {
                    // line 59
                    yield "                                        <div class=\"card-header bg-transparent border-top\">
                                            <h6 class=\"mb-0\">Processed Result</h6>
                                        </div>
                                        <img src=\"";
                    // line 62
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/images/" . CoreExtension::getAttribute($this->env, $this->source, $context["process"], "resultImageName", [], "any", false, false, false, 62))), "html", null, true);
                    yield "\" 
                                             class=\"card-img-top\" 
                                             alt=\"Processed image\"
                                             style=\"max-height: 200px; object-fit: contain;\">
                                        <div class=\"card-body\">
                                            <div class=\"d-grid gap-2\">
                                                <a href=\"";
                    // line 68
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/images/" . CoreExtension::getAttribute($this->env, $this->source, $context["process"], "resultImageName", [], "any", false, false, false, 68))), "html", null, true);
                    yield "\" 
                                                   class=\"btn btn-success\" 
                                                   download=\"";
                    // line 70
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["process"], "resultImageName", [], "any", false, false, false, 70), "html", null, true);
                    yield "\">
                                                    <i class=\"bi bi-download me-2\"></i>Download Result
                                                </a>
                                            </div>
                                            <p class=\"card-text text-muted mt-2 text-center\">
                                                <small>Processed ";
                    // line 75
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["process"], "updatedAt", [], "any", false, false, false, 75), "M d, Y H:i"), "html", null, true);
                    yield "</small>
                                            </p>
                                        </div>
                                    ";
                } else {
                    // line 79
                    yield "                                        <div class=\"card-body\">
                                            <a href=\"";
                    // line 80
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logo_remover_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["process"], "id", [], "any", false, false, false, 80)]), "html", null, true);
                    yield "\" 
                                               class=\"btn btn-primary d-block\">
                                                <i class=\"bi bi-pencil me-2\"></i>Edit Image
                                            </a>
                                        </div>
                                    ";
                }
                // line 86
                yield "                                </div>
                            </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['process'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 89
            yield "                    </div>
                </div>
            ";
        }
        // line 92
        yield "        </div>
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
        return "logo_remover/index.html.twig";
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
        return array (  235 => 92,  230 => 89,  222 => 86,  213 => 80,  210 => 79,  203 => 75,  195 => 70,  190 => 68,  181 => 62,  176 => 59,  174 => 58,  171 => 57,  162 => 52,  160 => 51,  154 => 48,  149 => 45,  145 => 44,  140 => 41,  138 => 40,  133 => 38,  123 => 31,  119 => 30,  115 => 29,  111 => 28,  105 => 25,  97 => 19,  91 => 16,  87 => 15,  83 => 14,  79 => 12,  77 => 11,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "logo_remover/index.html.twig", "/Users/simonmhretab/Documents/Habesha-tools/habesha/templates/logo_remover/index.html.twig");
    }
}
