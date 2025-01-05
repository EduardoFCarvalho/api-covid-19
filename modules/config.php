<?php

// ================= ARQUIVO DE CONFIGURAÇÃO DO SITE ===================

// ========== SITE ==========
if (in_array($_SERVER['HTTP_HOST'], ['www.localhost', 'localhost', '127.0.0.1'])) {
  // ========== Tagbase para ambiente Local ==========
  define("CONF_TAG_BASE", "https://www.localhost/api-covid-19/");
} else {
  // ========== Tagbase para ambiente online ==========
  define("CONF_TAG_BASE", "url_site");
}

define("CONF_SITE_NAME","API COVID 19");

define("CONF_SITE_PHONE","(11) 1234-5678");
define("CONF_SITE_PHONE_LINK","+551112345678");

define("CONF_SITE_WHATSAPP","(11) 91234-5678");
define("CONF_SITE_WHATSAPP_LINK","https://api.whatsapp.com/send?phone=5511912345678");

define("CONF_SITE_STREET","R. Teste - bairro, São Paulo - SP");

define("CONF_SITE_MAP_IFRAME","");
define("CONF_SITE_MAP_LINK","");

define("CONF_SITE_EMAIL", "contato@teste.com.br");

// ========== MIDIAS ==========

define("CONF_SOCIAL_FACEBOOK_PAGE", "https://www.facebook.com/");
define("CONF_SOCIAL_INSTAGRAM_PAGE", "https://www.instagram.com/");
define("CONF_SOCIAL_YOUTUBE_PAGE", "https://www.youtube.com/");
define("CONF_SOCIAL_LINKEDIN_PAGE", "https://www.linkedin.com/");

// ========== MAIL ==========

define("CONF_MAIL_HOST", "");
define("CONF_MAIL_PORT", "");
define("CONF_MAIL_USER", "");
define("CONF_MAIL_PASS", "");
define("CONF_MAIL_SENDER","");
define("CONF_MAIL_TESTER","");

define("DEBUG_EMAIL",true);

// ========== RECAPTCHAR ==========

define("CONF_RECAPTCHA_KEY","");

// ========== DATABASE CONFIG ==========
  // Altere aqui os valores das cofigurações do banco de dados conforme você criou
define("CONF_DB_HOST", "localhost");
define("CONF_DB_NAME", "access-api-covid19");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");