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

/* @SncRedis/Collector/icon.svg.twig */
class __TwigTemplate_b7a609e7e759ce03388544024c8f573d extends Template
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
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SncRedis/Collector/icon.svg.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SncRedis/Collector/icon.svg.twig"));

        // line 1
        yield "<svg version=\"1.1\" id=\"Layer_1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" width=\"28.004px\" height=\"24px\" viewBox=\"0 0 28.004 24\" enable-background=\"new 0 0 28.004 24\" xml:space=\"preserve\">
    <path fill=\"#aaa\" d=\"M1.135,6.663c1.484,0.711,9.722,4.039,11.023,4.66c1.302,0.623,2.219,0.63,3.865-0.229 c1.648-0.859,9.391-4.043,10.885-4.821s1.438-1.218-0.02-1.752c-1.455-0.533-9.15-3.596-10.625-4.136 c-1.474-0.54-2.076-0.517-3.806,0.104L1.075,4.896C-0.382,5.467-0.351,5.956,1.135,6.663z M14.555,9.889L10.026,8.01l6.49-0.995 L14.555,9.889z M24.38,5.423l-3.838,1.516L20.54,3.904L24.38,5.423z M13.112,2.641l-0.627-1.157l1.957,0.766l1.846-0.604l-0.5,1.197 l1.883,0.704l-2.426,0.251l-0.543,1.308l-0.879-1.458l-2.801-0.251L13.112,2.641z M8.279,4.275c1.916,0,3.469,0.601,3.469,1.345 c0,0.742-1.553,1.344-3.469,1.344S4.81,6.362,4.81,5.62C4.81,4.875,6.362,4.274,8.279,4.275z M1.075,9.684 c0.066-0.028,0.15-0.061,0.248-0.098c1.891,0.862,9.578,3.969,10.832,4.57c1.302,0.621,2.219,0.629,3.865-0.23 c1.578-0.822,8.707-3.762,10.646-4.701c0.082,0.031,0.16,0.061,0.224,0.083c1.454,0.534,1.512,0.974,0.016,1.755 c-1.493,0.778-9.236,3.96-10.885,4.82c-1.646,0.86-2.564,0.85-3.865,0.229c-1.3-0.62-9.538-3.95-11.023-4.659 C-0.353,10.743-0.384,10.254,1.075,9.684z M26.907,15.676c-1.496,0.777-9.236,3.961-10.886,4.82 c-1.648,0.859-2.563,0.852-3.864,0.229c-1.303-0.621-9.541-3.949-11.023-4.658c-1.484-0.711-1.516-1.196-0.059-1.77 c0.016-0.006,0.033-0.014,0.051-0.02c0.002,0,0.004,0.002,0.008,0.004c1.482,0.709,9.723,4.035,11.023,4.658 c1.303,0.623,2.217,0.631,3.864-0.229c1.636-0.854,9.25-3.983,10.84-4.799c0.009,0.004,0.019,0.008,0.025,0.01 C28.343,14.457,28.4,14.896,26.907,15.676z\"/>
    <path fill=\"#555\" d=\"M28.001,14.73c0,0.002,0.002,0.002,0.002,0.002s0,2.526,0,2.789c0,0.28-0.336,0.588-1.096,0.983 c-1.496,0.779-9.236,3.961-10.886,4.82c-1.648,0.858-2.563,0.852-3.864,0.229c-1.303-0.621-9.541-3.949-11.023-4.658 c-0.742-0.354-1.133-0.654-1.133-0.938s0-2.822,0-2.828c0.012,0.281,0.391,0.58,1.133,0.935c1.482,0.709,9.723,4.039,11.023,4.66 c1.303,0.623,2.217,0.631,3.864-0.229c1.648-0.861,9.39-4.043,10.886-4.82C27.632,15.297,27.986,15,28.001,14.73z M26.907,11.061 c-1.496,0.777-9.236,3.96-10.886,4.82c-1.648,0.86-2.563,0.852-3.864,0.229c-1.303-0.62-9.541-3.948-11.023-4.657 c-0.742-0.354-1.121-0.654-1.133-0.937c0,0.01,0,2.547,0,2.831c0,0.284,0.391,0.58,1.133,0.938 c1.482,0.709,9.723,4.034,11.023,4.655c1.303,0.623,2.217,0.631,3.864-0.227c1.648-0.859,9.39-4.043,10.886-4.822 c0.76-0.395,1.096-0.703,1.096-0.981c0-0.265,0-2.791,0-2.791h-0.002C27.988,10.383,27.632,10.682,26.907,11.061z M1.132,9.497 c1.484,0.709,9.725,4.037,11.025,4.66c1.301,0.62,2.217,0.631,3.864-0.23c1.646-0.858,9.39-4.042,10.883-4.821 c0.763-0.396,1.099-0.703,1.099-0.983c0-0.263,0-2.791,0-2.791s-0.002,0-0.004,0c-0.013,0.268-0.367,0.564-1.095,0.942 c-1.493,0.778-9.233,3.962-10.885,4.821c-1.646,0.859-2.563,0.853-3.862,0.229c-1.303-0.621-9.541-3.949-11.025-4.658 C0.392,6.31,0.013,6.01,0.001,5.729c0,0.007,0,2.548,0,2.83C0.001,8.842,0.39,9.141,1.132,9.497z M20.542,6.939L20.54,3.905 l-4.25,1.682l3.836,1.517L20.542,6.939z\"/>
