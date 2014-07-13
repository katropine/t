<?php

/* FOSUserBundle::layout.html.twig */
class __TwigTemplate_d8eb1ddbf8e1e8b6a9c3c9d78272aee0dc1f4d1e3e5c272a878f2db1a0ede952 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "984c3e8_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_984c3e8_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/984c3e8_part_1_login_1.css");
            // line 8
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
            // asset "984c3e8_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_984c3e8_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/984c3e8_bootstrap_2.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
        } else {
            // asset "984c3e8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_984c3e8") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/984c3e8.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
        }
        unset($context["asset_url"]);
    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
        // line 13
        echo "    <div id=\"master-loginform\" class=\"master-loginform clearfix\">
            <h1>Log in:</h1>
            
            ";
        // line 16
        $this->displayBlock("fos_user_content", $context, $blocks);
        echo "
        </div>   
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 16,  62 => 13,  59 => 12,  37 => 8,  32 => 4,  29 => 3,  74 => 24,  69 => 22,  61 => 17,  55 => 14,  51 => 13,  46 => 11,  42 => 10,  39 => 9,  33 => 7,  31 => 6,  28 => 5,);
    }
}
