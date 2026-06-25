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

/* __string_template__db99daebb757fd64ecb619ed3f7eb6f9 */
class __TwigTemplate_65574e0ca4b5d06679a515cf03efad5e extends Template
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
        // line 1
        yield "<div class=\"numeralia-ciclo\">
\t<div class=\"numeralia-fila\">
\t\t<div class=\"numeralia-total\">";
        // line 3
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_matricula_t"] ?? null), "html", null, true);
        yield "
\t\t</div>
\t\t<div class=\"text-gray big numeralia-descripcion\">SEMS
\t\t</div>
\t\t<div class=\"numeralia-mh\">";
        // line 7
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_matricula_m"] ?? null), "html", null, true);
        yield "
\t\t</div>
\t\t<div class=\"numeralia-mm\">";
        // line 9
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_matricula_h"] ?? null), "html", null, true);
        yield "
\t\t</div>
\t</div>
</div>";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["field_matricula_t", "field_matricula_m", "field_matricula_h"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "__string_template__db99daebb757fd64ecb619ed3f7eb6f9";
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
        return array (  59 => 9,  54 => 7,  47 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# inline_template_start #}<div class=\"numeralia-ciclo\">
\t<div class=\"numeralia-fila\">
\t\t<div class=\"numeralia-total\">{{ field_matricula_t }}
\t\t</div>
\t\t<div class=\"text-gray big numeralia-descripcion\">SEMS
\t\t</div>
\t\t<div class=\"numeralia-mh\">{{ field_matricula_m }}
\t\t</div>
\t\t<div class=\"numeralia-mm\">{{ field_matricula_h }}
\t\t</div>
\t</div>
</div>", "__string_template__db99daebb757fd64ecb619ed3f7eb6f9", "");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = [];
        static $filters = ["escape" => 3];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
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
