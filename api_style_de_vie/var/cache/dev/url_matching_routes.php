<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/attribut' => [[['_route' => 'app_attribut', '_controller' => 'App\\Controller\\AttributController::index'], null, null, null, false, false, null]],
        '/api/attributs' => [
            [['_route' => 'app_create_attribut', '_controller' => 'App\\Controller\\AttributController::create'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_get_all_attribut', '_controller' => 'App\\Controller\\AttributController::getAllAttributs'], null, ['GET' => 0], null, false, false, null],
        ],
        '/auth' => [[['_route' => 'app_auth', '_controller' => 'App\\Controller\\AuthController::index'], null, null, null, false, false, null]],
        '/api/register' => [[['_route' => 'register', '_controller' => 'App\\Controller\\AuthController::register'], null, ['POST' => 0], null, false, false, null]],
        '/api/forget_password' => [[['_route' => 'app_forget_password', '_controller' => 'App\\Controller\\AuthController::forgetPassword'], null, ['POST' => 0], null, false, false, null]],
        '/api/reset_password' => [[['_route' => 'reset_password', '_controller' => 'App\\Controller\\AuthController::resetPassword'], null, null, null, false, false, null]],
        '/biography' => [[['_route' => 'app_biography', '_controller' => 'App\\Controller\\BiographyController::index'], null, null, null, false, false, null]],
        '/api/biography' => [[['_route' => 'app_create_biography', '_controller' => 'App\\Controller\\BiographyController::create'], null, ['POST' => 0], null, false, false, null]],
        '/api/biographies' => [[['_route' => 'app_get_all_biography', '_controller' => 'App\\Controller\\BiographyController::getAllBiographies'], null, ['GET' => 0], null, false, false, null]],
        '/category' => [[['_route' => 'app_category', '_controller' => 'App\\Controller\\CategoryController::index'], null, null, null, false, false, null]],
        '/api/categories' => [
            [['_route' => 'app_create_category', '_controller' => 'App\\Controller\\CategoryController::create'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_get_all_category', '_controller' => 'App\\Controller\\CategoryController::getAllCategories'], null, ['GET' => 0], null, false, false, null],
        ],
        '/contact' => [[['_route' => 'app_contact', '_controller' => 'App\\Controller\\ContactController::index'], null, null, null, false, false, null]],
        '/api/contacts' => [
            [['_route' => 'app_create_contact', '_controller' => 'App\\Controller\\ContactController::createContact'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_get_all_contact', '_controller' => 'App\\Controller\\ContactController::getAllContact'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/reset-notifications' => [[['_route' => 'app_reset_notifications', '_controller' => 'App\\Controller\\ContactController::resetNotification'], null, ['POST' => 0], null, false, false, null]],
        '/api/contacts/status' => [[['_route' => 'app_get_status_contact', '_controller' => 'App\\Controller\\ContactController::getStatusContact'], null, ['GET' => 0], null, false, false, null]],
        '/declinaison' => [[['_route' => 'app_declinaison', '_controller' => 'App\\Controller\\DeclinaisonController::index'], null, null, null, false, false, null]],
        '/depot' => [[['_route' => 'app_depot', '_controller' => 'App\\Controller\\DepotController::index'], null, null, null, false, false, null]],
        '/api/depots' => [
            [['_route' => 'app_create_depot', '_controller' => 'App\\Controller\\DepotController::createDepot'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_get_all_depot', '_controller' => 'App\\Controller\\DepotController::getAllDepot'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/depots/user' => [[['_route' => 'app_get_all_depot_user', '_controller' => 'App\\Controller\\DepotController::getAllDepotUser'], null, ['POST' => 0], null, false, false, null]],
        '/api/entreprises' => [
            [['_route' => 'app_create_entreprise', '_controller' => 'App\\Controller\\EntrepriseController::create'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_get_all_entreprise', '_controller' => 'App\\Controller\\EntrepriseController::getAllEntreprises'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/upload_file' => [[['_route' => 'upload_file', '_controller' => 'App\\Controller\\EntrepriseController::upload_file'], null, ['POST' => 0], null, false, false, null]],
        '/api/multiple_upload_file' => [[['_route' => 'upload_multiple_file', '_controller' => 'App\\Controller\\EntrepriseController::multiple_upload_file'], null, ['POST' => 0], null, false, false, null]],
        '/notification' => [[['_route' => 'app_notification', '_controller' => 'App\\Controller\\NotificationController::index'], null, null, null, false, false, null]],
        '/api/notification' => [[['_route' => 'app_create_notification', '_controller' => 'App\\Controller\\NotificationController::create'], null, ['POST' => 0], null, false, false, null]],
        '/api/notifications' => [[['_route' => 'app_get_all_notification', '_controller' => 'App\\Controller\\NotificationController::getAllNotifications'], null, ['GET' => 0], null, false, false, null]],
        '/product' => [[['_route' => 'app_product', '_controller' => 'App\\Controller\\ProductController::index'], null, null, null, false, false, null]],
        '/api/products' => [
            [['_route' => 'app_create_product', '_controller' => 'App\\Controller\\ProductController::createProduct'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_get_all_product', '_controller' => 'App\\Controller\\ProductController::getAllProducts'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/productsWithStock' => [[['_route' => 'app_get_all_product_with_stock', '_controller' => 'App\\Controller\\ProductController::getAllProductsWithStock'], null, ['GET' => 0], null, false, false, null]],
        '/user' => [[['_route' => 'app_user', '_controller' => 'App\\Controller\\UserController::index'], null, null, null, false, false, null]],
        '/api/users' => [
            [['_route' => 'app_create_user', '_controller' => 'App\\Controller\\UserController::createUser'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_get_all_user', '_controller' => 'App\\Controller\\UserController::getAllUsers'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/admins' => [
            [['_route' => 'app_create_admin', '_controller' => 'App\\Controller\\UserController::createAdmin'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_get_all_admin', '_controller' => 'App\\Controller\\UserController::getAllAdmins'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/login_check' => [[['_route' => 'api_login_check'], null, null, null, false, false, null]],
        '/api/doc' => [[['_route' => 'app.swagger_ui', '_controller' => 'nelmio_api_doc.controller.swagger_ui'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api(?'
                    .'|/(?'
                        .'|attributs/([^/]++)(?'
                            .'|(*:39)'
                        .')'
                        .'|c(?'
                            .'|on(?'
                                .'|firm/email/([^/]++)(*:75)'
                                .'|tacts/(?'
                                    .'|([^/]++)(?'
                                        .'|(*:102)'
                                    .')'
                                    .'|delete\\-multiple(*:127)'
                                .')'
                            .')'
                            .'|ategories/([^/]++)(?'
                                .'|(*:158)'
                            .')'
                        .')'
                        .'|biography/([^/]++)(?'
                            .'|(*:189)'
                        .')'
                        .'|depots/([^/]++)(?'
                            .'|(*:216)'
                        .')'
                        .'|entreprises/(?'
                            .'|edit/([^/]++)(*:253)'
                            .'|([^/]++)(?'
                                .'|(*:272)'
                            .')'
                        .')'
                        .'|products/(?'
                            .'|status/([^/]++)(*:309)'
                            .'|([^/]++)(?'
                                .'|(*:328)'
                            .')'
                        .')'
                        .'|users/(?'
                            .'|([^/]++)(?'
                                .'|(*:358)'
                            .')'
                            .'|email(*:372)'
                            .'|product(*:387)'
                            .'|([^/]++)(*:403)'
                            .'|notifier/([^/]++)(*:428)'
                        .')'
                        .'|\\.well\\-known/genid/([^/]++)(*:465)'
                    .')'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:502)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:533)'
                        .'|contexts/([^.]+)(?:\\.(jsonld))?(*:572)'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:610)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        39 => [
            [['_route' => 'app_edit_attribut', '_controller' => 'App\\Controller\\AttributController::editAttributs'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'app_get_attribut', '_controller' => 'App\\Controller\\AttributController::getAttribut'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_delete_attribut', '_controller' => 'App\\Controller\\AttributController::deleteAttribut'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        75 => [[['_route' => 'confirm_email', '_controller' => 'App\\Controller\\AuthController::confirmEmail'], ['token'], null, null, false, true, null]],
        102 => [
            [['_route' => 'app_edit_contact', '_controller' => 'App\\Controller\\ContactController::editContacts'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'app_get_contact', '_controller' => 'App\\Controller\\ContactController::getContact'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_delete_contact', '_controller' => 'App\\Controller\\ContactController::deleteContact'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        127 => [[['_route' => 'app_delete_multiple_contact', '_controller' => 'App\\Controller\\ContactController::deleteMultipleContacts'], [], null, null, false, false, null]],
        158 => [
            [['_route' => 'app_edit_category', '_controller' => 'App\\Controller\\CategoryController::editCategories'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'app_get_category', '_controller' => 'App\\Controller\\CategoryController::getCategory'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_delete_category', '_controller' => 'App\\Controller\\CategoryController::deleteCategory'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        189 => [
            [['_route' => 'app_edit_biography', '_controller' => 'App\\Controller\\BiographyController::editBiography'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'app_get_biography', '_controller' => 'App\\Controller\\BiographyController::getBiography'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_delete_biography', '_controller' => 'App\\Controller\\BiographyController::deleteBiography'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        216 => [
            [['_route' => 'app_edit_depot', '_controller' => 'App\\Controller\\DepotController::editDepots'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'app_get_depot', '_controller' => 'App\\Controller\\DepotController::getDepot'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_delete_depot', '_controller' => 'App\\Controller\\DepotController::deleteDepot'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        253 => [[['_route' => 'app_update_entreprise', '_controller' => 'App\\Controller\\EntrepriseController::update'], ['id'], ['POST' => 0], null, false, true, null]],
        272 => [
            [['_route' => 'app_edit_entreprise', '_controller' => 'App\\Controller\\EntrepriseController::editEntreprises'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'app_get_entreprise', '_controller' => 'App\\Controller\\EntrepriseController::getEntreprise'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_delete_entreprise', '_controller' => 'App\\Controller\\EntrepriseController::deleteEntreprise'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        309 => [[['_route' => 'app_edit_status_product', '_controller' => 'App\\Controller\\ProductController::editProductsStatus'], ['id'], ['PUT' => 0], null, false, true, null]],
        328 => [
            [['_route' => 'app_edit_product', '_controller' => 'App\\Controller\\ProductController::editProducts'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'app_get_product', '_controller' => 'App\\Controller\\ProductController::getProduct'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_delete_product', '_controller' => 'App\\Controller\\ProductController::deleteProduct'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        358 => [
            [['_route' => 'app_edit_user', '_controller' => 'App\\Controller\\UserController::editUsers'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'app_get_user', '_controller' => 'App\\Controller\\UserController::getUserById'], ['id'], ['GET' => 0], null, false, true, null],
        ],
        372 => [[['_route' => 'app_get_user_email', '_controller' => 'App\\Controller\\UserController::getUserByEmail'], [], ['POST' => 0], null, false, false, null]],
        387 => [[['_route' => 'app_get_user_product', '_controller' => 'App\\Controller\\UserController::getProductByUser'], [], ['POST' => 0], null, false, false, null]],
        403 => [[['_route' => 'app_delete_user', '_controller' => 'App\\Controller\\UserController::deleteUser'], ['id'], ['DELETE' => 0], null, false, true, null]],
        428 => [[['_route' => 'app_notifier_user', '_controller' => 'App\\Controller\\UserController::notifierUser'], ['id'], ['POST' => 0], null, false, true, null]],
        465 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], null, null, false, true, null]],
        502 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        533 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        572 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        610 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
