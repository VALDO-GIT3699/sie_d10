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

/* __string_template__3a7090b46e03029cc5e608ff14446552 */
class __TwigTemplate_4e6c529d70f123375e782c469d76469c extends Template
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
        yield "<div class=\"matricula-summary\">
<div class=\"row \">
<div class=\"col-3 img-numeralia\">
    <img src=\"/sites/default/files/estudiantes.png\" class=\"img-fluid\"/ alt=\"En la imagen se muestra una estudiante con libretas en la mano\">
</div>
<div class=\"col-9\">
    <div class=\"text-center\">
        <span class=\"text-black big\">Total de estudiantes en la<br>Universidad de Guadalajara: </span><br>
        <span class=\"text-blue extra-big\"> ";
        // line 9
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_matricula_t"] ?? null), "html", null, true);
        yield "</span>
    </div>
    <div class=\"text-center\">
        <div class=\"row\">
            <div class=\"col-6\">
                <span class=\"text-black summary\">Hombres </span><br>
                <span class=\"text-black big\">";
        // line 15
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_matricula_h"] ?? null), "html", null, true);
        yield "</span>
            </div>
            <div class=\"col-6\">
                <span class=\"text-black summary\">Mujeres </span><br>
                <span class=\"text-black big\">";
        // line 19
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_matricula_m"] ?? null), "html", null, true);
        yield "</span>
            </div>
        </div>
    </div>
    <div class=\"text-center\">
        <span class=\"text-black big\"><br>Estudiantes con discapacidad:</span><br>
        <span class=\"text-blue extra-big\">";
        // line 25
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_discapacidad_t"] ?? null), "html", null, true);
        yield "</span>
    </div>
    <div class=\"text-center\">
        <div class=\"row\">
            <div class=\"col-6\">
                <span class=\"text-black summary\">Hombres</span><br>
                <span class=\"text-black big\">";
        // line 31
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_discapacidad_h"] ?? null), "html", null, true);
        yield "</span>
            </div>
            <div class=\"col-6\">
                <span class=\"text-black summary\">Mujeres</span><br>
                <span class=\"text-black big\">";
        // line 35
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_discapacidad_m"] ?? null), "html", null, true);
        yield "</span>
            </div>
        </div>
    </div>
    <div class=\"text-center\">
        <span class=\"text-black big\"><br>Estudiantes hablantes de alguna lengua indígena</span><br>
        <span class=\"text-blue extra-big\">";
        // line 41
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_habla_indigena_t"] ?? null), "html", null, true);
        yield "</span>
    </div>
    <div class=\"text-center\">
        <div class=\"row\">
            <div class=\"col-6\">
                <span class=\"text-black summary\">Hombres</span><br>
                <span class=\"text-black big\">";
        // line 47
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_habla_indigena_h"] ?? null), "html", null, true);
        yield "</span>
            </div>
            <div class=\"col-6\">
                <span class=\"text-black summary\">Mujeres</span><br>
                <span class=\"text-black big\">";
        // line 51
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["field_habla_indigena_m"] ?? null), "html", null, true);
        yield "</span>
            </div>
        </div>
    </div>
</div>
</div>
</div>";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["field_matricula_t", "field_matricula_h", "field_matricula_m", "field_discapacidad_t", "field_discapacidad_h", "field_discapacidad_m", "field_habla_indigena_t", "field_habla_indigena_h", "field_habla_indigena_m"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "__string_template__3a7090b46e03029cc5e608ff14446552";
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
        return array (  119 => 51,  112 => 47,  103 => 41,  94 => 35,  87 => 31,  78 => 25,  69 => 19,  62 => 15,  53 => 9,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# inline_template_start #}<div class=\"matricula-summary\">
<div class=\"row \">
<div class=\"col-3 img-numeralia\">
    <img src=\"/sites/default/files/estudiantes.png\" class=\"img-fluid\"/ alt=\"En la imagen se muestra una estudiante con libretas en la mano\">
</div>
<div class=\"col-9\">
    <div class=\"text-center\">
        <span class=\"text-black big\">Total de estudiantes en la<br>Universidad de Guadalajara: </span><br>
        <span class=\"text-blue extra-big\"> {{ field_matricula_t }}</span>
    </div>
    <div class=\"text-center\">
        <div class=\"row\">
            <div class=\"col-6\">
                <span class=\"text-black summary\">Hombres </span><br>
                <span class=\"text-black big\">{{ field_matricula_h }}</span>
            </div>
            <div class=\"col-6\">
                <span class=\"text-black summary\">Mujeres </span><br>
                <span class=\"text-black big\">{{ field_matricula_m }}</span>
            </div>
        </div>
    </div>
    <div class=\"text-center\">
        <span class=\"text-black big\"><br>Estudiantes con discapacidad:</span><br>
        <span class=\"text-blue extra-big\">{{ field_discapacidad_t }}</span>
    </div>
    <div class=\"text-center\">
        <div class=\"row\">
            <div class=\"col-6\">
                <span class=\"text-black summary\">Hombres</span><br>
                <span class=\"text-black big\">{{ field_discapacidad_h }}</span>
            </div>
            <div class=\"col-6\">
                <span class=\"text-black summary\">Mujeres</span><br>
                <span class=\"text-black big\">{{ field_discapacidad_m }}</span>
            </div>
        </div>
    </div>
    <div class=\"text-center\">
        <span class=\"text-black big\"><br>Estudiantes hablantes de alguna lengua indígena</span><br>
        <span class=\"text-blue extra-big\">{{ field_habla_indigena_t }}</span>
    </div>
    <div class=\"text-center\">
        <div class=\"row\">
            <div class=\"col-6\">
                <span class=\"text-black summary\">Hombres</span><br>
                <span class=\"text-black big\">{{ field_habla_indigena_h }}</span>
            </div>
            <div class=\"col-6\">
                <span class=\"text-black summary\">Mujeres</span><br>
                <span class=\"text-black big\">{{ field_habla_indigena_m }}</span>
            </div>
        </div>
    </div>
</div>
</div>
</div>", "__string_template__3a7090b46e03029cc5e608ff14446552", "");
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
        static $filters = ["escape" => 9];
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
