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

/* themes/custom/b4seutheme/templates/layout/page.html.twig */
class __TwigTemplate_6efe0daeefb6e18cdb2503dad426f008 extends Template
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
        // line 46
        $context["nav_classes"] = ((("navbar navbar-expand-lg" . (((        // line 47
($context["b4_navbar_schema"] ?? null) != "none")) ? ((" navbar-" . ($context["b4_navbar_schema"] ?? null))) : (" "))) . (((        // line 48
($context["b4_navbar_schema"] ?? null) != "none")) ? ((((($context["b4_navbar_schema"] ?? null) == "dark")) ? (" text-light") : (" text-dark"))) : (" "))) . (((        // line 49
($context["b4_navbar_bg_schema"] ?? null) != "none")) ? ((" bg-" . ($context["b4_navbar_bg_schema"] ?? null))) : (" ")));
        // line 51
        yield "
";
        // line 53
        $context["footer_classes"] = (((" " . (((        // line 54
($context["b4_footer_schema"] ?? null) != "none")) ? ((" footer-" . ($context["b4_footer_schema"] ?? null))) : (" "))) . (((        // line 55
($context["b4_footer_schema"] ?? null) != "none")) ? ((((($context["b4_footer_schema"] ?? null) == "dark")) ? (" text-light") : (" text-dark"))) : (" "))) . (((        // line 56
($context["b4_footer_bg_schema"] ?? null) != "none")) ? ((" bg-" . ($context["b4_footer_bg_schema"] ?? null))) : (" ")));
        // line 58
        yield "
<header>
  ";
        // line 60
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 60), "html", null, true);
        yield "  

  ";
        // line 62
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "nav_branding", [], "any", false, false, true, 62) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "nav_main", [], "any", false, false, true, 62)) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "nav_additional", [], "any", false, false, true, 62))) {
            yield "  
  <nav class=\"";
            // line 63
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["nav_classes"] ?? null), "html", null, true);
            yield "\">
    <div class=\"";
            // line 64
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["b4_top_container"] ?? null), "html", null, true);
            yield " row mx-auto\">
      <div class=\"col-auto p-0\">
      ";
            // line 66
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "nav_branding", [], "any", false, false, true, 66), "html", null, true);
            yield "  
      </div>

      <div class=\"col-3 col-md-auto p-0 text-right\">
        <button class=\"navbar-toggler collapsed\" type=\"button\" data-toggle=\"collapse\"
                data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\"
                aria-expanded=\"false\" aria-label=\"Toggle navigation\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>
      </div>

      <div class=\"collapse navbar-collapse col-12 col-md-auto p-0 justify-content-end\" id=\"navbarSupportedContent\">
        ";
            // line 78
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "nav_main", [], "any", false, false, true, 78), "html", null, true);
            yield "      
        ";
            // line 79
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "nav_additional", [], "any", false, false, true, 79), "html", null, true);
            yield "      
      </div>
    </div>
  </nav>
  ";
        }
        // line 84
        yield "</header>

