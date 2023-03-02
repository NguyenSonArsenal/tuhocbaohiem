<?php

use Illuminate\Support\Facades\Auth;

function getConfig($key, $default = '')
{
    return config('config.' . $key, $default);
}

function getConstant($key, $default = '')
{
    return config('constant.' . $key, $default);
}

function backendRoute($name, $params = [])
{
    return route( 'be.' . $name, $params);
}

function getSTTBackend($entities, $index)
{
    return getConstant('BACKEND_PAGINATE', 20) * ($entities->currentPage() -1) + 1 + $index;
}

function apiGuard()
{
    return Auth::guard('api');
}

// Common

// End Common

// Auth
function isBeLogin()
{
    return beGuard()->check();
}

function beGuard()
{
    return Auth::guard('be');
}

function beRoute($routeName, $params = [])
{
    return route('be.' . $routeName, $params);
}
// End Auth

/* Redirect */
function backSystemError($msg = '')
{
    $msg = empty($msg) ? t('system_error') : $msg;
    return redirect()->back()->with('notification_error', $msg);
}

function backSystemSuccess($msg = '')
{
    $msg = empty($msg) ? t('success') : $msg;
    return redirect()->back()->with('notification_success', $msg);
}

function backSuccess($msg = '')
{
    $msg = empty($msg) ? t('success') : $msg;
    return redirect()->back()->with('notification_success', $msg);
}

function backRouteSuccess($routeName = '', $msg = '', $params = [])
{
    $msg = empty($msg) ? t('success') : $msg;
    return redirect()->route($routeName, $params)->with('notification_success', $msg);
}

function backRouteError($routeName = '', $msg = '', $params = [])
{
    $msg = empty($msg) ? t('success') : $msg;
    return redirect()->route($routeName, $params)->with('notification_error', $msg);
}
/* End redirect */

function extractNameFromEmail($email)
{
    $parts = explode("@", $email);
    $username = data_get($parts, 0);
    return $username;
}

function t($key, $default = '')
{
    return empty(trans('messages.' . $key)) ? $default : trans('messages.' . $key);
}

function getSiteName()
{
    return getConfig('system.SITE_NAME', 'Laravel');
}

function oldInput($old, $db)
{
    return empty($old) ? $db : $old;
}
