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
class __TwigTemplate_a48362355202fd1c052318522fb9190e extends Template
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
        // line 1
        trigger_deprecation('', '', "The \"@GosWebSocket/Collector/websocket.html.twig\" template is deprecated and will be removed in GosWebSocketBundle 4.0."." in \"@GosWebSocket/Collector/websocket.html.twig\" at line 1.");
        // line 2
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@GosWebSocket/Collector/websocket.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_toolbar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 5
        yield "    ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "pushTotal", [], "any", false, false, false, 5)) {
            // line 6
            yield "        ";
            $context["icon"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 7
                yield "            ";
                yield Twig\Extension\CoreExtension::include($this->env, $context, "@GosWebSocket/Collector/icon.svg");
                yield "
            <span class=\"sf-toolbar-value\">";
                // line 8
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "pushTotal", [], "any", false, false, false, 8), "html", null, true);
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
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "pushTotal", [], "any", false, false, false, 14), "html", null, true);
                yield "</span>
            </div>

            <div class=\"sf-toolbar-info-piece\">
                <b>Duration</b>
                <span class=\"sf-toolbar-status\">";
                // line 19
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "totalDuration", [], "any", false, false, false, 19)), "html", null, true);
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
        yield from [];
    }

    // line 27
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_menu(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 28
        yield "    <span class=\"label ";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "pushTotal", [], "any", false, false, false, 28) == 0)) ? ("disabled") : (""));
        yield "\">
        <span class=\"icon\">";
        // line 29
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@GosWebSocket/Collector/icon.svg");
        yield "</span>
        <strong>Websocket</strong>
    </span>
";
        yield from [];
    }

    // line 34
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_panel(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 35
        yield "    <h2>Websocket Pushes</h2>

    ";
        // line 37
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "pushTotal", [], "any", false, false, false, 37) == 0)) {
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
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "pushTotal", [], "any", false, false, false, 44), "html", null, true);
            yield "</span>
                <span class=\"label\">Total Pushes</span>
            </div>

            <div class=\"metric\">
                <span class=\"value\">";
            // line 49
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "totalDuration", [], "any", false, false, false, 49)), "html", null, true);
            yield " <span class=\"unit\">ms</span></span>
                <span class=\"label\">Duration</span>
            </div>
        </div>

        ";
            // line 54
            if (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "durations", [], "any", false, false, false, 54))) {
                // line 55
                yield "            <h2>Push Durations</h2>

            <div class=\"metrics\">
                ";
                // line 58
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "durations", [], "any", false, false, false, 58));
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
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v0 = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "pusherCounts", [], "any", false, false, false, 61)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[$context["pusher"]] ?? null) : null), "html", null, true);
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
        return array (  208 => 66,  204 => 64,  193 => 61,  189 => 60,  186 => 59,  182 => 58,  177 => 55,  175 => 54,  167 => 49,  159 => 44,  155 => 42,  149 => 38,  147 => 37,  143 => 35,  136 => 34,  127 => 29,  122 => 28,  115 => 27,  107 => 23,  104 => 22,  97 => 19,  89 => 14,  85 => 12,  83 => 11,  80 => 10,  74 => 8,  69 => 7,  66 => 6,  63 => 5,  56 => 4,  51 => 2,  49 => 1,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@GosWebSocket/Collector/websocket.html.twig", "E:\\Export\\Task Management system Symfony\\task_management\\vendor\\gos\\web-socket-bundle\\templates\\Collector\\websocket.html.twig");
    }
}
