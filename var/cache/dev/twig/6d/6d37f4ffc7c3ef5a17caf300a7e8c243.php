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

/* @GosWebSocket/Collector/websocket.html.twig */
class __TwigTemplate_6750fb2771b34f41a4610730ad039ed0 extends Template
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
            'toolbar' => [$this, 'block_toolbar'],
            'menu' => [$this, 'block_menu'],
            'panel' => [$this, 'block_panel'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 2
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@GosWebSocket/Collector/websocket.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@GosWebSocket/Collector/websocket.html.twig"));

        // line 1
        trigger_deprecation('', '', "The \"@GosWebSocket/Collector/websocket.html.twig\" template is deprecated and will be removed in GosWebSocketBundle 4.0."." in \"@GosWebSocket/Collector/websocket.html.twig\" at line 1.");
        // line 2
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@GosWebSocket/Collector/websocket.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_toolbar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "toolbar"));

        // line 5
        yield "    ";
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 5, $this->source); })()), "pushTotal", [], "any", false, false, false, 5)) {
            // line 6
            yield "        ";
            $context["icon"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 7
                yield "            ";
                yield Twig\Extension\CoreExtension::include($this->env, $context, "@GosWebSocket/Collector/icon.svg");
                yield "
            <span class=\"sf-toolbar-value\">";
                // line 8
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 8, $this->source); })()), "pushTotal", [], "any", false, false, false, 8), "html", null, true);
                yield "</span>
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 10
            yield "
        ";
            // line 11
            $context["text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 12
                yield "            <div class=\"sf-toolbar-info-piece\">
                <b>Pushes</b>
                <span class=\"sf-toolbar-status\">";
                // line 14
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 14, $this->source); })()), "pushTotal", [], "any", false, false, false, 14), "html", null, true);
                yield "</span>
            </div>

            <div class=\"sf-toolbar-info-piece\">
                <b>Duration</b>
                <span class=\"sf-toolbar-status\">";
                // line 19
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 19, $this->source); })()), "totalDuration", [], "any", false, false, false, 19)), "html", null, true);
                yield " ms</span>
            </div>
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 22
            yield "
        ";
            // line 23
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", ["link" => true]);
            yield "
    ";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 27
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_menu(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 28
        yield "    <span class=\"label ";
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 28, $this->source); })()), "pushTotal", [], "any", false, false, false, 28) == 0)) ? ("disabled") : (""));
        yield "\">
        <span class=\"icon\">";
        // line 29
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@GosWebSocket/Collector/icon.svg");
        yield "</span>
        <strong>Websocket</strong>
    </span>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 34
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_panel(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 35
        yield "    <h2>Websocket Pushes</h2>

    ";
        // line 37
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 37, $this->source); })()), "pushTotal", [], "any", false, false, false, 37) == 0)) {
            // line 38
            yield "        <div class=\"empty\">
            <p>No messages were pushed.</p>
        </div>
    ";
        } else {
            // line 42
            yield "        <div class=\"metrics\">
            <div class=\"metric\">
                <span class=\"value\">";
            // line 44
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 44, $this->source); })()), "pushTotal", [], "any", false, false, false, 44), "html", null, true);
            yield "</span>
                <span class=\"label\">Total Pushes</span>
            </div>

            <div class=\"metric\">
                <span class=\"value\">";
            // line 49
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 49, $this->source); })()), "totalDuration", [], "any", false, false, false, 49)), "html", null, true);
            yield " <span class=\"unit\">ms</span></span>
                <span class=\"label\">Duration</span>
            </div>
        </div>

        ";
            // line 54
            if (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 54, $this->source); })()), "durations", [], "any", false, false, false, 54))) {
                // line 55
                yield "            <h2>Push Durations</h2>

            <div class=\"metrics\">
                ";
                // line 58
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 58, $this->source); })()), "durations", [], "any", false, false, false, 58));
                foreach ($context['_seq'] as $context["pusher"] => $context["duration"]) {
                    // line 59
                    yield "                    <div class=\"metric\">
                        <span class=\"value\">";
                    // line 60
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", $context["duration"]), "html", null, true);
                    yield " <span class=\"unit\">ms</span></span>
                        <span class=\"label\">";
                    // line 61
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), $context["pusher"]), "html", null, true);
                    yield " (";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 61, $this->source); })()), "pusherCounts", [], "any", false, false, false, 61), $context["pusher"], [], "array", false, false, false, 61), "html", null, true);
                    yield ")</span>
                    </div>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['pusher'], $context['duration'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 64
                yield "            </div>
        ";
            }
            // line 66
            yield "    ";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@GosWebSocket/Collector/websocket.html.twig";
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
        return array (  250 => 66,  246 => 64,  235 => 61,  231 => 60,  228 => 59,  224 => 58,  219 => 55,  217 => 54,  209 => 49,  201 => 44,  197 => 42,  191 => 38,  189 => 37,  185 => 35,  172 => 34,  157 => 29,  152 => 28,  139 => 27,  125 => 23,  122 => 22,  115 => 19,  107 => 14,  103 => 12,  101 => 11,  98 => 10,  92 => 8,  87 => 7,  84 => 6,  81 => 5,  68 => 4,  57 => 2,  55 => 1,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% deprecated 'The \"@GosWebSocket/Collector/websocket.html.twig\" template is deprecated and will be removed in GosWebSocketBundle 4.0.' %}
{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}
    {% if collector.pushTotal %}
        {% set icon %}
            {{ include('@GosWebSocket/Collector/icon.svg') }}
            <span class=\"sf-toolbar-value\">{{ collector.pushTotal }}</span>
        {% endset %}

        {% set text %}
            <div class=\"sf-toolbar-info-piece\">
                <b>Pushes</b>
                <span class=\"sf-toolbar-status\">{{ collector.pushTotal }}</span>
            </div>

            <div class=\"sf-toolbar-info-piece\">
                <b>Duration</b>
                <span class=\"sf-toolbar-status\">{{ '%0.2f'|format(collector.totalDuration) }} ms</span>
            </div>
        {% endset %}

        {{ include('@WebProfiler/Profiler/toolbar_item.html.twig', { link: true }) }}
    {% endif %}
{% endblock %}

