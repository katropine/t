<?php

/* KatropineAdminBundle::layout.html.twig */
class __TwigTemplate_e9f9aaf77d3dd245aafac354a1ac3c72a004f83b0f304a58ce047b8443ef0409 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    <title>Dashboard - SB Admin</title>

    ";
        // line 11
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 18
        echo "  </head>

  <body>

    <div id=\"wrapper\">

      <!-- Sidebar -->
      <nav class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class=\"navbar-header\">
          <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-ex1-collapse\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
          <a class=\"navbar-brand\" href=\"index.html\">SB Admin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class=\"collapse navbar-collapse navbar-ex1-collapse\">
          <ul class=\"nav navbar-nav side-nav\">
            <li class=\"active\"><a href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("dashboard_index");
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
            <li><a href=\"";
        // line 41
        echo $this->env->getExtension('routing')->getPath("user_list");
        echo "\"><span class=\"fa fa-bar-chart-o\"></span> Users</a></li>
            <li><a href=\"tables.html\"><i class=\"fa fa-table\"></i> Tables</a></li>
            <li><a href=\"forms.html\"><i class=\"fa fa-edit\"></i> Forms</a></li>
            <li><a href=\"typography.html\"><i class=\"fa fa-font\"></i> Typography</a></li>
            <li><a href=\"bootstrap-elements.html\"><i class=\"fa fa-desktop\"></i> Bootstrap Elements</a></li>
            <li><a href=\"bootstrap-grid.html\"><i class=\"fa fa-wrench\"></i> Bootstrap Grid</a></li>
            <li><a href=\"blank-page.html\"><i class=\"fa fa-file\"></i> Blank Page</a></li>
            <li class=\"dropdown\">
              <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-caret-square-o-down\"></i> Dropdown <b class=\"caret\"></b></a>
              <ul class=\"dropdown-menu\">
                <li><a href=\"#\">Dropdown Item</a></li>
                <li><a href=\"#\">Another Item</a></li>
                <li><a href=\"#\">Third Item</a></li>
                <li><a href=\"#\">Last Item</a></li>
              </ul>
            </li>
          </ul>

          <ul class=\"nav navbar-nav navbar-right navbar-user\">
            <li class=\"dropdown messages-dropdown\">
              <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-envelope\"></i> Messages <span class=\"badge\">7</span> <b class=\"caret\"></b></a>
              <ul class=\"dropdown-menu\">
                <li class=\"dropdown-header\">7 New Messages</li>
                <li class=\"message-preview\">
                  <a href=\"#\">
                    <span class=\"avatar\"><img src=\"http://placehold.it/50x50\"></span>
                    <span class=\"name\">John Smith:</span>
                    <span class=\"message\">Hey there, I wanted to ask you something...</span>
                    <span class=\"time\"><i class=\"fa fa-clock-o\"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class=\"divider\"></li>
                <li class=\"message-preview\">
                  <a href=\"#\">
                    <span class=\"avatar\"><img src=\"http://placehold.it/50x50\"></span>
                    <span class=\"name\">John Smith:</span>
                    <span class=\"message\">Hey there, I wanted to ask you something...</span>
                    <span class=\"time\"><i class=\"fa fa-clock-o\"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class=\"divider\"></li>
                <li class=\"message-preview\">
                  <a href=\"#\">
                    <span class=\"avatar\"><img src=\"http://placehold.it/50x50\"></span>
                    <span class=\"name\">John Smith:</span>
                    <span class=\"message\">Hey there, I wanted to ask you something...</span>
                    <span class=\"time\"><i class=\"fa fa-clock-o\"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class=\"divider\"></li>
                <li><a href=\"#\">View Inbox <span class=\"badge\">7</span></a></li>
              </ul>
            </li>
            <li class=\"dropdown alerts-dropdown\">
              <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-bell\"></i> Alerts <span class=\"badge\">3</span> <b class=\"caret\"></b></a>
              <ul class=\"dropdown-menu\">
                <li><a href=\"#\">Default <span class=\"label label-default\">Default</span></a></li>
                <li><a href=\"#\">Primary <span class=\"label label-primary\">Primary</span></a></li>
                <li><a href=\"#\">Success <span class=\"label label-success\">Success</span></a></li>
                <li><a href=\"#\">Info <span class=\"label label-info\">Info</span></a></li>
                <li><a href=\"#\">Warning <span class=\"label label-warning\">Warning</span></a></li>
                <li><a href=\"#\">Danger <span class=\"label label-danger\">Danger</span></a></li>
                <li class=\"divider\"></li>
                <li><a href=\"#\">View All</a></li>
              </ul>
            </li>
            <li class=\"dropdown user-dropdown\">
              <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-user\"></i> John Smith <b class=\"caret\"></b></a>
              <ul class=\"dropdown-menu\">
                <li><a href=\"#\"><i class=\"fa fa-user\"></i> Profile</a></li>
                <li><a href=\"#\"><i class=\"fa fa-envelope\"></i> Inbox <span class=\"badge\">7</span></a></li>
                <li><a href=\"#\"><i class=\"fa fa-gear\"></i> Settings</a></li>
                <li class=\"divider\"></li>
                <li><a href=\"#\"><i class=\"fa fa-power-off\"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id=\"page-wrapper\">

        <div class=\"row\">
          <div class=\"col-lg-12\">
            <h1>Dashboard <small>Statistics Overview</small></h1>
            <ol class=\"breadcrumb\">
              <li class=\"active\"><i class=\"fa fa-dashboard\"></i> Dashboard</li>
            </ol>
            <div class=\"alert alert-success alert-dismissable\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
              Welcome to SB Admin by <a class=\"alert-link\" href=\"http://startbootstrap.com\">Start Bootstrap</a>! Feel free to use this template for your admin needs! We are using a few different plugins to handle the dynamic tables and charts, so make sure you check out the necessary documentation links provided.
            </div>
          </div>
        </div><!-- /.row -->

        <div class=\"row\">
          <div class=\"col-lg-3\">
            <div class=\"panel panel-info\">
              <div class=\"panel-heading\">
                <div class=\"row\">
                  <div class=\"col-xs-6\">
                    <i class=\"fa fa-comments fa-5x\"></i>
                  </div>
                  <div class=\"col-xs-6 text-right\">
                    <p class=\"announcement-heading\">456</p>
                    <p class=\"announcement-text\">New Mentions!</p>
                  </div>
                </div>
              </div>
              <a href=\"#\">
                <div class=\"panel-footer announcement-bottom\">
                  <div class=\"row\">
                    <div class=\"col-xs-6\">
                      View Mentions
                    </div>
                    <div class=\"col-xs-6 text-right\">
                      <i class=\"fa fa-arrow-circle-right\"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class=\"col-lg-3\">
            <div class=\"panel panel-warning\">
              <div class=\"panel-heading\">
                <div class=\"row\">
                  <div class=\"col-xs-6\">
                    <i class=\"fa fa-check fa-5x\"></i>
                  </div>
                  <div class=\"col-xs-6 text-right\">
                    <p class=\"announcement-heading\">12</p>
                    <p class=\"announcement-text\">To-Do Items</p>
                  </div>
                </div>
              </div>
              <a href=\"#\">
                <div class=\"panel-footer announcement-bottom\">
                  <div class=\"row\">
                    <div class=\"col-xs-6\">
                      Complete Tasks
                    </div>
                    <div class=\"col-xs-6 text-right\">
                      <i class=\"fa fa-arrow-circle-right\"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class=\"col-lg-3\">
            <div class=\"panel panel-danger\">
              <div class=\"panel-heading\">
                <div class=\"row\">
                  <div class=\"col-xs-6\">
                    <i class=\"fa fa-tasks fa-5x\"></i>
                  </div>
                  <div class=\"col-xs-6 text-right\">
                    <p class=\"announcement-heading\">18</p>
                    <p class=\"announcement-text\">Crawl Errors</p>
                  </div>
                </div>
              </div>
              <a href=\"#\">
                <div class=\"panel-footer announcement-bottom\">
                  <div class=\"row\">
                    <div class=\"col-xs-6\">
                      Fix Issues
                    </div>
                    <div class=\"col-xs-6 text-right\">
                      <i class=\"fa fa-arrow-circle-right\"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class=\"col-lg-3\">
            <div class=\"panel panel-success\">
              <div class=\"panel-heading\">
                <div class=\"row\">
                  <div class=\"col-xs-6\">
                    <i class=\"fa fa-comments fa-5x\"></i>
                  </div>
                  <div class=\"col-xs-6 text-right\">
                    <p class=\"announcement-heading\">56</p>
                    <p class=\"announcement-text\">New Orders!</p>
                  </div>
                </div>
              </div>
              <a href=\"#\">
                <div class=\"panel-footer announcement-bottom\">
                  <div class=\"row\">
                    <div class=\"col-xs-6\">
                      Complete Orders
                    </div>
                    <div class=\"col-xs-6 text-right\">
                      <i class=\"fa fa-arrow-circle-right\"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div><!-- /.row -->

        <div id=\"content\">
            ";
        // line 248
        $this->displayBlock('body', $context, $blocks);
        // line 249
        echo "        </div>
        

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    ";
        // line 257
        $this->displayBlock('javascripts', $context, $blocks);
        // line 265
        echo "

  </body>
