<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    'app_attribut' => [[], ['_controller' => 'App\\Controller\\AttributController::index'], [], [['text', '/attribut']], [], [], []],
    'app_create_attribut' => [[], ['_controller' => 'App\\Controller\\AttributController::create'], [], [['text', '/api/attributs']], [], [], []],
    'app_get_all_attribut' => [[], ['_controller' => 'App\\Controller\\AttributController::getAllAttributs'], [], [['text', '/api/attributs']], [], [], []],
    'app_edit_attribut' => [['id'], ['_controller' => 'App\\Controller\\AttributController::editAttributs'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/attributs']], [], [], []],
    'app_get_attribut' => [['id'], ['_controller' => 'App\\Controller\\AttributController::getAttribut'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/attributs']], [], [], []],
    'app_delete_attribut' => [['id'], ['_controller' => 'App\\Controller\\AttributController::deleteAttribut'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/attributs']], [], [], []],
    'app_auth' => [[], ['_controller' => 'App\\Controller\\AuthController::index'], [], [['text', '/auth']], [], [], []],
    'register' => [[], ['_controller' => 'App\\Controller\\AuthController::register'], [], [['text', '/api/register']], [], [], []],
    'confirm_email' => [['token'], ['_controller' => 'App\\Controller\\AuthController::confirmEmail'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/api/confirm/email']], [], [], []],
    'app_forget_password' => [[], ['_controller' => 'App\\Controller\\AuthController::forgetPassword'], [], [['text', '/api/forget_password']], [], [], []],
    'reset_password' => [[], ['_controller' => 'App\\Controller\\AuthController::resetPassword'], [], [['text', '/api/reset_password']], [], [], []],
    'app_biography' => [[], ['_controller' => 'App\\Controller\\BiographyController::index'], [], [['text', '/biography']], [], [], []],
    'app_create_biography' => [[], ['_controller' => 'App\\Controller\\BiographyController::create'], [], [['text', '/api/biography']], [], [], []],
    'app_get_all_biography' => [[], ['_controller' => 'App\\Controller\\BiographyController::getAllBiographies'], [], [['text', '/api/biographies']], [], [], []],
    'app_edit_biography' => [['id'], ['_controller' => 'App\\Controller\\BiographyController::editBiography'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/biography']], [], [], []],
    'app_get_biography' => [['id'], ['_controller' => 'App\\Controller\\BiographyController::getBiography'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/biography']], [], [], []],
    'app_delete_biography' => [['id'], ['_controller' => 'App\\Controller\\BiographyController::deleteBiography'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/biography']], [], [], []],
    'app_category' => [[], ['_controller' => 'App\\Controller\\CategoryController::index'], [], [['text', '/category']], [], [], []],
    'app_create_category' => [[], ['_controller' => 'App\\Controller\\CategoryController::create'], [], [['text', '/api/categories']], [], [], []],
    'app_get_all_category' => [[], ['_controller' => 'App\\Controller\\CategoryController::getAllCategories'], [], [['text', '/api/categories']], [], [], []],
    'app_edit_category' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::editCategories'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories']], [], [], []],
    'app_get_category' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::getCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories']], [], [], []],
    'app_delete_category' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::deleteCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories']], [], [], []],
    'app_contact' => [[], ['_controller' => 'App\\Controller\\ContactController::index'], [], [['text', '/contact']], [], [], []],
    'app_create_contact' => [[], ['_controller' => 'App\\Controller\\ContactController::createContact'], [], [['text', '/api/contacts']], [], [], []],
    'app_reset_notifications' => [[], ['_controller' => 'App\\Controller\\ContactController::resetNotification'], [], [['text', '/api/reset-notifications']], [], [], []],
    'app_get_all_contact' => [[], ['_controller' => 'App\\Controller\\ContactController::getAllContact'], [], [['text', '/api/contacts']], [], [], []],
    'app_get_status_contact' => [[], ['_controller' => 'App\\Controller\\ContactController::getStatusContact'], [], [['text', '/api/contacts/status']], [], [], []],
    'app_edit_contact' => [['id'], ['_controller' => 'App\\Controller\\ContactController::editContacts'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/contacts']], [], [], []],
    'app_get_contact' => [['id'], ['_controller' => 'App\\Controller\\ContactController::getContact'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/contacts']], [], [], []],
    'app_delete_contact' => [['id'], ['_controller' => 'App\\Controller\\ContactController::deleteContact'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/contacts']], [], [], []],
    'app_delete_multiple_contact' => [[], ['_controller' => 'App\\Controller\\ContactController::deleteMultipleContacts'], [], [['text', '/api/contacts/delete-multiple']], [], [], []],
    'app_declinaison' => [[], ['_controller' => 'App\\Controller\\DeclinaisonController::index'], [], [['text', '/declinaison']], [], [], []],
    'app_depot' => [[], ['_controller' => 'App\\Controller\\DepotController::index'], [], [['text', '/depot']], [], [], []],
    'app_create_depot' => [[], ['_controller' => 'App\\Controller\\DepotController::createDepot'], [], [['text', '/api/depots']], [], [], []],
    'app_get_all_depot' => [[], ['_controller' => 'App\\Controller\\DepotController::getAllDepot'], [], [['text', '/api/depots']], [], [], []],
    'app_get_all_depot_user' => [[], ['_controller' => 'App\\Controller\\DepotController::getAllDepotUser'], [], [['text', '/api/depots/user']], [], [], []],
    'app_edit_depot' => [['id'], ['_controller' => 'App\\Controller\\DepotController::editDepots'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/depots']], [], [], []],
    'app_get_depot' => [['id'], ['_controller' => 'App\\Controller\\DepotController::getDepot'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/depots']], [], [], []],
    'app_delete_depot' => [['id'], ['_controller' => 'App\\Controller\\DepotController::deleteDepot'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/depots']], [], [], []],
    'app_create_entreprise' => [[], ['_controller' => 'App\\Controller\\EntrepriseController::create'], [], [['text', '/api/entreprises']], [], [], []],
    'app_update_entreprise' => [['id'], ['_controller' => 'App\\Controller\\EntrepriseController::update'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/entreprises/edit']], [], [], []],
    'upload_file' => [[], ['_controller' => 'App\\Controller\\EntrepriseController::upload_file'], [], [['text', '/api/upload_file']], [], [], []],
    'upload_multiple_file' => [[], ['_controller' => 'App\\Controller\\EntrepriseController::multiple_upload_file'], [], [['text', '/api/multiple_upload_file']], [], [], []],
    'app_get_all_entreprise' => [[], ['_controller' => 'App\\Controller\\EntrepriseController::getAllEntreprises'], [], [['text', '/api/entreprises']], [], [], []],
    'app_edit_entreprise' => [['id'], ['_controller' => 'App\\Controller\\EntrepriseController::editEntreprises'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/entreprises']], [], [], []],
    'app_get_entreprise' => [['id'], ['_controller' => 'App\\Controller\\EntrepriseController::getEntreprise'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/entreprises']], [], [], []],
    'app_delete_entreprise' => [['id'], ['_controller' => 'App\\Controller\\EntrepriseController::deleteEntreprise'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/entreprises']], [], [], []],
    'app_notification' => [[], ['_controller' => 'App\\Controller\\NotificationController::index'], [], [['text', '/notification']], [], [], []],
    'app_create_notification' => [[], ['_controller' => 'App\\Controller\\NotificationController::create'], [], [['text', '/api/notification']], [], [], []],
    'app_get_all_notification' => [[], ['_controller' => 'App\\Controller\\NotificationController::getAllNotifications'], [], [['text', '/api/notifications']], [], [], []],
    'app_product' => [[], ['_controller' => 'App\\Controller\\ProductController::index'], [], [['text', '/product']], [], [], []],
    'app_create_product' => [[], ['_controller' => 'App\\Controller\\ProductController::createProduct'], [], [['text', '/api/products']], [], [], []],
    'app_get_all_product' => [[], ['_controller' => 'App\\Controller\\ProductController::getAllProducts'], [], [['text', '/api/products']], [], [], []],
    'app_get_all_product_with_stock' => [[], ['_controller' => 'App\\Controller\\ProductController::getAllProductsWithStock'], [], [['text', '/api/productsWithStock']], [], [], []],
    'app_edit_status_product' => [['id'], ['_controller' => 'App\\Controller\\ProductController::editProductsStatus'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/products/status']], [], [], []],
    'app_edit_product' => [['id'], ['_controller' => 'App\\Controller\\ProductController::editProducts'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/products']], [], [], []],
    'app_get_product' => [['id'], ['_controller' => 'App\\Controller\\ProductController::getProduct'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/products']], [], [], []],
    'app_delete_product' => [['id'], ['_controller' => 'App\\Controller\\ProductController::deleteProduct'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/products']], [], [], []],
    'app_user' => [[], ['_controller' => 'App\\Controller\\UserController::index'], [], [['text', '/user']], [], [], []],
    'app_create_user' => [[], ['_controller' => 'App\\Controller\\UserController::createUser'], [], [['text', '/api/users']], [], [], []],
    'app_create_admin' => [[], ['_controller' => 'App\\Controller\\UserController::createAdmin'], [], [['text', '/api/admins']], [], [], []],
    'app_get_all_user' => [[], ['_controller' => 'App\\Controller\\UserController::getAllUsers'], [], [['text', '/api/users']], [], [], []],
    'app_get_all_admin' => [[], ['_controller' => 'App\\Controller\\UserController::getAllAdmins'], [], [['text', '/api/admins']], [], [], []],
    'app_edit_user' => [['id'], ['_controller' => 'App\\Controller\\UserController::editUsers'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/users']], [], [], []],
    'app_get_user' => [['id'], ['_controller' => 'App\\Controller\\UserController::getUserById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/users']], [], [], []],
    'app_get_user_email' => [[], ['_controller' => 'App\\Controller\\UserController::getUserByEmail'], [], [['text', '/api/users/email']], [], [], []],
    'app_get_user_product' => [[], ['_controller' => 'App\\Controller\\UserController::getProductByUser'], [], [['text', '/api/users/product']], [], [], []],
    'app_delete_user' => [['id'], ['_controller' => 'App\\Controller\\UserController::deleteUser'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/users']], [], [], []],
    'app_notifier_user' => [['id'], ['_controller' => 'App\\Controller\\UserController::notifierUser'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/users/notifier']], [], [], []],
    'api_genid' => [['id'], ['_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/.well-known/genid']], [], [], []],
    'api_entrypoint' => [['index', '_format'], ['_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index' => 'index'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', 'index', 'index', true], ['text', '/api']], [], [], []],
    'api_doc' => [['_format'], ['_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/api/docs']], [], [], []],
    'api_jsonld_context' => [['shortName', '_format'], ['_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName' => '[^.]+', '_format' => 'jsonld'], [['variable', '.', 'jsonld', '_format', true], ['variable', '/', '[^.]+', 'shortName', true], ['text', '/api/contexts']], [], [], []],
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    'api_login_check' => [[], [], [], [['text', '/api/login_check']], [], [], []],
    'app.swagger_ui' => [[], ['_controller' => 'nelmio_api_doc.controller.swagger_ui'], [], [['text', '/api/doc']], [], [], []],
];