</svg>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@SncRedis/Collector/icon.svg.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<svg version=\"1.1\" id=\"Layer_1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" width=\"28.004px\" height=\"24px\" viewBox=\"0 0 28.004 24\" enable-background=\"new 0 0 28.004 24\" xml:space=\"preserve\">
    <path fill=\"#aaa\" d=\"M1.135,6.663c1.484,0.711,9.722,4.039,11.023,4.66c1.302,0.623,2.219,0.63,3.865-0.229 c1.648-0.859,9.391-4.043,10.885-4.821s1.438-1.218-0.02-1.752c-1.455-0.533-9.15-3.596-10.625-4.136 c-1.474-0.54-2.076-0.517-3.806,0.104L1.075,4.896C-0.382,5.467-0.351,5.956,1.135,6.663z M14.555,9.889L10.026,8.01l6.49-0.995 L14.555,9.889z M24.38,5.423l-3.838,1.516L20.54,3.904L24.38,5.423z M13.112,2.641l-0.627-1.157l1.957,0.766l1.846-0.604l-0.5,1.197 l1.883,0.704l-2.426,0.251l-0.543,1.308l-0.879-1.458l-2.801-0.251L13.112,2.641z M8.279,4.275c1.916,0,3.469,0.601,3.469,1.345 c0,0.742-1.553,1.344-3.469,1.344S4.81,6.362,4.81,5.62C4.81,4.875,6.362,4.274,8.279,4.275z M1.075,9.684 c0.066-0.028,0.15-0.061,0.248-0.098c1.891,0.862,9.578,3.969,10.832,4.57c1.302,0.621,2.219,0.629,3.865-0.23 c1.578-0.822,8.707-3.762,10.646-4.701c0.082,0.031,0.16,0.061,0.224,0.083c1.454,0.534,1.512,0.974,0.016,1.755 c-1.493,0.778-9.236,3.96-10.885,4.82c-1.646,0.86-2.564,0.85-3.865,0.229c-1.3-0.62-9.538-3.95-11.023-4.659 C-0.353,10.743-0.384,10.254,1.075,9.684z M26.907,15.676c-1.496,0.777-9.236,3.961-10.886,4.82 c-1.648,0.859-2.563,0.852-3.864,0.229c-1.303-0.621-9.541-3.949-11.023-4.658c-1.484-0.711-1.516-1.196-0.059-1.77 c0.016-0.006,0.033-0.014,0.051-0.02c0.002,0,0.004,0.002,0.008,0.004c1.482,0.709,9.723,4.035,11.023,4.658 c1.303,0.623,2.217,0.631,3.864-0.229c1.636-0.854,9.25-3.983,10.84-4.799c0.009,0.004,0.019,0.008,0.025,0.01 C28.343,14.457,28.4,14.896,26.907,15.676z\"/>
    <path fill=\"#555\" d=\"M28.001,14.73c0,0.002,0.002,0.002,0.002,0.002s0,2.526,0,2.789c0,0.28-0.336,0.588-1.096,0.983 c-1.496,0.779-9.236,3.961-10.886,4.82c-1.648,0.858-2.563,0.852-3.864,0.229c-1.303-0.621-9.541-3.949-11.023-4.658 c-0.742-0.354-1.133-0.654-1.133-0.938s0-2.822,0-2.828c0.012,0.281,0.391,0.58,1.133,0.935c1.482,0.709,9.723,4.039,11.023,4.66 c1.303,0.623,2.217,0.631,3.864-0.229c1.648-0.861,9.39-4.043,10.886-4.82C27.632,15.297,27.986,15,28.001,14.73z M26.907,11.061 c-1.496,0.777-9.236,3.96-10.886,4.82c-1.648,0.86-2.563,0.852-3.864,0.229c-1.303-0.62-9.541-3.948-11.023-4.657 c-0.742-0.354-1.121-0.654-1.133-0.937c0,0.01,0,2.547,0,2.831c0,0.284,0.391,0.58,1.133,0.938 c1.482,0.709,9.723,4.034,11.023,4.655c1.303,0.623,2.217,0.631,3.864-0.227c1.648-0.859,9.39-4.043,10.886-4.822 c0.76-0.395,1.096-0.703,1.096-0.981c0-0.265,0-2.791,0-2.791h-0.002C27.988,10.383,27.632,10.682,26.907,11.061z M1.132,9.497 c1.484,0.709,9.725,4.037,11.025,4.66c1.301,0.62,2.217,0.631,3.864-0.23c1.646-0.858,9.39-4.042,10.883-4.821 c0.763-0.396,1.099-0.703,1.099-0.983c0-0.263,0-2.791,0-2.791s-0.002,0-0.004,0c-0.013,0.268-0.367,0.564-1.095,0.942 c-1.493,0.778-9.233,3.962-10.885,4.821c-1.646,0.859-2.563,0.853-3.862,0.229c-1.303-0.621-9.541-3.949-11.025-4.658 C0.392,6.31,0.013,6.01,0.001,5.729c0,0.007,0,2.548,0,2.83C0.001,8.842,0.39,9.141,1.132,9.497z M20.542,6.939L20.54,3.905 l-4.25,1.682l3.836,1.517L20.542,6.939z\"/>
</svg>
", "@SncRedis/Collector/icon.svg.twig", "E:\\Export\\Task Management system Symfony\\task_management\\vendor\\snc\\redis-bundle\\src\\Resources\\views\\Collector\\icon.svg.twig");
    }
}
