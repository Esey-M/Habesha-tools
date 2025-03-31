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

/* legal/privacy-policy.html.twig */
class __TwigTemplate_a1df7b4fabfd3ddbab24267183776190 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "legal/privacy-policy.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Privacy Policy - Habesha Tools";
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
            <h1 class=\"mb-4\">Privacy Policy</h1>
            <p class=\"text-muted\">Last updated: ";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "F d, Y"), "html", null, true);
        yield "</p>

            <div class=\"card mb-4\">
                <div class=\"card-body\">
                    <h2 class=\"h4\">1. Information We Collect</h2>
                    <h3 class=\"h5\">1.1 User-Provided Information</h3>
                    <ul>
                        <li>Email address and password (for registered users)</li>
                        <li>Images uploaded for processing</li>
                        <li>Processing preferences and settings</li>
                    </ul>

                    <h3 class=\"h5\">1.2 Automatically Collected Information</h3>
                    <ul>
                        <li>IP addresses for rate limiting and usage tracking</li>
                        <li>Usage statistics (number of processes, timestamps)</li>
                        <li>Browser type and version</li>
                        <li>Device information</li>
                    </ul>
                </div>
            </div>

            <div class=\"card mb-4\">
                <div class=\"card-body\">
                    <h2 class=\"h4\">2. How We Use Your Information</h2>
                    <p>We use the collected information to:</p>
                    <ul>
                        <li>Provide and maintain our image processing services</li>
                        <li>Track and enforce usage limits (3 free processes per day for non-registered users)</li>
                        <li>Apply rate limiting (60 requests per hour per IP)</li>
                        <li>Manage user accounts and authentication</li>
                        <li>Improve our services and user experience</li>
                        <li>Communicate important updates or changes</li>
                    </ul>
                </div>
            </div>

            <div class=\"card mb-4\">
                <div class=\"card-body\">
                    <h2 class=\"h4\">3. Data Retention</h2>
                    <h3 class=\"h5\">3.1 Processed Images</h3>
                    <ul>
                        <li>Original and processed images are automatically deleted after 7 days</li>
                        <li>You can manually delete your images at any time</li>
                        <li>Deleted images cannot be recovered</li>
                    </ul>

                    <h3 class=\"h5\">3.2 Account Information</h3>
                    <ul>
                        <li>Account information is retained until you request deletion</li>
                        <li>Usage statistics are anonymized after 30 days</li>
                    </ul>
                </div>
            </div>

            <div class=\"card mb-4\">
                <div class=\"card-body\">
                    <h2 class=\"h4\">4. Data Security</h2>
                    <p>We implement appropriate security measures to protect your information:</p>
                    <ul>
                        <li>Secure HTTPS encryption for all data transfers</li>
                        <li>Password hashing using modern algorithms</li>
                        <li>Regular security audits and updates</li>
                        <li>Limited staff access to user data</li>
                    </ul>
                </div>
            </div>

            <div class=\"card mb-4\">
                <div class=\"card-body\">
                    <h2 class=\"h4\">5. Your Rights</h2>
                    <p>You have the right to:</p>
                    <ul>
                        <li>Access your personal data</li>
                        <li>Correct inaccurate data</li>
                        <li>Request deletion of your data</li>
                        <li>Export your data</li>
                        <li>Withdraw consent for data processing</li>
                    </ul>
                </div>
            </div>

            <div class=\"card mb-4\">
                <div class=\"card-body\">
                    <h2 class=\"h4\">6. Cookies and Tracking</h2>
                    <p>We use essential cookies for:</p>
                    <ul>
                        <li>Session management</li>
                        <li>Authentication</li>
                        <li>Security purposes</li>
                        <li>Usage limit tracking</li>
                    </ul>
                </div>
            </div>

            <div class=\"card\">
                <div class=\"card-body\">
                    <h2 class=\"h4\">7. Contact Information</h2>
                    <p>For privacy-related inquiries or to exercise your rights, please contact us at [Your Contact Information].</p>
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
        return "legal/privacy-policy.html.twig";
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
        return new Source("", "legal/privacy-policy.html.twig", "/Users/simonmhretab/Documents/Habesha-tools/habesha/templates/legal/privacy-policy.html.twig");
    }
}
