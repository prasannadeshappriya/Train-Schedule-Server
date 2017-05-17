<?php
/**
 * Created by PhpStorm.
 * User: prasanna
 * Date: 5/17/17
 * Time: 11:19 AM
 */
namespace App\Services\Html;

class HtmlServiceProvider extends \Collective\Html\HtmlServiceProvider
{
    protected function registerFormBuilder()
    {
        $this->app->singleton('form', function ($app) {
            $form = new FormBuilder($app['html'], $app['url'], $app['view'], $app['session.store']->token());

            return $form->setSessionStore($app['session.store']);
        });
    }
}