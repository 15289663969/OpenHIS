<?php

/* server/binlog/log_row.twig */
class __TwigTemplate_1565afabd5298f2c0f6691d188972d82439658c8a5a56a414146fd4a05d828dd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<tr class=\"noclick\">
    <td>";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : null), "Log_name", [], "array"), "html", null, true);
        echo "</td>
    <td class=\"right\">";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : null), "Pos", [], "array"), "html", null, true);
        echo "</td>
    <td>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : null), "Event_type", [], "array"), "html", null, true);
        echo "</td>
    <td class=\"right\">";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : null), "Server_id", [], "array"), "html", null, true);
        echo "</td>
    <td class=\"right\">";
        // line 7
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["value"]) ? $context["value"] : null), "Orig_log_pos", [], "array", true, true)) ? ($this->getAttribute((isset($context["value"]) ? $context["value"] : null), "Orig_log_pos", [], "array")) : ($this->getAttribute((isset($context["value"]) ? $context["value"] : null), "End_log_pos", [], "array"))), "html", null, true);
        // line 8
        echo "</td>
    <td>";
        // line 9
        echo PhpMyAdmin\Util::formatSql($this->getAttribute((isset($context["value"]) ? $context["value"] : null), "Info", [], "array"),  !(isset($context["dontlimitchars"]) ? $context["dontlimitchars"] : null));
        echo "</td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "server/binlog/log_row.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 9,  40 => 8,  38 => 7,  34 => 5,  30 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "server/binlog/log_row.twig", "D:\\phpstudy_pro\\WWW\\OpenHIS\\phpMyAdmin4.8.5\\templates\\server\\binlog\\log_row.twig");
    }
}