{% block menu %}
    <span class=\"label {{ collector.pushTotal == 0 ? 'disabled' }}\">
        <span class=\"icon\">{{ include('@GosWebSocket/Collector/icon.svg') }}</span>
        <strong>Websocket</strong>
    </span>
{% endblock %}

{% block panel %}
    <h2>Websocket Pushes</h2>

    {% if collector.pushTotal == 0 %}
        <div class=\"empty\">
            <p>No messages were pushed.</p>
        </div>
    {% else %}
        <div class=\"metrics\">
            <div class=\"metric\">
                <span class=\"value\">{{ collector.pushTotal }}</span>
                <span class=\"label\">Total Pushes</span>
            </div>

            <div class=\"metric\">
                <span class=\"value\">{{ '%0.2f'|format(collector.totalDuration) }} <span class=\"unit\">ms</span></span>
                <span class=\"label\">Duration</span>
            </div>
        </div>

        {% if collector.durations|length %}
            <h2>Push Durations</h2>

            <div class=\"metrics\">
                {% for pusher, duration in collector.durations %}
                    <div class=\"metric\">
                        <span class=\"value\">{{ '%0.2f'|format(duration) }} <span class=\"unit\">ms</span></span>
                        <span class=\"label\">{{ pusher|upper }} ({{ collector.pusherCounts[pusher] }})</span>
                    </div>
                {% endfor %}
            </div>
        {% endif %}
    {% endif %}
{% endblock %}
", "@GosWebSocket/Collector/websocket.html.twig", "E:\\Export\\Task Management system Symfony\\task_management\\vendor\\gos\\web-socket-bundle\\templates\\Collector\\websocket.html.twig");
    }
}
