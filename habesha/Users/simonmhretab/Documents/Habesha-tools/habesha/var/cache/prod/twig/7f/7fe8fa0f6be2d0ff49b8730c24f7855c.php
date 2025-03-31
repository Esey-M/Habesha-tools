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

/* base.html.twig */
class __TwigTemplate_aba17418b5837f7186108e5536e39272 extends Template
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

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <meta http-equiv=\"X-Content-Type-Options\" content=\"nosniff\">
        <meta http-equiv=\"X-Frame-Options\" content=\"SAMEORIGIN\">
        <meta http-equiv=\"Content-Security-Policy\" content=\"default-src 'self' https: 'unsafe-inline' 'unsafe-eval' data: pagead2.googlesyndication.com googleads.g.doubleclick.net; img-src 'self' https: data: blob: pagead2.googlesyndication.com googleads.g.doubleclick.net; font-src 'self' https: data:; frame-src 'self' https: googleads.g.doubleclick.net;\">
        <meta name=\"referrer\" content=\"strict-origin-when-cross-origin\">
        <meta name=\"robots\" content=\"index, follow\">
        <meta name=\"description\" content=\"Habesha Tools - Free online tools for background and logo removal\">
        <title>";
        // line 12
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
        <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>\">
        <!-- Bootstrap CSS -->
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
        <!-- Bootstrap Icons -->
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css\" rel=\"stylesheet\">
        <!-- Font Awesome -->
        <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css\" rel=\"stylesheet\">
        ";
        // line 20
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 74
        yield "
        ";
        // line 75
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 122
        yield "    </head>
    <body>
        <nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\">
            <div class=\"container\">
                <a class=\"navbar-brand\" href=\"";
        // line 126
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Habesha Tools</a>
                <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
                <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                    <ul class=\"navbar-nav me-auto\">
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"";
        // line 133
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_background_remover");
        yield "\">Background Remover</a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"";
        // line 136
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logo_remover");
        yield "\">Logo Remover</a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"";
        // line 139
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_quiz");
        yield "\">
                                Quiz
                                <span class=\"badge bg-warning text-dark\">Coming Soon</span>
                            </a>
                        </li>
                    </ul>
                    <ul class=\"navbar-nav\">
                        ";
        // line 146
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 146)) {
            // line 147
            yield "                            <li class=\"nav-item dropdown profile-menu\">
                                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                    <i class=\"bi bi-person-circle me-1\"></i>
                                    ";
            // line 150
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 150), "name", [], "any", false, false, false, 150), "html", null, true);
            yield "
                                </a>
                                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdown\">
                                    <li>
                                        <span class=\"dropdown-item-text text-muted\">
                                            <i class=\"bi bi-envelope\"></i>
                                            ";
            // line 156
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 156), "email", [], "any", false, false, false, 156), "html", null, true);
            yield "
                                        </span>
                                    </li>
                                    <li><hr class=\"dropdown-divider\"></li>
                                    <li>
                                        <a class=\"dropdown-item\" href=\"";
            // line 161
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\">
                                            <i class=\"bi bi-box-arrow-right\"></i>
                                            Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        ";
        } else {
            // line 169
            yield "                            <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"";
            // line 170
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\">
                                    <i class=\"bi bi-box-arrow-in-right me-1\"></i>
                                    Sign In
                                </a>
                            </li>
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"";
            // line 176
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
            yield "\">
                                    <i class=\"bi bi-person-plus me-1\"></i>
                                    Register
                                </a>
                            </li>
                        ";
        }
        // line 182
        yield "                    </ul>
                </div>
            </div>
        </nav>

        <div class=\"container-fluid mt-4\">
            <div class=\"row\">
                <div class=\"col-md-2\">
                    <div class=\"sidebar-ad\">
                        <!-- Sidebar Ad -->
                        <ins class=\"adsbygoogle\"
                             style=\"display:block\"
                             data-ad-client=\"ca-pub-YOUR_PUBLISHER_ID\"
                             data-ad-slot=\"SIDEBAR_AD_SLOT\"
                             data-ad-format=\"vertical\"
                             data-full-width-responsive=\"true\"></ins>
                        <script>
                             (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                </div>
                <div class=\"col-md-8\">
                    <div class=\"ad-container\">
                        <!-- Top Horizontal Ad -->
                        <ins class=\"adsbygoogle\"
                             style=\"display:block\"
                             data-ad-client=\"ca-pub-YOUR_PUBLISHER_ID\"
                             data-ad-slot=\"TOP_AD_SLOT\"
                             data-ad-format=\"horizontal\"
                             data-full-width-responsive=\"true\"></ins>
                        <script>
                             (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>

                    ";
        // line 217
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 218
        yield "
                    <div class=\"ad-container\">
                        <!-- Bottom Horizontal Ad -->
                        <ins class=\"adsbygoogle\"
                             style=\"display:block\"
                             data-ad-client=\"ca-pub-YOUR_PUBLISHER_ID\"
                             data-ad-slot=\"BOTTOM_AD_SLOT\"
                             data-ad-format=\"horizontal\"
                             data-full-width-responsive=\"true\"></ins>
                        <script>
                             (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                </div>
                <div class=\"col-md-2\">
                    <div class=\"sidebar-ad\">
                        <!-- Sidebar Ad 2 -->
                        <ins class=\"adsbygoogle\"
                             style=\"display:block\"
                             data-ad-client=\"ca-pub-YOUR_PUBLISHER_ID\"
                             data-ad-slot=\"SIDEBAR_AD_SLOT_2\"
                             data-ad-format=\"vertical\"
                             data-full-width-responsive=\"true\"></ins>
                        <script>
                             (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <footer class=\"bg-dark text-light mt-5 py-3\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <p>&copy; ";
        // line 253
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " Habesha Tools. All rights reserved.</p>
                    </div>
                    <div class=\"col-md-6 text-end footer-links\">
                        <a href=\"";
        // line 256
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_legal_terms");
        yield "\">Terms of Service</a>
                        <a href=\"";
        // line 257
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_legal_privacy");
        yield "\">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </footer>

        <div id=\"cookie-notice\">
            <div class=\"container\">
                <div class=\"row align-items-center\">
                    <div class=\"col-md-9\">
                        <p class=\"mb-md-0\">We use cookies to improve your experience and show you relevant advertising. To learn more, read our <a href=\"";
        // line 267
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_legal_privacy");
        yield "\" class=\"text-white text-decoration-underline\">Privacy Policy</a>.</p>
                    </div>
                    <div class=\"col-md-3 text-md-end\">
                        <button onclick=\"acceptCookies()\" class=\"btn btn-light\">Accept</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
";
        yield from [];
    }

    // line 12
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Welcome!";
        yield from [];
    }

    // line 20
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 21
        yield "            <style>
                .ad-container {
                    text-align: center;
                    margin: 20px 0;
                    min-height: 90px;
                }
                .sidebar-ad {
                    position: sticky;
                    top: 20px;
                    min-height: 600px;
                }
                @media (max-width: 768px) {
                    .sidebar-ad {
                        display: none;
                    }
                }
                .footer-links a {
                    color: #fff;
                    text-decoration: none;
                    margin: 0 10px;
                }
                .footer-links a:hover {
                    text-decoration: underline;
                }
                #cookie-notice {
                    position: fixed;
                    bottom: 0;
                    left: 0;
                    right: 0;
                    background: rgba(0, 0, 0, 0.9);
                    color: white;
                    padding: 1rem;
                    z-index: 1000;
                    display: none;
                }
                .navbar-nav .nav-link {
                    padding: 0.5rem 1rem;
                }
                .profile-menu .dropdown-item i {
                    width: 1.25rem;
                    margin-right: 0.5rem;
                }
                .coming-soon-badge {
                    font-size: 0.7em;
                    padding: 2px 6px;
                    background-color: #ffc107;
                    color: #000;
                    border-radius: 10px;
                    margin-left: 5px;
                    vertical-align: middle;
                }
            </style>
        ";
        yield from [];
    }

    // line 75
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 76
        yield "            <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
            <!-- AdSense initialization -->
            <script async src=\"https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-YOUR_PUBLISHER_ID\" crossorigin=\"anonymous\"></script>
            <script>
                // AdSense auto ads with GDPR compliance
                window.adsbygoogle = window.adsbygoogle || [];
                
                function initAds() {
                    if (localStorage.getItem('cookieConsent') === 'true') {
                        adsbygoogle.push({
                            google_ad_client: \"ca-pub-YOUR_PUBLISHER_ID\",
                            enable_page_level_ads: true,
                            overlays: {bottom: true}
                        });
                    }
                }
                
                // Cookie consent handler with privacy considerations
                document.addEventListener('DOMContentLoaded', function() {
                    if (!localStorage.getItem('cookieConsent')) {
                        document.getElementById('cookie-notice').style.display = 'block';
                    } else {
                        initAds();
                    }
                });

                function acceptCookies() {
                    localStorage.setItem('cookieConsent', 'true');
                    document.getElementById('cookie-notice').style.display = 'none';
                    initAds();
                }
            </script>
            <!-- Google Analytics -->
            ";
        // line 109
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "environment", [], "any", false, false, false, 109) == "prod")) {
            // line 110
            yield "            <script async src=\"https://www.googletagmanager.com/gtag/js?id=YOUR_GA_ID\"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', 'YOUR_GA_ID', {
                    'anonymize_ip': true,
                    'cookie_flags': 'SameSite=None;Secure'
                });
            </script>
            ";
        }
        // line 121
        yield "        ";
        yield from [];
    }

    // line 217
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
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
        return array (  423 => 217,  418 => 121,  405 => 110,  403 => 109,  368 => 76,  361 => 75,  304 => 21,  297 => 20,  286 => 12,  270 => 267,  257 => 257,  253 => 256,  247 => 253,  210 => 218,  208 => 217,  171 => 182,  162 => 176,  153 => 170,  150 => 169,  139 => 161,  131 => 156,  122 => 150,  117 => 147,  115 => 146,  105 => 139,  99 => 136,  93 => 133,  83 => 126,  77 => 122,  75 => 75,  72 => 74,  70 => 20,  59 => 12,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "base.html.twig", "/Users/simonmhretab/Documents/Habesha-tools/habesha/templates/base.html.twig");
    }
}