<main role=\"main\">
  <a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 88
        yield "
  ";
        // line 90
        $context["sidebar_first_classes"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 90) && CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 90))) ? ("col-12 col-sm-6 col-md-4 col-lg-3  col-xl-2") : ("col-12 col-md-4 col-lg-3 col-xl-2"));
        // line 92
        yield "  
  ";
        // line 94
        $context["sidebar_second_classes"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 94) && CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 94))) ? ("col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2") : ("col-12 col-md-4 col-lg-3 col-xl-2"));
        // line 96
        yield "  
  ";
        // line 98
        $context["content_classes"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 98) && CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 98))) ? ("col-12 col-md-4 col-lg-6 col-xl-8") : ((((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 98) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 98))) ? ("col-12 col-md-8 col-lg-9 col-xl-10") : ("col-12"))));
        // line 100
        yield "

  <div class=\"";
        // line 102
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["b4_top_container"] ?? null), "html", null, true);
        yield "\">
    ";
        // line 103
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumb", [], "any", false, false, true, 103)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 104
            yield "      ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumb", [], "any", false, false, true, 104), "html", null, true);
            yield "
    ";
        }
        // line 106
        yield "    <div class=\"row no-gutters\">
      ";
        // line 107
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 107)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 108
            yield "        <div class=\"order-1 order-lg-1 ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["sidebar_first_classes"] ?? null), "html", null, true);
            yield "\">
          ";
            // line 109
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 109), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 112
        yield "      <div class=\"order-2 order-lg-2 ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["content_classes"] ?? null), "html", null, true);
        yield "\">
        ";
        // line 113
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 113), "html", null, true);
        yield "
      </div>
      ";
        // line 115
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 115)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 116
            yield "        <div class=\"order-3 ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["sidebar_second_classes"] ?? null), "html", null, true);
            yield "\">
          ";
            // line 117
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 117), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 120
        yield "    </div>
  </div>

</main>

";
        // line 125
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 125)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 126
            yield "<footer class=\"mt-auto ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["footer_classes"] ?? null), "html", null, true);
            yield "\">
  <div class=\"";
            // line 127
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["b4_top_container"] ?? null), "html", null, true);
            yield "\">
    ";
            // line 128
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 128), "html", null, true);
            yield "
  </div>
