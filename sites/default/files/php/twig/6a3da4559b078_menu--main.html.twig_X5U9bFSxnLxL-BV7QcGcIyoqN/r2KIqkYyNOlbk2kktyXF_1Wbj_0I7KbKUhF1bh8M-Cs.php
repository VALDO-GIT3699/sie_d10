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

/* themes/contrib/bootstrap4/templates/navigation/menu--main.html.twig */
class __TwigTemplate_451c446cdb688607c13aaf8b14c909d8 extends Template
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
        // line 21
        $macros["menus"] = $this->macros["menus"] = $this;
        // line 22
        yield "
";
        // line 27
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($macros["menus"]->getTemplateForMacro("macro_build_menu", $context, 27, $this->getSourceContext())->macro_build_menu(...[($context["items"] ?? null), ($context["attributes"] ?? null), 0]));
        yield "

";
        // line 43
        yield "
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["_self", "items", "attributes", "menu_level"]);        yield from [];
    }

    // line 29
    public function macro_build_menu($items = null, $attributes = null, $menu_level = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "items" => $items,
            "attributes" => $attributes,
            "menu_level" => $menu_level,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 30
            yield "  ";
            $macros["menus"] = $this;
            // line 31
            yield "  ";
            if ((($tmp = ($context["items"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 32
                yield "    ";
                if ((($context["menu_level"] ?? null) == 0)) {
                    // line 33
                    yield "    <ul";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["navbar-nav mr-auto"], "method", false, false, true, 33), "html", null, true);
                    yield ">
    ";
                } else {
                    // line 35
                    yield "    <ul class=\"dropdown-menu\">
    ";
                }
                // line 37
                yield "    ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 38
                    yield "      ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($macros["menus"]->getTemplateForMacro("macro_add_link", $context, 38, $this->getSourceContext())->macro_add_link(...[$context["item"], ($context["attributes"] ?? null), ($context["menu_level"] ?? null)]));
                    yield "
    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 40
                yield "    </ul>
  ";
            }
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 44
    public function macro_add_link($item = null, $attributes = null, $menu_level = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "item" => $item,
            "attributes" => $attributes,
            "menu_level" => $menu_level,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 45
            yield "  ";
            $macros["menus"] = $this;
            // line 46
            yield "  ";
            // line 47
            $context["list_item_classes"] = ["nav-item", (((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 49
($context["item"] ?? null), "is_expanded", [], "any", false, false, true, 49)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("dropdown") : (""))];
            // line 52
            yield "  ";
            // line 53
            $context["link_classes"] = [(((            // line 54
($context["menu_level"] ?? null) == 0)) ? ("nav-link") : ("dropdown-item")), (((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 55
($context["item"] ?? null), "in_active_trail", [], "any", false, false, true, 55)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : ("")), ((((            // line 56
($context["menu_level"] ?? null) == 0) && (CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "is_expanded", [], "any", false, false, true, 56) || CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "is_collapsed", [], "any", false, false, true, 56)))) ? ("dropdown-toggle") : (""))];
            // line 59
            yield "  <li";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "attributes", [], "any", false, false, true, 59), "addClass", [($context["list_item_classes"] ?? null)], "method", false, false, true, 59), "html", null, true);
            yield ">
  ";
            // line 60
            $context["link_attrs"] = ["class" => ($context["link_classes"] ?? null)];
            // line 61
            yield "  ";
            if (((($context["menu_level"] ?? null) == 0) && CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "below", [], "any", false, false, true, 61))) {
                // line 62
                yield "    ";
                $context["link_attrs"] = Twig\Extension\CoreExtension::merge(($context["link_attrs"] ?? null), ["data-toggle" => "dropdown", "title" => ((t("Expand menu") . " ") . CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "title", [], "any", false, false, true, 62)), "aria-haspopup" => "true", "aria-expanded" => "false"]);
                // line 63
                yield "  ";
            }
            // line 64
            yield "  ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "in_active_trail", [], "any", false, false, true, 64)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 65
                yield "    ";
                $context["link_attrs"] = Twig\Extension\CoreExtension::merge(($context["link_attrs"] ?? null), ["aria-current" => "page"]);
                // line 66
                yield "  ";
            }
            // line 67
            yield "
  ";
            // line 68
            if (((($context["menu_level"] ?? null) == 0) && CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "below", [], "any", false, false, true, 68))) {
                // line 69
                yield "    ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "title", [], "any", false, false, true, 69), CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "url", [], "any", false, false, true, 69), ($context["link_attrs"] ?? null)), "html", null, true);
                yield "
    ";
                // line 70
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($macros["menus"]->getTemplateForMacro("macro_build_menu", $context, 70, $this->getSourceContext())->macro_build_menu(...[CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "below", [], "any", false, false, true, 70), ($context["attributes"] ?? null), (($context["menu_level"] ?? null) + 1)]));
                yield "
  ";
            } else {
                // line 72
                yield "    ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "title", [], "any", false, false, true, 72), CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "url", [], "any", false, false, true, 72), ($context["link_attrs"] ?? null)), "html", null, true);
                yield "
  ";
            }
            // line 74
            yield "  </li>
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/contrib/bootstrap4/templates/navigation/menu--main.html.twig";
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
        return array (  190 => 74,  184 => 72,  179 => 70,  174 => 69,  172 => 68,  169 => 67,  166 => 66,  163 => 65,  160 => 64,  157 => 63,  154 => 62,  151 => 61,  149 => 60,  144 => 59,  142 => 56,  141 => 55,  140 => 54,  139 => 53,  137 => 52,  135 => 49,  134 => 47,  132 => 46,  129 => 45,  115 => 44,  107 => 40,  98 => 38,  93 => 37,  89 => 35,  83 => 33,  80 => 32,  77 => 31,  74 => 30,  60 => 29,  53 => 43,  48 => 27,  45 => 22,  43 => 21,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{#
/**
 * @file
 * Theme override to display a menu.
 *
 * Available variables:
 * - menu_name: The machine name of the menu.
 * - items: A nested list of menu items. Each menu item contains:
 *   - attributes: HTML attributes for the menu item.
 *   - below: The menu item child items.
 *   - title: The menu link title.
 *   - url: The menu link url, instance of \\Drupal\\Core\\Url
 *   - localized_options: Menu link localized options.
 *   - is_expanded: TRUE if the link has visible children within the current
 *     menu tree.
 *   - is_collapsed: TRUE if the link has children within the current menu tree
 *     that are not currently visible.
 *   - in_active_trail: TRUE if the link is in the active trail.
 */
#}
{% import _self as menus %}

{#
We call a macro which calls itself to render the full tree.
@see http://twig.sensiolabs.org/doc/tags/macro.html
#}
{{ menus.build_menu(items, attributes, 0) }}

{% macro build_menu(items, attributes, menu_level) %}
  {% import _self as menus %}
  {% if items %}
    {% if menu_level == 0 %}
    <ul{{ attributes.addClass(\x27navbar-nav mr-auto\x27) }}>
    {% else %}
    <ul class=\"dropdown-menu\">
    {% endif %}
    {% for item in items %}
      {{ menus.add_link(item, attributes, menu_level) }}
    {% endfor %}
    </ul>
  {% endif %}
{% endmacro %}

{% macro add_link(item, attributes, menu_level) %}
  {% import _self as menus %}
  {%
    set list_item_classes = [
    \x27nav-item\x27,
    item.is_expanded ? \x27dropdown\x27
  ]
  %}
  {%
  set link_classes = [
    menu_level == 0 ? \x27nav-link\x27 : \x27dropdown-item\x27,
    item.in_active_trail ? \x27active\x27,
    menu_level == 0 and (item.is_expanded or item.is_collapsed) ? \x27dropdown-toggle\x27,
  ]
  %}
  <li{{item.attributes.addClass(list_item_classes)}}>
  {% set link_attrs = { \x27class\x27: link_classes } %}
  {% if menu_level == 0 and item.below %}
    {% set link_attrs = link_attrs|merge({\x27data-toggle\x27 : \x27dropdown\x27, \x27title\x27: (\x27Expand menu\x27 | t) ~ \x27 \x27 ~ item.title, \x27aria-haspopup\x27 : \x27true\x27, \x27aria-expanded\x27 : \x27false\x27 }) %}
  {% endif %}
  {% if item.in_active_trail %}
    {% set link_attrs = link_attrs|merge({ \x27aria-current\x27: \x27page\x27 }) %}
  {% endif %}

  {% if menu_level == 0 and item.below %}
    {{ link(item.title, item.url, link_attrs) }}
    {{ menus.build_menu(item.below, attributes, menu_level + 1) }}
  {% else %}
    {{ link(item.title, item.url, link_attrs) }}
  {% endif %}
  </li>
{% endmacro %}
", "themes/contrib/bootstrap4/templates/navigation/menu--main.html.twig", "C:\\xampp8.2.12\\htdocs\\sie_d10\\themes\\contrib\\bootstrap4\\templates\\navigation\\menu--main.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["import" => 21, "macro" => 29, "if" => 31, "for" => 37, "set" => 47];
        static $filters = ["escape" => 33, "merge" => 62, "t" => 62];
        static $functions = ["link" => 69];

        try {
            $this->sandbox->checkSecurity(
                [0 => "import", 1 => "macro", 2 => "if", 3 => "for", 4 => "set"],
                [0 => "escape", 1 => "merge", 2 => "t"],
                [0 => "link"],
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
