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

/* __string_template__c6957b209bfc632198bb31113c1a575f */
class __TwigTemplate_69459eb968f0660701f02c7ce3176150 extends Template
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
\t\t<div class=\"numeralia-titulo\">
\t\tTotal de estudiantes por nivel educativo
\t\t</div>
\t</div>
\t<div class=\"numeralia-fila\">
\t\t<div class=\"numeralia-total\">
\t\t</div>
\t\t<div class=\"numeralia-descripcion\">
\t\t</div>
\t\t<div class=\"numeralia-mh\"><strong>Hombres</strong>
\t\t</div>
\t\t<div class=\"numeralia-mm\"><strong>Mujeres</strong>
\t\t</div>
\t</div>
\t<div class=\"numeralia-fila\">
\t\t<div class=\"numeralia-total\">";
        // line 18
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_matricula_t"] ?? null), "html", null, true);
        yield "
\t\t</div>
\t\t<div class=\"text-blue big numeralia-descripcion\">Estudiantes de Educación Superior
\t\t</div>
\t\t<div class=\"numeralia-mh\">";
        // line 22
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_matricula_m"] ?? null), "html", null, true);
        yield "
\t\t</div>
\t\t<div class=\"numeralia-mm\">";
        // line 24
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
        return "__string_template__c6957b209bfc632198bb31113c1a575f";
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
        return array (  74 => 24,  69 => 22,  62 => 18,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# inline_template_start #}<div class=\"numeralia-ciclo\">
\t<div class=\"numeralia-fila\">
\t\t<div class=\"numeralia-titulo\">
\t\tTotal de estudiantes por nivel educativo
\t\t</div>
\t</div>
\t<div class=\"numeralia-fila\">
\t\t<div class=\"numeralia-total\">
\t\t</div>
\t\t<div class=\"numeralia-descripcion\">
\t\t</div>
\t\t<div class=\"numeralia-mh\"><strong>Hombres</strong>
\t\t</div>
\t\t<div class=\"numeralia-mm\"><strong>Mujeres</strong>
\t\t</div>
\t</div>
\t<div class=\"numeralia-fila\">
\t\t<div class=\"numeralia-total\">{{ field_matricula_t }}
\t\t</div>
\t\t<div class=\"text-blue big numeralia-descripcion\">Estudiantes de Educación Superior
\t\t</div>
\t\t<div class=\"numeralia-mh\">{{ field_matricula_m }}
\t\t</div>
\t\t<div class=\"numeralia-mm\">{{ field_matricula_h }}
\t\t</div>
\t</div>
</div>", "__string_template__c6957b209bfc632198bb31113c1a575f", "");
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
        static $filters = ["escape" => 18];
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