</html>
";
    }

    // line 11
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 12
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "d4a040e_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d4a040e_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/d4a040e_part_1_bootstrap_1.css");
            // line 15
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
            // asset "d4a040e_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d4a040e_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/d4a040e_part_1_bootstrap.min_2.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
            // asset "d4a040e_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d4a040e_2") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/d4a040e_part_1_sb-admin_3.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
        } else {
            // asset "d4a040e"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d4a040e") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/d4a040e.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
        }
        unset($context["asset_url"]);
        // line 17
        echo "    ";
    }

    // line 248
    public function block_body($context, array $blocks = array())
    {
    }

    // line 257
    public function block_javascripts($context, array $blocks = array())
    {
        // line 258
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "40d3138_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_40d3138_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/40d3138_jquery-1.10.2_1.js");
            // line 262
            echo "            <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "40d3138_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_40d3138_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/40d3138_bootstrap.min_2.js");
            echo "            <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "40d3138"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_40d3138") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/40d3138.js");
            echo "            <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 264
        echo "    ";
    }

    public function getTemplateName()
    {
        return "KatropineAdminBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  367 => 264,  347 => 262,  342 => 258,  339 => 257,  334 => 248,  330 => 17,  304 => 15,  299 => 12,  296 => 11,  288 => 265,  286 => 257,  276 => 249,  274 => 248,  64 => 41,  60 => 40,  36 => 18,  34 => 11,  22 => 1,  122 => 60,  112 => 56,  108 => 55,  104 => 54,  100 => 53,  96 => 52,  93 => 51,  89 => 50,  74 => 40,  38 => 6,  35 => 5,  29 => 3,);
    }
}
