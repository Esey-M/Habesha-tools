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

/* legal/terms-of-service.html.twig */
class __TwigTemplate_8c43afb24c993f93cdda5f9a905d795b extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "legal/terms-of-service.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Terms of Service - Habesha Tools";
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
            <h1 class=\"mb-4\">Terms of Service</h1>
            <p class=\"text-muted\">Last updated: ";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "F d, Y"), "html", null, true);
        yield "</p>

            <div class=\"card mb-4\">
                <div class=\"card-body\">
                    <h2 class=\"h4\">1. Acceptance of Terms</h2>
                    <p>By accessing and using Habesha Tools (\"the Service\"), you agree to be bound by these Terms of Service.</p>
                </div>
            </div>

            <div class=\"card mb-4\">
                <div class=\"card-body\">
                    <h2 class=\"h4\">2. Service Usage and Limitations</h2>
                    <h3 class=\"h5\">2.1 Free Usage</h3>
                    <ul>
                        <li>Non-registered users are limited to 3 free image processes per day for each tool (Background Remover and Logo Remover)</li>
                        <li>Each tool is rate-limited to 60 requests per hour per IP address</li>
                        <li>Processed images are automatically deleted after 7 days</li>
                    </ul>

                    <h3 class=\"h5\">2.2 Registered Users</h3>
                    <ul>
                        <li>Registered users have unlimited access to image processing</li>
                        <li>Rate limiting of 60 requests per hour per IP address still applies</li>
                        <li>Processed images are automatically deleted after 7 days</li>
                    </ul>
                </div>
            </div>

            <div class=\"card mb-4\">
                <div class=\"card-body\">
                    <h2 class=\"h4\">3. User Content</h2>
                    <p>You retain all rights to the images you upload. By using our service, you grant us the right to:</p>
                    <ul>
                        <li>Process and store your images temporarily (up to 7 days)</li>
                        <li>Display your processed images to you</li>
                        <li>Delete your images after 7 days</li>
                    </ul>
                </div>
            </div>

            <div class=\"card mb-4\">
                <div class=\"card-body\">
                    <h2 class=\"h4\">4. Prohibited Uses</h2>
                    <p>You agree not to:</p>
                    <ul>
                        <li>Use the service for any illegal purposes</li>
                        <li>Upload content that infringes on intellectual property rights</li>
                        <li>Attempt to circumvent usage limits or rate limiting</li>
                        <li>Reverse engineer or attempt to extract the source code of our service</li>
                        <li>Use automated methods to access the service without our express permission</li>
                    </ul>
                </div>
            </div>

            <div class=\"card mb-4\">
                <div class=\"card-body\">
                    <h2 class=\"h4\">5. Service Modifications</h2>
                    <p>We reserve the right to:</p>
                    <ul>
                        <li>Modify or discontinue any part of the service</li>
                        <li>Change usage limits and restrictions</li>
                        <li>Update these terms at any time</li>
                    </ul>
                </div>
            </div>

            <div class=\"card mb-4\">
                <div class=\"card-body\">
                    <h2 class=\"h4\">6. Disclaimer of Warranties</h2>
                    <p>The service is provided \"as is\" without any warranties. We do not guarantee that:</p>
                    <ul>
                        <li>The service will be uninterrupted or error-free</li>
                        <li>Results will be perfect or meet your requirements</li>
                        <li>Processed images will be stored indefinitely</li>
                    </ul>
                </div>
            </div>

            <div class=\"card\">
                <div class=\"card-body\">
                    <h2 class=\"h4\">7. Contact</h2>
                    <p>For questions about these Terms of Service, please contact us at [Your Contact Information].</p>
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
        return "legal/terms-of-service.html.twig";
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
        return array (  76 => 10,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "legal/terms-of-service.html.twig", "/Users/simonmhretab/Documents/Habesha-tools/habesha/templates/legal/terms-of-service.html.twig");
    }
}
