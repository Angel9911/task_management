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

/* @SncRedis/Collector/redis.html.twig */
class __TwigTemplate_030e94ed931b40c8871ab37747f3d374 extends Template
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
        // line 1
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@SncRedis/Collector/redis.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_toolbar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "    ";
        $context["profiler_markup_version"] = ((array_key_exists("profiler_markup_version", $context)) ? (Twig\Extension\CoreExtension::default(($context["profiler_markup_version"] ?? null), 1)) : (1));
        // line 5
        yield "
    ";
        // line 6
        if ((($context["profiler_markup_version"] ?? null) == 1)) {
            // line 7
            yield "        ";
            $context["icon"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 8
                yield "            <img width=\"20\" height=\"28\" alt=\"Redis\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAcCAYAAABh2p9gAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAv5JREFUeNrsVd9L01EUP9/tbm5ubtI2VqAOYpJP0WCYNOilQAiySbICHyp67CXqrf8jqKeejAVJ9GAUmUEMfYjSl5IYexqM1G3Mn1O3uT6fy+4QMV/yoQe/cLi7557zOZ/zOder1Ww25Tg/mxzzdwL4HwKqZDJ51Pkpy7JGtre3r9dqtbMul2vB4XBM4qp9gr962JVTBx0IcsIS+HkL64jP5zuTSqWkXq9LPp+/MDs7e1cp9QuAk4h5iZgfhwIioB8sxvb29m673e7z2Eu1WpVwOCwDAwMSi8VkZmZGcrmcFIvFc7u7u09sNttjgH8B6CvYW8AUrdHR0SvYPETA1Wg06hofH5dQKMQCUqlUZGJiQhYXFyWRSMj8/Lxsbm7KxsZG27q7u3W80+ksAeepWltbe9TZ2XmNLDs6OiQQCEhvb6/Y7Xa2r1uFhjI3Nycej0dQWPtZEJoKutGxOzs7ARRIWWjlPdCHASoQXAd4vV4N1NPTI0NDQxKJRHSR6elpSafTgjbboCxApltbW9JoNL4qv9//HVoNsz1WIksGoIgUCgXJZrPS19cny8vLMjU1pWOQqPUlCJi12fIWKLQRwSR1WwTiykACMolAmUxGF+LeALEDMu3q6tJSsDvkDqqlpaUg26ST4mLSWngmQV/BJDU4pq/P2Cr36EzLQ3aMLZfLZGtXSMgRgMZAApMxE8iGftMWWZIR2yPD9fV1fW7YImdBBYNBDydsWLESmXFINJxrzfi1psl7qKUhaxYhAbJFXL8qlUqnmcjKPDCsWJ3WElsDmiFQBiMTAenjUFHEr4D6e3V1VQ+EiYYV2yCwGQS1o/C8yIwhKP0rKyvmbjbhe8c/vQf48Rn7+wC4BBY2JjKJjM0NMBqyTRYnGIvCX4K9gT0D1jcrHo/vf8oGcXAP4DeQGKZmbI1mWjZsEfcTrhd8IGCF9puwD9A8ElxCSLqJ9Q7Wi3S3jhs4/4D1OewjrHrwtfoboLTeOjvsMmwMVoO9hmWOekCtk//L//z9EWAADA/Sh+MqnZ4AAAAASUVORK5CYII=\"/>

            <span class=\"sf-toolbar-status\">";
                // line 10
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "commandcount", [], "any", false, false, false, 10), "html", null, true);
                yield "</span>
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 12
            yield "
        ";
            // line 13
            $context["text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 14
                yield "            <div class=\"sf-toolbar-info-piece\">
                <b>Queries</b>
                <span class=\"sf-toolbar-status\">";
                // line 16
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "commandcount", [], "any", false, false, false, 16), "html", null, true);
                yield "</span>
            </div>

            <div class=\"sf-toolbar-info-piece\">
                <b>Query time</b>
                <span>";
                // line 21
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "time", [], "any", false, false, false, 21)), "html", null, true);
                yield " ms</span>
            </div>

            ";
                // line 24
                if ((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "erroredCommandsCount", [], "any", false, false, false, 24) > 0)) {
                    // line 25
                    yield "                <div class=\"sf-toolbar-info-piece\">
                    <b>Failed Queries</b>
                    <span class=\"sf-toolbar-status sf-toolbar-status-red\">";
                    // line 27
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "erroredCommandsCount", [], "any", false, false, false, 27), "html", null, true);
                    yield "</span>
                </div>
            ";
                }
                // line 30
                yield "        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 31
            yield "
        ";
            // line 32
            yield from $this->loadTemplate("@WebProfiler/Profiler/toolbar_item.html.twig", "@SncRedis/Collector/redis.html.twig", 32)->unwrap()->yield(CoreExtension::merge($context, ["link" => ($context["profiler_url"] ?? null), "status" => (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "erroredCommandsCount", [], "any", false, false, false, 32) > 0)) ? ("red") : (""))]));
            // line 33
            yield "    ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "commandcount", [], "any", false, false, false, 33) > 0)) {
            // line 34
            yield "        ";
            $context["icon"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 35
                yield "            ";
                yield Twig\Extension\CoreExtension::include($this->env, $context, "@SncRedis/Collector/icon.svg.twig");
                yield "

            <span class=\"sf-toolbar-value\">";
                // line 37
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "commandCount", [], "any", false, false, false, 37), "html", null, true);
                yield "</span>
            <span class=\"sf-toolbar-info-piece-additional-detail\">
                <span class=\"sf-toolbar-label\">in</span>
                <span class=\"sf-toolbar-value\">";
                // line 40
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "time", [], "any", false, false, false, 40)), "html", null, true);
                yield "</span>
                <span class=\"sf-toolbar-label\">ms</span>
            </span>
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 44
            yield "
        ";
            // line 45
            $context["text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 46
                yield "            <div class=\"sf-toolbar-info-piece\">
                <b>Queries</b>
                <span class=\"sf-toolbar-status\">";
                // line 48
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "commandcount", [], "any", false, false, false, 48), "html", null, true);
                yield "</span>
            </div>

            <div class=\"sf-toolbar-info-piece\">
                <b>Query time</b>
                <span>";
                // line 53
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "time", [], "any", false, false, false, 53)), "html", null, true);
                yield " ms</span>
            </div>

            ";
                // line 56
                if ((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "erroredCommandsCount", [], "any", false, false, false, 56) > 0)) {
                    // line 57
                    yield "                <div class=\"sf-toolbar-info-piece\">
                    <b>Failed Queries</b>
                    <span class=\"sf-toolbar-status sf-toolbar-status-red\">";
                    // line 59
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "erroredCommandsCount", [], "any", false, false, false, 59), "html", null, true);
                    yield "</span>
                </div>
            ";
                }
                // line 62
                yield "        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 63
            yield "
        ";
            // line 64
            yield from $this->loadTemplate("@WebProfiler/Profiler/toolbar_item.html.twig", "@SncRedis/Collector/redis.html.twig", 64)->unwrap()->yield(CoreExtension::merge($context, ["link" => ($context["profiler_url"] ?? null), "status" => (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "erroredCommandsCount", [], "any", false, false, false, 64) > 0)) ? ("red") : (""))]));
            // line 65
            yield "    ";
        }
        yield from [];
    }

    // line 68
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_menu(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 69
        $context["profiler_markup_version"] = ((array_key_exists("profiler_markup_version", $context)) ? (Twig\Extension\CoreExtension::default(($context["profiler_markup_version"] ?? null), 1)) : (1));
        // line 70
        yield "
";
        // line 71
        if ((($context["profiler_markup_version"] ?? null) == 1)) {
            // line 72
            yield "    <span class=\"label\">
        <span class=\"icon\">
            <img width=\"32\" height=\"28\" src=\"data:image/png;base64, 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\" alt=\"Redis\" />
        </span>
        <strong>Redis</strong>
        <span class=\"count\">
            <span>";
            // line 78
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "commandcount", [], "any", false, false, false, 78), "html", null, true);
            yield "</span>
            <span>";
            // line 79
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.0f", CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "time", [], "any", false, false, false, 79)), "html", null, true);
            yield " ms</span>
        </span>
    </span>