</footer>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["b4_navbar_schema", "b4_navbar_bg_schema", "b4_footer_schema", "b4_footer_bg_schema", "page", "b4_top_container"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/b4seutheme/templates/layout/page.html.twig";
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
        return array (  198 => 128,  194 => 127,  189 => 126,  187 => 125,  180 => 120,  174 => 117,  169 => 116,  167 => 115,  162 => 113,  157 => 112,  151 => 109,  146 => 108,  144 => 107,  141 => 106,  135 => 104,  133 => 103,  129 => 102,  125 => 100,  123 => 98,  120 => 96,  118 => 94,  115 => 92,  113 => 90,  110 => 88,  105 => 84,  97 => 79,  93 => 78,  78 => 66,  73 => 64,  69 => 63,  65 => 62,  60 => 60,  56 => 58,  54 => 56,  53 => 55,  52 => 54,  51 => 53,  48 => 51,  46 => 49,  45 => 48,  44 => 47,  43 => 46,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{#
/**
 * @file
 * Theme override to display a single page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.html.twig template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - base_path: The base URL path of the Drupal installation. Will usually be
 *   \"/\" unless you have installed Drupal in a sub-directory.
 * - is_front: A flag indicating if the current page is the front page.
 * - logged_in: A flag indicating if the user is registered and signed in.
 * - is_admin: A flag indicating if the user has permission to access
 *   administration pages.
 *
 * Site identity:
 * - front_page: The URL of the front page. Use this instead of base_path when
 *   linking to the front page. This includes the language domain or prefix.
 *
 * Page content (in order of occurrence in the default page.html.twig):
 * - node: Fully loaded node, if there is an automatically-loaded node
 *   associated with the page and the node ID is the second argument in the
 *   page\x27s path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - page.header: Items for the header region.
 * - page.primary_menu: Items for the primary menu region.
 * - page.secondary_menu: Items for the secondary menu region.
 * - page.highlighted: Items for the highlighted content region.
 * - page.help: Dynamic help text, mostly for admin pages.
 * - page.content: The main content of the current page.
 * - page.sidebar_first: Items for the first sidebar.
 * - page.sidebar_second: Items for the second sidebar.
 * - page.footer: Items for the footer region.
 * - page.breadcrumb: Items for the breadcrumb region.
 *
 * @see template_preprocess_page()
 * @see html.html.twig
 */
#}
{%
set nav_classes = \x27navbar navbar-expand-lg\x27 ~ 
  (b4_navbar_schema != \x27none\x27 ? \" navbar-#{b4_navbar_schema}\" : \x27 \x27) ~
  (b4_navbar_schema != \x27none\x27 ? (b4_navbar_schema == \x27dark\x27 ? \x27 text-light\x27 : \x27 text-dark\x27 ) : \x27 \x27) ~
  (b4_navbar_bg_schema != \x27none\x27 ? \" bg-#{b4_navbar_bg_schema}\" : \x27 \x27)
%}

{%
set footer_classes = \x27 \x27 ~ 
  (b4_footer_schema != \x27none\x27 ? \" footer-#{b4_footer_schema}\" : \x27 \x27) ~
  (b4_footer_schema != \x27none\x27 ? (b4_footer_schema == \x27dark\x27 ? \x27 text-light\x27 : \x27 text-dark\x27 ) : \x27 \x27) ~
  (b4_footer_bg_schema != \x27none\x27 ? \" bg-#{b4_footer_bg_schema}\" : \x27 \x27)
%}

<header>
  {{ page.header }}  

  {% if page.nav_branding or page.nav_main or page.nav_additional %}  
  <nav class=\"{{ nav_classes }}\">
    <div class=\"{{ b4_top_container }} row mx-auto\">
      <div class=\"col-auto p-0\">
      {{ page.nav_branding }}  
      </div>

      <div class=\"col-3 col-md-auto p-0 text-right\">
        <button class=\"navbar-toggler collapsed\" type=\"button\" data-toggle=\"collapse\"
                data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\"
                aria-expanded=\"false\" aria-label=\"Toggle navigation\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>
      </div>

      <div class=\"collapse navbar-collapse col-12 col-md-auto p-0 justify-content-end\" id=\"navbarSupportedContent\">
        {{ page.nav_main }}      
        {{ page.nav_additional }}      
      </div>
    </div>
  </nav>
  {% endif %}
</header>

<main role=\"main\">
  <a id=\"main-content\" tabindex=\"-1\"></a>{# link is in html.html.twig #}

  {% 
  set sidebar_first_classes = (page.sidebar_first and page.sidebar_second) ? \x27col-12 col-sm-6 col-md-4 col-lg-3  col-xl-2\x27 : \x27col-12 col-md-4 col-lg-3 col-xl-2\x27
  %}
  
  {% 
  set sidebar_second_classes = (page.sidebar_first and page.sidebar_second) ? \x27col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2\x27 : \x27col-12 col-md-4 col-lg-3 col-xl-2\x27
  %}
  
  {% 
  set content_classes = (page.sidebar_first and page.sidebar_second) ? \x27col-12 col-md-4 col-lg-6 col-xl-8\x27 : ((page.sidebar_first or page.sidebar_second) ? \x27col-12 col-md-8 col-lg-9 col-xl-10\x27 : \x27col-12\x27 )
   %}


  <div class=\"{{ b4_top_container }}\">
    {% if page.breadcrumb %}
      {{ page.breadcrumb }}
    {% endif %}
    <div class=\"row no-gutters\">
      {% if page.sidebar_first %}
        <div class=\"order-1 order-lg-1 {{ sidebar_first_classes }}\">
          {{ page.sidebar_first }}
        </div>
      {% endif %}
      <div class=\"order-2 order-lg-2 {{ content_classes }}\">
        {{ page.content }}
      </div>
      {% if page.sidebar_second %}
        <div class=\"order-3 {{ sidebar_second_classes }}\">
          {{ page.sidebar_second }}
        </div>
      {% endif %}
    </div>
  </div>

</main>

{% if page.footer %}
<footer class=\"mt-auto {{ footer_classes }}\">
  <div class=\"{{ b4_top_container }}\">
    {{ page.footer }}
  </div>
</footer>
{% endif %}
", "themes/custom/b4seutheme/templates/layout/page.html.twig", "C:\\xampp8.2.12\\htdocs\\sie_d10\\themes\\custom\\b4seutheme\\templates\\layout\\page.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 46, "if" => 62];
        static $filters = ["escape" => 60];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "set", 1 => "if"],
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
