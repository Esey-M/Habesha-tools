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

/* @VichUploader/Form/fields.html.twig */
class __TwigTemplate_989d2222a40ec219ee26d67081f804ec extends Template
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
            'vich_file_row' => [$this, 'block_vich_file_row'],
            'vich_file_widget' => [$this, 'block_vich_file_widget'],
            'vich_image_row' => [$this, 'block_vich_image_row'],
            'vich_image_widget' => [$this, 'block_vich_image_widget'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield from $this->unwrap()->yieldBlock('vich_file_row', $context, $blocks);
        // line 6
        yield from $this->unwrap()->yieldBlock('vich_file_widget', $context, $blocks);
        // line 24
        yield from $this->unwrap()->yieldBlock('vich_image_row', $context, $blocks);
        // line 29
        yield from $this->unwrap()->yieldBlock('vich_image_widget', $context, $blocks);
        yield from [];
    }

    // line 1
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_vich_file_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 2
        $context["force_error"] = true;
        // line 3
        yield from         $this->unwrap()->yieldBlock("form_row", $context, $blocks);
        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_vich_file_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 7
        yield "<div class=\"vich-file\">";
        // line 8
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["errors"] ?? null)) > 0)) {
            // line 9
            $context["attr"] = Twig\Extension\CoreExtension::merge(($context["attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 9)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 9), "")) : ("")) . " is-invalid"))]);
        }
        // line 11
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "file", [], "any", false, false, false, 11), 'widget', ["attr" => ($context["attr"] ?? null)]);
        // line 12
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "delete", [], "any", true, true, false, 12)) {
            // line 13
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "delete", [], "any", false, false, false, 13), 'row');
        }
        // line 16
        if (($context["download_uri"] ?? null)) {
            // line 17
            yield "<a href=\"";
            yield (((($context["asset_helper"] ?? null) === true)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(($context["download_uri"] ?? null)), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["download_uri"] ?? null), "html", null, true)));
            yield "\" download>
                ";
            // line 18
            yield (((($context["translation_domain"] ?? null) === false)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["download_label"] ?? null), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(($context["download_label"] ?? null), [], ($context["translation_domain"] ?? null)), "html", null, true)));
            yield "
            </a>";
        }
        // line 21
        yield "</div>";
        yield from [];
    }

    // line 24
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_vich_image_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 25
        $context["force_error"] = true;
        // line 26
        yield from         $this->unwrap()->yieldBlock("form_row", $context, $blocks);
        yield from [];
    }

    // line 29
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_vich_image_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 30
        yield "<div class=\"vich-image\">";
        // line 31
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["errors"] ?? null)) > 0)) {
            // line 32
            $context["attr"] = Twig\Extension\CoreExtension::merge(($context["attr"] ?? null), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 32)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 32), "")) : ("")) . " is-invalid"))]);
        }
        // line 34
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "file", [], "any", false, false, false, 34), 'widget', ["attr" => ($context["attr"] ?? null)]);
        // line 35
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "delete", [], "any", true, true, false, 35)) {
            // line 36
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "delete", [], "any", false, false, false, 36), 'row');
        }
        // line 39
        if (($context["image_uri"] ?? null)) {
            // line 40
            yield "<a href=\"";
            yield (((($context["asset_helper"] ?? null) === true)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(($context["image_uri"] ?? null)), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["image_uri"] ?? null), "html", null, true)));
            yield "\" download>
                <img src=\"";
            // line 41
            yield (((($context["asset_helper"] ?? null) === true)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(($context["image_uri"] ?? null)), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["image_uri"] ?? null), "html", null, true)));
            yield "\" alt=\"\" />
            </a>";
        }
        // line 44
        if (($context["download_uri"] ?? null)) {
            // line 45
            yield "<a href=\"";
            yield (((($context["asset_helper"] ?? null) === true)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(($context["download_uri"] ?? null)), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["download_uri"] ?? null), "html", null, true)));
            yield "\" download>
                ";
            // line 46
            yield (((($context["translation_domain"] ?? null) === false)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["download_label"] ?? null), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(($context["download_label"] ?? null), [], ($context["translation_domain"] ?? null)), "html", null, true)));
            yield "
            </a>";
        }
        // line 49
        yield "</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@VichUploader/Form/fields.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  168 => 49,  163 => 46,  158 => 45,  156 => 44,  151 => 41,  146 => 40,  144 => 39,  141 => 36,  139 => 35,  137 => 34,  134 => 32,  132 => 31,  130 => 30,  123 => 29,  118 => 26,  116 => 25,  109 => 24,  104 => 21,  99 => 18,  94 => 17,  92 => 16,  89 => 13,  87 => 12,  85 => 11,  82 => 9,  80 => 8,  78 => 7,  71 => 6,  66 => 3,  64 => 2,  57 => 1,  52 => 29,  50 => 24,  48 => 6,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@VichUploader/Form/fields.html.twig", "/Users/simonmhretab/Documents/Habesha-tools/habesha/vendor/vich/uploader-bundle/templates/Form/fields.html.twig");
    }
}
