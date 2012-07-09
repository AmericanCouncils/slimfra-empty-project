<?php

/* hello.html.twig */
class __TwigTemplate_07961cb460e5d9793c8350a7197cf193 extends Twig_Template
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
        echo "<!doctype html>
<html>
\t<head>
\t\t<title></title>
\t</head>
\t<body>
\t\t<h1>";
        // line 7
        echo twig_escape_filter($this->env, $this->getContext($context, "app_name"), "html", null, true);
        echo "</h1>
\t\t<p>Hello ";
        // line 8
        echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
        echo "!</p>
\t</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "hello.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 8,  25 => 7,  17 => 1,);
    }
}