";
        } else {
            // line 83
            yield "    <span class=\"label label-status-";
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "erroredCommandsCount", [], "any", false, false, false, 83) > 0)) ? ("error") : (""));
            yield " ";
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "commandcount", [], "any", false, false, false, 83) == 0)) ? ("disabled") : (""));
            yield "\">
        <span class=\"icon\">";
            // line 84
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@SncRedis/Collector/icon.svg.twig", ["colors" => ["light" => "#DDD", "dark" => "#999"]]);
            yield "</span>
        <strong>Redis</strong>
        ";
            // line 86
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "erroredCommandsCount", [], "any", false, false, false, 86) > 0)) {
                // line 87
                yield "            <span class=\"count\">
                <span>";
                // line 88
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "erroredCommandsCount", [], "any", false, false, false, 88), "html", null, true);
                yield "</span>
            </span>
        ";
            }
            // line 91
            yield "    </span>
";
        }
        yield from [];
    }

    // line 95
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_panel(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 96
        yield "    ";
        $context["profiler_markup_version"] = ((array_key_exists("profiler_markup_version", $context)) ? (Twig\Extension\CoreExtension::default(($context["profiler_markup_version"] ?? null), 1)) : (1));
        // line 97
        yield "
    <h2>Commands</h2>

    ";
        // line 100
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "commandcount", [], "any", false, false, false, 100) == 0)) {
            // line 101
            yield "        <div class=\"empty\">
            <p";
            // line 102
            if ((($context["profiler_markup_version"] ?? null) == 1)) {
                yield " style=\"font-style:italic;\"";
            }
            yield ">No commands were executed or the logger is disabled.</p>
        </div>
    ";
        } else {
            // line 105
            yield "        <div class=\"metrics\">
            <div class=\"metric\">
                <span class=\"value\">";
            // line 107
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "commandcount", [], "any", false, false, false, 107), "html", null, true);
            yield "</span>
                <span class=\"label\">Queries</span>
            </div>

            <div class=\"metric\">
                <span class=\"value\">";
            // line 112
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "time", [], "any", false, false, false, 112)), "html", null, true);
            yield " <span class=\"unit\">ms</span></span>
                <span class=\"label\">Query time</span>
            </div>

            <div class=\"metric highlight\">
                <span class=\"value";
            // line 117
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "erroredCommandsCount", [], "any", false, false, false, 117) > 0)) {
                yield " error";
            }
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "erroredCommandsCount", [], "any", false, false, false, 117), "html", null, true);
            yield "</span>
                <span class=\"label\">Failed Queries</span>
            </div>
        </div>

        <table class=\"alt\">
            <thead>
                <tr>
                    <th class=\"nowrap\">#</th>
                    <th class=\"nowrap\">Time</th>
                    <th class=\"nowrap\">Connection</th>
                    <th style=\"width:100%\">Command</th>
            </thead>
            <tbody>
                ";
            // line 131
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "commands", [], "any", false, false, false, 131));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["command"]) {
                // line 132
                yield "                    <tr ";
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["command"], "error", [], "any", false, false, false, 132)) ? ("class=\"status-error\"") : (""));
                yield ">
                        <td>";
                // line 133
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 133), "html", null, true);
                yield "</td>
                        <td class=\"nowrap\">";
                // line 134
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", CoreExtension::getAttribute($this->env, $this->source, $context["command"], "executionMS", [], "any", false, false, false, 134)), "html", null, true);
                yield " ms</td>
                        <td class=\"font-normal\">";
                // line 135
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["command"], "conn", [], "any", false, false, false, 135), "html", null, true);
                yield "</td>
                        <td>
                            ";
                // line 137
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["command"], "cmd", [], "any", false, false, false, 137), "html", null, true);
                yield "

                            ";
                // line 139
                if (CoreExtension::getAttribute($this->env, $this->source, $context["command"], "error", [], "any", false, false, false, 139)) {
                    // line 140
                    yield "                                <br><strong class=\"font-normal\">An error occured: ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["command"], "error", [], "any", false, false, false, 140), "html", null, true);
                    yield "</strong>
                            ";
                }
                // line 142
                yield "                        </td>
                    </tr>
                ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['command'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 145
            yield "            </tbody>
        </table>
    ";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@SncRedis/Collector/redis.html.twig";
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
        return array (  397 => 145,  381 => 142,  375 => 140,  373 => 139,  368 => 137,  363 => 135,  359 => 134,  355 => 133,  350 => 132,  333 => 131,  312 => 117,  304 => 112,  296 => 107,  292 => 105,  284 => 102,  281 => 101,  279 => 100,  274 => 97,  271 => 96,  264 => 95,  257 => 91,  251 => 88,  248 => 87,  246 => 86,  241 => 84,  234 => 83,  227 => 79,  223 => 78,  215 => 72,  213 => 71,  210 => 70,  208 => 69,  201 => 68,  195 => 65,  193 => 64,  190 => 63,  186 => 62,  180 => 59,  176 => 57,  174 => 56,  168 => 53,  160 => 48,  156 => 46,  154 => 45,  151 => 44,  143 => 40,  137 => 37,  131 => 35,  128 => 34,  125 => 33,  123 => 32,  120 => 31,  116 => 30,  110 => 27,  106 => 25,  104 => 24,  98 => 21,  90 => 16,  86 => 14,  84 => 13,  81 => 12,  75 => 10,  71 => 8,  68 => 7,  66 => 6,  63 => 5,  60 => 4,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@SncRedis/Collector/redis.html.twig", "E:\\Export\\Task Management system Symfony\\task_management\\vendor\\snc\\redis-bundle\\src\\Resources\\views\\Collector\\redis.html.twig");
    }
}
