<?php

/* KatropineAdminBundle:partials:pagination.html.twig */
class __TwigTemplate_41124c7646c2525d68622d61bed39b667edda8ab509e42b76a6da3471bf7806d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<ul class=\"pagination\">
    ";
        // line 2
        if (($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "total") > $this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "maxrows"))) {
            // line 3
            echo "       <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("user_list");
            echo "/page/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "first"), "html", null, true);
            echo "\" title=\"Go to Page ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "first"), "html", null, true);
            echo "\">&laquo;</a></li>
       <li><a href=\"";
            // line 4
            echo $this->env->getExtension('routing')->getPath("user_list");
            echo "/page/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "prev"), "html", null, true);
            echo "\" title=\"Go to Page ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "prev"), "html", null, true);
            echo "\">&lsaquo;</a></li>
        ";
            // line 5
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "start"), $this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "end")));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 6
                echo "        ";
                if (((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) == $this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "page"))) {
                    // line 7
                    echo "        ";
                    $context["current"] = "active";
                    // line 8
                    echo "        ";
                } else {
                    // line 9
                    echo "        ";
                    $context["current"] = "";
                    // line 10
                    echo "        ";
                }
                // line 11
                echo "        <li class=\"";
                echo twig_escape_filter($this->env, (isset($context["current"]) ? $context["current"] : $this->getContext($context, "current")), "html", null, true);
                echo "\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("user_list");
                echo "/page/";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                echo "\" title=\"Go to Page ";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                echo "\" class=\"page ";
                echo twig_escape_filter($this->env, (isset($context["current"]) ? $context["current"] : $this->getContext($context, "current")), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                echo "</a></li>

    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "       <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("user_list");
            echo "/page/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "next"), "html", null, true);
            echo "\" title=\"Go to Page ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "next"), "html", null, true);
            echo "\">&rsaquo;</a></li>
       <li><a href=\"";
            // line 15
            echo $this->env->getExtension('routing')->getPath("user_list");
            echo "/page/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "last"), "html", null, true);
            echo "\" title=\"Go to Page ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "last"), "html", null, true);
            echo "\">&raquo;</a></li>
    ";
        }
        // line 16
        echo "   
    <li class=\"disabled\"><a href=\"#\">";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "page"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "end"), "html", null, true);
        echo "</a></li>
    <li class=\"disabled\"><a href=\"#\">records: ";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "total"), "html", null, true);
        echo "</a></li>
</ul>";
    }

    public function getTemplateName()
    {
        return "KatropineAdminBundle:partials:pagination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 18,  101 => 17,  98 => 16,  89 => 15,  80 => 14,  60 => 11,  57 => 10,  54 => 9,  51 => 8,  48 => 7,  45 => 6,  41 => 5,  33 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
