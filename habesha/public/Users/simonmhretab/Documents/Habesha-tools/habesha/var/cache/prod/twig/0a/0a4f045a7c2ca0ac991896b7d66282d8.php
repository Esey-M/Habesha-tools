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

/* background_remover/index.html.twig */
class __TwigTemplate_155a2499dbec185eb5310c7f1f41fd7e extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "background_remover/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Remove Image Background - Habesha Tools";
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
            <h1 class=\"mb-4\">";
        // line 9
        yield from         $this->unwrap()->yieldBlock("title", $context, $blocks);
        yield "</h1>
            
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
        if (($context["error"] ?? null)) {
            // line 26
            yield "                <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    ";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["error"] ?? null), "html", null, true);
            yield "
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                </div>
            ";
        }
        // line 31
        yield "
            ";
        // line 32
        if (($context["success"] ?? null)) {
            // line 33
            yield "                <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                    ";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["success"] ?? null), "html", null, true);
            yield "
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                </div>
            ";
        }
        // line 38
        yield "
            ";
        // line 39
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start', ["attr" => ["class" => "card"]]);
        yield "
            <div class=\"card-body\">
                <div class=\"mb-3\">
                    ";
        // line 42
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "imageFile", [], "any", false, false, false, 42), 'label');
        yield "
                    ";
        // line 43
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "imageFile", [], "any", false, false, false, 43), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                    ";
        // line 44
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "imageFile", [], "any", false, false, false, 44), 'help');
        yield "
                    ";
        // line 45
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "imageFile", [], "any", false, false, false, 45), 'errors');
        yield "
                </div>

                <button type=\"submit\" class=\"btn btn-primary\">
                    <i class=\"bi bi-upload me-2\"></i>Upload & Remove Background
                </button>
            </div>
            ";
        // line 52
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        yield "

            ";
        // line 54
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["recentProcesses"] ?? null)) > 0)) {
            // line 55
            yield "                <div class=\"mt-5\">
                    <h2 class=\"h4 mb-4\">Recent Images</h2>
                    <div class=\"row\">
                        ";
            // line 58
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["recentProcesses"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["process"]) {
                // line 59
                yield "                            <div class=\"col-md-6 mb-4\">
                                <div class=\"card h-100\">
                                    <div class=\"card-header bg-transparent\">
                                        <h6 class=\"mb-0\">";
                // line 62
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["process"], "imageName", [], "any", false, false, false, 62), "html", null, true);
                yield "</h6>
                                    </div>
                                    
                                    ";
                // line 65
                if (CoreExtension::getAttribute($this->env, $this->source, $context["process"], "imageName", [], "any", false, false, false, 65)) {
                    // line 66
                    yield "                                        <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/images/" . CoreExtension::getAttribute($this->env, $this->source, $context["process"], "imageName", [], "any", false, false, false, 66))), "html", null, true);
                    yield "\" 
                                             class=\"card-img-top\" 
                                             alt=\"Original image\"
                                             style=\"max-height: 200px; object-fit: contain;\">
                                    ";
                }
                // line 71
                yield "                                    
                                    ";
                // line 72
                if (CoreExtension::getAttribute($this->env, $this->source, $context["process"], "resultImageName", [], "any", false, false, false, 72)) {
                    // line 73
                    yield "                                        <div class=\"card-header bg-transparent border-top\">
                                            <h6 class=\"mb-0\">Processed Result</h6>
                                        </div>
                                        <img src=\"";
                    // line 76
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/images/" . CoreExtension::getAttribute($this->env, $this->source, $context["process"], "resultImageName", [], "any", false, false, false, 76))), "html", null, true);
                    yield "\" 
                                             class=\"card-img-top\" 
                                             alt=\"Processed image\"
                                             style=\"max-height: 200px; object-fit: contain;\">
                                        <div class=\"card-body\">
                                            <div class=\"d-grid gap-2\">
                                                <a href=\"";
                    // line 82
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/images/" . CoreExtension::getAttribute($this->env, $this->source, $context["process"], "resultImageName", [], "any", false, false, false, 82))), "html", null, true);
                    yield "\" 
                                                   class=\"btn btn-success\" 
                                                   download=\"";
                    // line 84
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["process"], "resultImageName", [], "any", false, false, false, 84), "html", null, true);
                    yield "\">
                                                    <i class=\"bi bi-download me-2\"></i>Download Result
                                                </a>
                                            </div>
                                            <p class=\"card-text text-muted mt-2 text-center\">
                                                <small>Processed ";
                    // line 89
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["process"], "updatedAt", [], "any", false, false, false, 89), "M d, Y H:i"), "html", null, true);
                    yield "</small>
                                            </p>
                                        </div>
                                    ";
                }
                // line 93
                yield "                                </div>
                            </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['process'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 96
            yield "                    </div>
                </div>
            ";
        }
        // line 99
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
        return "background_remover/index.html.twig";
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
        return array (  256 => 99,  251 => 96,  243 => 93,  236 => 89,  228 => 84,  223 => 82,  214 => 76,  209 => 73,  207 => 72,  204 => 71,  195 => 66,  193 => 65,  187 => 62,  182 => 59,  178 => 58,  173 => 55,  171 => 54,  166 => 52,  156 => 45,  152 => 44,  148 => 43,  144 => 42,  138 => 39,  135 => 38,  128 => 34,  125 => 33,  123 => 32,  120 => 31,  113 => 27,  110 => 26,  108 => 25,  100 => 19,  94 => 16,  90 => 15,  86 => 14,  82 => 12,  80 => 11,  75 => 9,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "background_remover/index.html.twig", "/Users/simonmhretab/Documents/Habesha-tools/habesha/templates/background_remover/index.html.twig");
    }
}
