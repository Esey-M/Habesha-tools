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

/* logo_remover/edit.html.twig */
class __TwigTemplate_b21a6a6f9e06771731fc40e8f0d7fadc extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "logo_remover/edit.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Remove Logo - Habesha Tools";
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
        #imageCanvas {
            cursor: crosshair;
            max-width: 100%;
            height: auto;
        }
        .canvas-container {
            position: relative;
            max-width: 100%;
            overflow: auto;
        }
        #loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            color: white;
        }
    </style>
";
        yield from [];
    }

    // line 34
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 35
        yield "<div class=\"container py-5\">
    <div class=\"row\">
        <div class=\"col-12\">
            <div class=\"card shadow-sm\">
                <div class=\"card-body\">
                    <h1 class=\"card-title text-center mb-4\">Select Logo Area</h1>
                    <p class=\"text-center mb-4\">Click and drag to draw a rectangle around the logo or watermark you want to remove.</p>
                    
                    <div class=\"canvas-container mb-4\">
                        <canvas id=\"imageCanvas\"></canvas>
                    </div>

                    <div class=\"d-flex justify-content-between\">
                        <button class=\"btn btn-secondary\" onclick=\"resetSelection()\">Reset Selection</button>
                        <button class=\"btn btn-primary\" onclick=\"processImage()\">Remove Logo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id=\"loading\">
    <div class=\"spinner-border text-light\" role=\"status\">
        <span class=\"visually-hidden\">Loading...</span>
    </div>
</div>
";
        yield from [];
    }

    // line 64
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 65
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
        let canvas, ctx;
        let isDrawing = false;
        let startX, startY;
        let currentX, currentY;
        let imageObj = new Image();
        
        imageObj.onload = function() {
            canvas = document.getElementById('imageCanvas');
            canvas.width = imageObj.width;
            canvas.height = imageObj.height;
            ctx = canvas.getContext('2d');
            ctx.drawImage(imageObj, 0, 0);
            
            canvas.addEventListener('mousedown', startDrawing);
            canvas.addEventListener('mousemove', draw);
            canvas.addEventListener('mouseup', stopDrawing);
        };
        
        imageObj.src = \"";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Vich\UploaderBundle\Twig\Extension\UploaderExtensionRuntime')->asset(($context["image"] ?? null), "imageFile"), "html", null, true);
        yield "\";
        
        function startDrawing(e) {
            isDrawing = true;
            const rect = canvas.getBoundingClientRect();
            startX = (e.clientX - rect.left) * (canvas.width / rect.width);
            startY = (e.clientY - rect.top) * (canvas.height / rect.height);
            currentX = startX;
            currentY = startY;
        }
        
        function draw(e) {
            if (!isDrawing) return;
            
            const rect = canvas.getBoundingClientRect();
            currentX = (e.clientX - rect.left) * (canvas.width / rect.width);
            currentY = (e.clientY - rect.top) * (canvas.height / rect.height);
            
            redrawImage();
            
            // Draw rectangle
            ctx.beginPath();
            ctx.rect(
                Math.min(startX, currentX),
                Math.min(startY, currentY),
                Math.abs(currentX - startX),
                Math.abs(currentY - startY)
            );
            ctx.strokeStyle = '#ff0000';
            ctx.lineWidth = 2;
            ctx.stroke();
            ctx.fillStyle = 'rgba(255, 0, 0, 0.2)';
            ctx.fill();
        }
        
        function stopDrawing() {
            isDrawing = false;
        }
        
        function redrawImage() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.drawImage(imageObj, 0, 0);
        }
        
        function resetSelection() {
            redrawImage();
            startX = startY = currentX = currentY = null;
        }
        
        function processImage() {
            if (!startX || !startY || !currentX || !currentY) {
                alert('Please select an area first');
                return;
            }
            
            // Convert rectangle to points array (clockwise from top-left)
            const points = [
                { x: Math.min(startX, currentX), y: Math.min(startY, currentY) }, // Top-left
                { x: Math.max(startX, currentX), y: Math.min(startY, currentY) }, // Top-right
                { x: Math.max(startX, currentX), y: Math.max(startY, currentY) }, // Bottom-right
                { x: Math.min(startX, currentX), y: Math.max(startY, currentY) }  // Bottom-left
            ];
            
            document.getElementById('loading').style.display = 'flex';
            
            fetch('";
        // line 150
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logo_remover_process", ["id" => CoreExtension::getAttribute($this->env, $this->source, ($context["image"] ?? null), "id", [], "any", false, false, false, 150)]), "html", null, true);
        yield "', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    coordinates: points
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = '";
        // line 162
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logo_remover_success", ["id" => CoreExtension::getAttribute($this->env, $this->source, ($context["image"] ?? null), "id", [], "any", false, false, false, 162)]), "html", null, true);
        yield "';
                } else {
                    alert(data.error || 'An error occurred');
                    document.getElementById('loading').style.display = 'none';
                }
            })
            .catch(error => {
                alert('An error occurred');
                document.getElementById('loading').style.display = 'none';
                console.error('Error:', error);
            });
        }
    </script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "logo_remover/edit.html.twig";
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
        return array (  258 => 162,  243 => 150,  175 => 85,  151 => 65,  144 => 64,  112 => 35,  105 => 34,  72 => 6,  65 => 5,  54 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "logo_remover/edit.html.twig", "/Users/simonmhretab/Documents/Habesha-tools/habesha/templates/logo_remover/edit.html.twig");
    }
}
