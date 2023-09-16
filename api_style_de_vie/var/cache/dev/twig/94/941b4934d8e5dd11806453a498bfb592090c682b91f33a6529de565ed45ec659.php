<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* emails/forgetPassword.html.twig */
class __TwigTemplate_2f27f67e8f12c872c8e6fa812ab2e398d4a08507d0207edb305c9b5ab0e9adda extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/forgetPassword.html.twig"));

        // line 2
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html>
  <head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">
    <meta name=\"x-apple-disable-message-reformatting\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"format-detection\" content=\"telephone=no, date=no, address=no, email=no\">
    <style type=\"text/css\">
      body,table,td{font-family:Helvetica,Arial,sans-serif !important}.ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:150%}a{text-decoration:none}*{color:inherit}a[x-apple-data-detectors],u+#body a,#MessageViewBody a{color:inherit;text-decoration:none;font-size:inherit;font-family:inherit;font-weight:inherit;line-height:inherit}img{-ms-interpolation-mode:bicubic}table:not([class^=s-]){font-family:Helvetica,Arial,sans-serif;mso-table-lspace:0pt;mso-table-rspace:0pt;border-spacing:0px;border-collapse:collapse}table:not([class^=s-]) td{border-spacing:0px;border-collapse:collapse}@media screen and (max-width: 600px){.w-full,.w-full>tbody>tr>td{width:100% !important}.w-24,.w-24>tbody>tr>td{width:96px !important}.w-40,.w-40>tbody>tr>td{width:160px !important}.p-lg-10:not(table),.p-lg-10:not(.btn)>tbody>tr>td,.p-lg-10.btn td a{padding:0 !important}.p-3:not(table),.p-3:not(.btn)>tbody>tr>td,.p-3.btn td a{padding:12px !important}.p-6:not(table),.p-6:not(.btn)>tbody>tr>td,.p-6.btn td a{padding:24px !important}*[class*=s-lg-]>tbody>tr>td{font-size:0 !important;line-height:0 !important;height:0 !important}.s-4>tbody>tr>td{font-size:16px !important;line-height:16px !important;height:16px !important}.s-6>tbody>tr>td{font-size:24px !important;line-height:24px !important;height:24px !important}.s-10>tbody>tr>td{font-size:40px !important;line-height:40px !important;height:40px !important}}
    </style>
  </head>
  <body class=\"bg-light\" style=\"outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;\" bgcolor=\"#f7fafc\">
    <table class=\"bg-light body\" valign=\"top\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;\" bgcolor=\"#f7fafc\">
      <tbody>
        <tr>
          <td valign=\"top\" style=\"line-height: 24px; font-size: 16px; margin: 0;\" align=\"left\" bgcolor=\"#f7fafc\">
            <table class=\"container\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\">
              <tbody>
                <tr>
                  <td align=\"center\" style=\"line-height: 24px; font-size: 16px; margin: 0; padding: 0 16px;\">
                    <!--[if (gte mso 9)|(IE)]>
                      <table align=\"center\" role=\"presentation\">
                        <tbody>
                          <tr>
                            <td width=\"600\">
                    <![endif]-->
                    <table align=\"center\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%; max-width: 600px; margin: 0 auto;\">
                      <tbody>
                        <tr>
                          <td style=\"line-height: 24px; font-size: 16px; margin: 0;\" align=\"left\">
                            <table class=\"s-10 w-full\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\" width=\"100%\">
                              <tbody>
                                <tr>
                                  <td style=\"line-height: 40px; font-size: 40px; width: 100%; height: 40px; margin: 0;\" align=\"left\" width=\"100%\" height=\"40\">
                                    &#160;
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table class=\"ax-center\" role=\"presentation\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin: 0 auto;\">
                              <tbody>
                                <tr>
                                  <td style=\"line-height: 24px; font-size: 16px; margin: 0;\" align=\"left\">
                                    <img class=\"w-24\" src=\"https://i.ibb.co/j4b2hwg/hirafy.png\" style=\"height: auto; line-height: 100%; outline: none; text-decoration: none; display: block; width: 96px; border-style: none; border-width: 0;\" width=\"96\">
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table class=\"s-10 w-full\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\" width=\"100%\">
                              <tbody>
                                <tr>
                                  <td style=\"line-height: 40px; font-size: 40px; width: 100%; height: 40px; margin: 0;\" align=\"left\" width=\"100%\" height=\"40\">
                                    &#160;
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table class=\"card p-6 p-lg-10 space-y-4\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-radius: 6px; border-collapse: separate !important; width: 100%; overflow: hidden; border: 1px solid #e2e8f0;\" bgcolor=\"#ffffff\">
                              <tbody>
                                <tr>
                                  <td style=\"line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 40px;\" align=\"left\" bgcolor=\"#ffffff\">
                                    <h1 class=\"h3 fw-700\" style=\"padding-top: 0; padding-bottom: 0; font-weight: 700 !important; vertical-align: baseline; font-size: 28px; line-height: 33.6px; margin: 0;\" align=\"left\">
                                      Bonjour ";
        // line 65
        echo twig_escape_filter($this->env, (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 65, $this->source); })()), "html", null, true);
        echo ",
                                    </h1>
                                    <table class=\"s-4 w-full\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\" width=\"100%\">
                                      <tbody>
                                        <tr>
                                          <td style=\"line-height: 16px; font-size: 16px; width: 100%; height: 16px; margin: 0;\" align=\"left\" width=\"100%\" height=\"16\">
                                            &#160;
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <p class=\"\" style=\"line-height: 24px; font-size: 16px; width: 100%; margin: 0;\" align=\"left\">
                                        Il semble que vous ayez oublié votre mot de passe pour <b>Hirafy.</b> <br>
                                        Si tel est le cas, cliquez sur le lien ci-dessous pour réinitialiser votre mot de passe.<br>
                                        Si vous n'avez pas oublié votre mot de passe, veuillez ne pas tenir compte de cet e-mail.
                                    </p>
                                    <table class=\"s-4 w-full\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\" width=\"100%\">
                                      <tbody>
                                        <tr>
                                          <td style=\"line-height: 16px; font-size: 16px; width: 100%; height: 16px; margin: 0;\" align=\"left\" width=\"100%\" height=\"16\">
                                            &#160;
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <table class=\"btn btn-primary p-3 fw-700\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-radius: 6px; border-collapse: separate !important; font-weight: 700 !important;\">
                                      <tbody>
                                        <tr>
                                          <td style=\"line-height: 24px; font-size: 16px; border-radius: 6px; font-weight: 700 !important; margin: 0;\" align=\"center\" bgcolor=\"#0d6efd\">
                                            <a href=\"http://localhost:4200/reset_password/";
        // line 94
        echo twig_escape_filter($this->env, (isset($context["token"]) || array_key_exists("token", $context) ? $context["token"] : (function () { throw new RuntimeError('Variable "token" does not exist.', 94, $this->source); })()), "html", null, true);
        echo "\" style=\"color: #ffffff; font-size: 16px; font-family: Helvetica, Arial, sans-serif; text-decoration: none; border-radius: 6px; line-height: 20px; display: block; font-weight: 700 !important; white-space: nowrap; background-color: #0d6efd; padding: 12px; border: 1px solid #0d6efd;\">Cliquer ici pour réinitialiser mon mot de passe</a>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table class=\"s-10 w-full\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\" width=\"100%\">
                              <tbody>
                                <tr>
                                  <td style=\"line-height: 40px; font-size: 40px; width: 100%; height: 40px; margin: 0;\" align=\"left\" width=\"100%\" height=\"40\">
                                    &#160;
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table class=\"ax-center\" role=\"presentation\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin: 0 auto;\">
                              <tbody>
                                <tr>
                                  <td style=\"line-height: 24px; font-size: 16px; margin: 0;\" align=\"left\">
                                    <img class=\"w-40\" src=\"https://i.ibb.co/wLqmTwq/Capture-d-cran-du-2023-08-18-09-04-18.png\" style=\"height: auto; line-height: 100%; outline: none; text-decoration: none; display: block; width: 90px; border-style: none; border-width: 0;\" width=\"160\">
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table class=\"s-6 w-full\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\" width=\"100%\">
                              <tbody>
                                <tr>
                                  <td style=\"line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;\" align=\"left\" width=\"100%\" height=\"24\">
                                    &#160;
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <div class=\"text-muted text-center\" style=\"color: #718096;\" align=\"center\"></div>
                            <table class=\"s-6 w-full\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\" width=\"100%\">
                              <tbody>
                                <tr>
                                  <td style=\"line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;\" align=\"left\" width=\"100%\" height=\"24\">
                                    &#160;
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <!--[if (gte mso 9)|(IE)]>
                    </td>
                  </tr>
                </tbody>
              </table>
                    <![endif]-->
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "emails/forgetPassword.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 94,  105 => 65,  40 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# templates/emails/forgetPassword.html.twig #}
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html>
  <head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">
    <meta name=\"x-apple-disable-message-reformatting\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"format-detection\" content=\"telephone=no, date=no, address=no, email=no\">
    <style type=\"text/css\">
      body,table,td{font-family:Helvetica,Arial,sans-serif !important}.ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:150%}a{text-decoration:none}*{color:inherit}a[x-apple-data-detectors],u+#body a,#MessageViewBody a{color:inherit;text-decoration:none;font-size:inherit;font-family:inherit;font-weight:inherit;line-height:inherit}img{-ms-interpolation-mode:bicubic}table:not([class^=s-]){font-family:Helvetica,Arial,sans-serif;mso-table-lspace:0pt;mso-table-rspace:0pt;border-spacing:0px;border-collapse:collapse}table:not([class^=s-]) td{border-spacing:0px;border-collapse:collapse}@media screen and (max-width: 600px){.w-full,.w-full>tbody>tr>td{width:100% !important}.w-24,.w-24>tbody>tr>td{width:96px !important}.w-40,.w-40>tbody>tr>td{width:160px !important}.p-lg-10:not(table),.p-lg-10:not(.btn)>tbody>tr>td,.p-lg-10.btn td a{padding:0 !important}.p-3:not(table),.p-3:not(.btn)>tbody>tr>td,.p-3.btn td a{padding:12px !important}.p-6:not(table),.p-6:not(.btn)>tbody>tr>td,.p-6.btn td a{padding:24px !important}*[class*=s-lg-]>tbody>tr>td{font-size:0 !important;line-height:0 !important;height:0 !important}.s-4>tbody>tr>td{font-size:16px !important;line-height:16px !important;height:16px !important}.s-6>tbody>tr>td{font-size:24px !important;line-height:24px !important;height:24px !important}.s-10>tbody>tr>td{font-size:40px !important;line-height:40px !important;height:40px !important}}
    </style>
  </head>
  <body class=\"bg-light\" style=\"outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;\" bgcolor=\"#f7fafc\">
    <table class=\"bg-light body\" valign=\"top\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;\" bgcolor=\"#f7fafc\">
      <tbody>
        <tr>
          <td valign=\"top\" style=\"line-height: 24px; font-size: 16px; margin: 0;\" align=\"left\" bgcolor=\"#f7fafc\">
            <table class=\"container\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\">
              <tbody>
                <tr>
                  <td align=\"center\" style=\"line-height: 24px; font-size: 16px; margin: 0; padding: 0 16px;\">
                    <!--[if (gte mso 9)|(IE)]>
                      <table align=\"center\" role=\"presentation\">
                        <tbody>
                          <tr>
                            <td width=\"600\">
                    <![endif]-->
                    <table align=\"center\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%; max-width: 600px; margin: 0 auto;\">
                      <tbody>
                        <tr>
                          <td style=\"line-height: 24px; font-size: 16px; margin: 0;\" align=\"left\">
                            <table class=\"s-10 w-full\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\" width=\"100%\">
                              <tbody>
                                <tr>
                                  <td style=\"line-height: 40px; font-size: 40px; width: 100%; height: 40px; margin: 0;\" align=\"left\" width=\"100%\" height=\"40\">
                                    &#160;
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table class=\"ax-center\" role=\"presentation\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin: 0 auto;\">
                              <tbody>
                                <tr>
                                  <td style=\"line-height: 24px; font-size: 16px; margin: 0;\" align=\"left\">
                                    <img class=\"w-24\" src=\"https://i.ibb.co/j4b2hwg/hirafy.png\" style=\"height: auto; line-height: 100%; outline: none; text-decoration: none; display: block; width: 96px; border-style: none; border-width: 0;\" width=\"96\">
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table class=\"s-10 w-full\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\" width=\"100%\">
                              <tbody>
                                <tr>
                                  <td style=\"line-height: 40px; font-size: 40px; width: 100%; height: 40px; margin: 0;\" align=\"left\" width=\"100%\" height=\"40\">
                                    &#160;
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table class=\"card p-6 p-lg-10 space-y-4\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-radius: 6px; border-collapse: separate !important; width: 100%; overflow: hidden; border: 1px solid #e2e8f0;\" bgcolor=\"#ffffff\">
                              <tbody>
                                <tr>
                                  <td style=\"line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 40px;\" align=\"left\" bgcolor=\"#ffffff\">
                                    <h1 class=\"h3 fw-700\" style=\"padding-top: 0; padding-bottom: 0; font-weight: 700 !important; vertical-align: baseline; font-size: 28px; line-height: 33.6px; margin: 0;\" align=\"left\">
                                      Bonjour {{name}},
                                    </h1>
                                    <table class=\"s-4 w-full\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\" width=\"100%\">
                                      <tbody>
                                        <tr>
                                          <td style=\"line-height: 16px; font-size: 16px; width: 100%; height: 16px; margin: 0;\" align=\"left\" width=\"100%\" height=\"16\">
                                            &#160;
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <p class=\"\" style=\"line-height: 24px; font-size: 16px; width: 100%; margin: 0;\" align=\"left\">
                                        Il semble que vous ayez oublié votre mot de passe pour <b>Hirafy.</b> <br>
                                        Si tel est le cas, cliquez sur le lien ci-dessous pour réinitialiser votre mot de passe.<br>
                                        Si vous n'avez pas oublié votre mot de passe, veuillez ne pas tenir compte de cet e-mail.
                                    </p>
                                    <table class=\"s-4 w-full\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\" width=\"100%\">
                                      <tbody>
                                        <tr>
                                          <td style=\"line-height: 16px; font-size: 16px; width: 100%; height: 16px; margin: 0;\" align=\"left\" width=\"100%\" height=\"16\">
                                            &#160;
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <table class=\"btn btn-primary p-3 fw-700\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-radius: 6px; border-collapse: separate !important; font-weight: 700 !important;\">
                                      <tbody>
                                        <tr>
                                          <td style=\"line-height: 24px; font-size: 16px; border-radius: 6px; font-weight: 700 !important; margin: 0;\" align=\"center\" bgcolor=\"#0d6efd\">
                                            <a href=\"http://localhost:4200/reset_password/{{ token }}\" style=\"color: #ffffff; font-size: 16px; font-family: Helvetica, Arial, sans-serif; text-decoration: none; border-radius: 6px; line-height: 20px; display: block; font-weight: 700 !important; white-space: nowrap; background-color: #0d6efd; padding: 12px; border: 1px solid #0d6efd;\">Cliquer ici pour réinitialiser mon mot de passe</a>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table class=\"s-10 w-full\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\" width=\"100%\">
                              <tbody>
                                <tr>
                                  <td style=\"line-height: 40px; font-size: 40px; width: 100%; height: 40px; margin: 0;\" align=\"left\" width=\"100%\" height=\"40\">
                                    &#160;
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table class=\"ax-center\" role=\"presentation\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin: 0 auto;\">
                              <tbody>
                                <tr>
                                  <td style=\"line-height: 24px; font-size: 16px; margin: 0;\" align=\"left\">
                                    <img class=\"w-40\" src=\"https://i.ibb.co/wLqmTwq/Capture-d-cran-du-2023-08-18-09-04-18.png\" style=\"height: auto; line-height: 100%; outline: none; text-decoration: none; display: block; width: 90px; border-style: none; border-width: 0;\" width=\"160\">
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table class=\"s-6 w-full\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\" width=\"100%\">
                              <tbody>
                                <tr>
                                  <td style=\"line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;\" align=\"left\" width=\"100%\" height=\"24\">
                                    &#160;
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <div class=\"text-muted text-center\" style=\"color: #718096;\" align=\"center\"></div>
                            <table class=\"s-6 w-full\" role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\" width=\"100%\">
                              <tbody>
                                <tr>
                                  <td style=\"line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;\" align=\"left\" width=\"100%\" height=\"24\">
                                    &#160;
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <!--[if (gte mso 9)|(IE)]>
                    </td>
                  </tr>
                </tbody>
              </table>
                    <![endif]-->
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
", "emails/forgetPassword.html.twig", "/home/sabrine/gitlab/Hirafy/Hirafy/api_style_de_vie/templates/emails/forgetPassword.html.twig");
    }
}
