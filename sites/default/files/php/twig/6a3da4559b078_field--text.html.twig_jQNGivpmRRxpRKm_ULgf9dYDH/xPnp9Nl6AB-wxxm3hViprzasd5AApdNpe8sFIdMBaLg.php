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

/* field--text.html.twig */
class __TwigTemplate_5736f2379e0552ba23ca24e5832d393d extends Template
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
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 28
        $context["attributes"] = CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["clearfix", "text-formatted"], "method", false, false, true, 28);
        // line 1
        $this->parent = $this->load("field.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "field--text.html.twig";
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
        return array (  49 => 1,  47 => 28,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"field.html.twig\" %}
{#
/**
 * @file
 * Default theme implementation for a text field.
 *
 * A \x27clearfix\x27 class is added, because \x27text\x27 fields have a \x27format\x27 property
 * that allows a Text Format to be associated with the entered text, which then
 * applies filtering on output. A common use case is to align images to the left
 * or right, and without this \x27clearfix\x27 class, such aligned images may be
 * rendered outside of the \x27text\x27 field formatter\x27s boundaries, and hence
 * overlap with other fields. By setting the \x27clearfix\x27 class on all \x27text\x27
 * fields, we prevent that.
 *
 * @see https://www.drupal.org/node/2358529
 *
 * A \x27text-formatted\x27 class is added to assist with default styling of base
 * elements such as paragraphs and lists that may not have classes assigned to
 * them. This allows user entered content to have default styling without
 * interfering with the styles of other UI components such as system generated
 * lists or other dynamic content.
 *
 * @see https://www.drupal.org/node/2539860
 *
 * @ingroup themeable
 */
#}
{% set attributes = attributes.addClass(\x27clearfix\x27, \x27text-formatted\x27) %}
", "field--text.html.twig", "themes/contrib/bootstrap4/templates/field/field--text.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["extends" => 1, "set" => 28];
        static $filters = [];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "extends", 1 => "set"],
                [],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
