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

/* background_remover/batch.html.twig */
class __TwigTemplate_b7f1a34461c4eabf85b494e0f8c34faf extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "background_remover/batch.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Batch Background Removal";
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
        .batch-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1rem;
            padding: 1rem;
        }
        .image-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1rem;
            text-align: center;
        }
        .image-card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 1rem;
        }
        .progress {
            height: 20px;
            margin: 1rem 0;
        }
        .status {
            margin-top: 0.5rem;
            font-weight: bold;
        }
        .success { color: #28a745; }
        .error { color: #dc3545; }
        .pending { color: #ffc107; }
    </style>
";
        yield from [];
    }

    // line 39
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 40
        yield "    <div class=\"container mt-4\">
        <h1 class=\"mb-4\">Batch Background Removal</h1>
        <div class=\"batch-grid\">
            ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["images"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 44
            yield "                <div class=\"image-card\" data-image-id=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["image"], "id", [], "any", false, false, false, 44), "html", null, true);
            yield "\">
                    <img src=\"";
            // line 45
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/images/" . CoreExtension::getAttribute($this->env, $this->source, $context["image"], "imageName", [], "any", false, false, false, 45))), "html", null, true);
            yield "\" alt=\"Original image\">
                    <div class=\"progress\">
                        <div class=\"progress-bar\" role=\"progressbar\" style=\"width: 0%\"></div>
                    </div>
                    <div class=\"status pending\">Pending...</div>
                    <div class=\"result-container\" style=\"display: none;\">
                        <img class=\"result-image\" src=\"\" alt=\"Processed image\" style=\"display: none;\">
                        <a href=\"#\" class=\"btn btn-primary download-btn\" style=\"display: none;\">Download</a>
                    </div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['image'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        yield "        </div>
    </div>
";
        yield from [];
    }

    // line 60
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 61
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.image-card');
            let processedCount = 0;

            function processNext(cards, index) {
                if (index >= cards.length) return;

                const card = cards[index];
                const imageId = card.dataset.imageId;
                const progressBar = card.querySelector('.progress-bar');
                const status = card.querySelector('.status');
                const resultContainer = card.querySelector('.result-container');
                const resultImage = card.querySelector('.result-image');
                const downloadBtn = card.querySelector('.download-btn');

                status.textContent = 'Processing...';
                status.className = 'status pending';
                progressBar.style.width = '50%';

                fetch(`/background-remover/process/\${imageId}`, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        progressBar.style.width = '100%';
                        status.textContent = 'Completed';
                        status.className = 'status success';
                        
                        resultImage.src = data.resultUrl;
                        resultImage.style.display = 'block';
                        downloadBtn.href = data.resultUrl;
                        downloadBtn.download = 'processed_image.png';
                        downloadBtn.style.display = 'inline-block';
                        resultContainer.style.display = 'block';
                    } else {
                        throw new Error(data.error || 'Processing failed');
                    }
                })
                .catch(error => {
                    progressBar.style.width = '100%';
                    progressBar.className = 'progress-bar bg-danger';
                    status.textContent = 'Error: ' + error.message;
                    status.className = 'status error';
                })
                .finally(() => {
                    processedCount++;
                    if (processedCount < cards.length) {
                        processNext(cards, index + 1);
                    }
                });
            }

            // Start processing the first image
            if (cards.length > 0) {
                processNext(cards, 0);
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
        return "background_remover/batch.html.twig";
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
        return array (  162 => 61,  155 => 60,  148 => 56,  131 => 45,  126 => 44,  122 => 43,  117 => 40,  110 => 39,  72 => 6,  65 => 5,  54 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "background_remover/batch.html.twig", "/Users/simonmhretab/Documents/Habesha-tools/habesha/templates/background_remover/batch.html.twig");
    }
}
