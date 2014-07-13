<?php

/* KatropineAdminBundle:User:list.html.twig */
class __TwigTemplate_fada82426d7871f2225925f7dcd24ebfe80fb87aa1c8876cb87ae990e1a724cd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("KatropineAdminBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "KatropineAdminBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "User List";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"container-fluid\">
        <nav class=\"navbar navbar-default\" role=\"navigation\">

            <div class=\"container-fluid\">
                <form class=\"navbar-form navbar-left\" role=\"search\" method=\"GET\">
                    <div class=\"form-group\">
                        <input type=\"text\" name=\"q\" class=\"form-control\" placeholder=\"Search\">
                    </div>

                    <button type=\"submit\" class=\"btn btn-default\">Submit</button>

                </form>
                <div class=\"navbar-form navbar-right\">
                    
                    <a href=\"\${pageContext.request.contextPath}/secure/user?id=0&action=details\" class=\"btn btn-primary\">Add new</a>
                   
                </div>
            </div>
        </nav>
    </div>
    <div class=\"container-fluid\">
        <div class=\"panel panel-default\">
            <div class=\"row\">
                <div class=\"col-md-4\"><div class=\"container-fluid\"><h2 class=\"page-heading user\"><fmt:message key=\"users\"/></h2></div></div>
                <div class=\"col-md-8\">
                    <div class=\"container-fluid\">
                        <div class=\"btn-toolbar\" role=\"toolbar\">
                            <div class=\"btn-group pull-right\">paginationHtmlRows</div><div class=\"btn-group pull-right\">";
        // line 33
        $this->env->loadTemplate("KatropineAdminBundle:partials:pagination.html.twig")->display($context);
        echo "</div>
                        </div>
                    </div>
                </div>
            </div>
            
                
            <div>Show: ";
        // line 40
        echo twig_escape_filter($this->env, (isset($context["userCount"]) ? $context["userCount"] : $this->getContext($context, "userCount")), "html", null, true);
        echo " / ";
        echo twig_escape_filter($this->env, (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total")), "html", null, true);
        echo "</div>
            <table class=\"table table-hover table-striped\">
                <tr>
                    <th>Id</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th></th>
                </tr>
                ";
        // line 50
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : $this->getContext($context, "users")));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 51
            echo "                <tr>
                    <td>";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "id"), "html", null, true);
            echo "</td>
                    <td>";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "firstname"), "html", null, true);
            echo "</td>
                    <td>";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "lastname"), "html", null, true);
            echo "</td>
                    <td>";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "email"), "html", null, true);
            echo "</td>
                    <td>";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "company"), "name"), "html", null, true);
            echo "</td>
                    <td align=\"right\"><a href=\"#\" class=\"btn btn-success btn-xs\">edit</a> <a href=\"#\" class=\"btn btn-danger btn-xs\">delete</a></td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "            </table>
            <div class=\"container-fluid\">
                <div class=\"btn-toolbar\" role=\"toolbar\">
                    <div class=\"btn-group pull-right\">paginationHtmlRows</div><div class=\"btn-group pull-right\">";
        // line 63
        $this->env->loadTemplate("KatropineAdminBundle:partials:pagination.html.twig")->display($context);
        echo "</div>
                </div>
            </div>
        </div>
    </div>              
";
    }

    public function getTemplateName()
    {
        return "KatropineAdminBundle:User:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 63,  125 => 60,  115 => 56,  111 => 55,  107 => 54,  103 => 53,  99 => 52,  96 => 51,  92 => 50,  77 => 40,  67 => 33,  38 => 6,  35 => 5,  29 => 3,);
    }
}
