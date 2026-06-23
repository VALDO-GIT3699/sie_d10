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

/* modules/contrib/simple_menu_icons/templates/simple-menu-icons-css-item.html.twig */
class __TwigTemplate_333e3f7432577e34b9ca7dee17260dd1 extends Template
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
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 10
        yield "
";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["icons"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["icon"]) {
            // line 12
            yield "    a.menu-icon-";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["icon"], "mlid", [], "any", false, false, true, 12), "html", null, true);
            yield ",
    ul.links li.menu-icon-";
            // line 13
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["icon"], "mlid", [], "any", false, false, true, 13), "html", null, true);
            yield " a,
    ul.menu li.menu-icon-";
            // line 14
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["icon"], "mlid", [], "any", false, false, true, 14), "html", null, true);
            yield " a {
        background-image: url(";
            // line 15
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["icon"], "path", [], "any", false, false, true, 15), "html", null, true);
            yield ");
        padding-left:";
            // line 16
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["icon"], "width", [], "any", false, false, true, 16), "html", null, true);
            yield "px;
        background-repeat: no-repeat;
        background-position: left center;
    }
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['icon'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["icons"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/contrib/simple_menu_icons/templates/simple-menu-icons-css-item.html.twig";
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
        return array (  67 => 16,  63 => 15,  59 => 14,  55 => 13,  50 => 12,  46 => 11,  43 => 10,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{#

/**
 * @file
 *
 * Template file for generating the CSS file used for the menu item icons.
 */

#}

{% for icon in icons %}
    a.menu-icon-{{ icon.mlid }},
    ul.links li.menu-icon-{{ icon.mlid }} a,
    ul.menu li.menu-icon-{{ icon.mlid }} a {
        background-image: url({{ icon.path }});
        padding-left:{{ icon.width }}px;
        background-repeat: no-repeat;
        background-position: left center;
    }
{% endfor %}
", "modules/contrib/simple_menu_icons/templates/simple-menu-icons-css-item.html.twig", "C:\\Users\\Usuario2\\xampp8.2.12\\htdocs\\sie\\modules\\contrib\\simple_menu_icons\\templates\\simple-menu-icons-css-item.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["for" => 11];
        static $filters = ["escape" => 12];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "for"],
                [0 => "escape"],
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
