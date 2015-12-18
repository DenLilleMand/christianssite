<?php

/* modules/custom/flex_slider/templates/flex-slider-primary-page.html.twig */
class __TwigTemplate_d4644a1ca727487c93dcc75a731539e7a621e18a6ccdb75222adeea640e37602 extends Twig_Template
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
        $tags = array();
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array(),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 1
        echo "<div class=\"flexslider\">
    <ul class=\"slides\">
        <li>
            <img src=";
        // line 4
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["image1"]) ? $context["image1"] : null), "html", null, true));
        echo " />
        </li>
        <li>
            <img src=";
        // line 7
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["image2"]) ? $context["image2"] : null), "html", null, true));
        echo " />
        </li>
        <li>
            <img src=";
        // line 10
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["image3"]) ? $context["image3"] : null), "html", null, true));
        echo " />
        </li>
    </ul>
</div>";
    }

    public function getTemplateName()
    {
        return "modules/custom/flex_slider/templates/flex-slider-primary-page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 10,  54 => 7,  48 => 4,  43 => 1,);
    }
}
/* <div class="flexslider">*/
/*     <ul class="slides">*/
/*         <li>*/
/*             <img src={{ image1 }} />*/
/*         </li>*/
/*         <li>*/
/*             <img src={{ image2 }} />*/
/*         </li>*/
/*         <li>*/
/*             <img src={{ image3 }} />*/
/*         </li>*/
/*     </ul>*/
/* </div>*/
