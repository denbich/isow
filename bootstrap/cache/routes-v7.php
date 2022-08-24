<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/_debugbar/open' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.openhandler',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets/stylesheets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.css',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets/javascript' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.js',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/biscolab-recaptcha/validate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VJK6AGANp8XRzyCK',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3FcrG6iUYyLeh3bM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::I9hadZ6AhxSEEscM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pl' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'language.pl',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/en' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'language.en',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/uk' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'language.uk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/regulations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'regulations',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/codex' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'codex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/privacy-policy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'privacy_policy',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/help-ukraine' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'help_ukraine',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login-auth' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'loginauth',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/2fa' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'twofa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'twofa_send',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/2fa_validate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'twofa_validate',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/new-agreement' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'new.agreement',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mI9w4v5gqNcXo452',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/google/redirect' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'google.redirect',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/google/callback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::K3M9Srj7BkOto81n',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/google/disconect' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.google.disconect',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/facebook/redirect' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'facebook.redirect',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/facebook/callback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::d4LNLsZVJuFKomDt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/facebook/disconect' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.facebook.disconect',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UJMRjniKK9UYFod4',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0JGj0vX1FTuzRO5L',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/confirm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EHUiVm2M7GONPwvW',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/chart' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.chart',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tJvHBlYDs71pSIpz',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/change-photo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.change.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/calendar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.calendar',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/load-events' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.loadevents',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.info',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/maps' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.maps',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/send-mail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.mail',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6GyBFO2TjKTsoeF1',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/mail-preview' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.mail.preview',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/update-volunteer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.update.v',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Rp0UhRre9GzxsQTd',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.settings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/settings/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.settings.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/settings/password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.settings.password',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/cloud' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.cloud.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/cloud/create-folder' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.cloud.create-folder',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/cloud/upload-file' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.cloud.upload-file',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/chat' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.chat',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/chat/getallmessages' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Jmij3E6iSd79Owuu',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/chat/getmessages' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wmR4X5g41Mo9bLRY',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/chat/getmessage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::53BPxp3HuYFdnhNi',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/chat/sendmessage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XEqCZ34PBbN0aV7A',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/volunteer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.v.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/volunteer/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.v.exportlist',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/volunteer/reset-points' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.v.reset_points',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/volunteer/block' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.v.volunteer.block',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/volunteer/unblock' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.v.volunteer.unblock',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/volunteer/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.v.search',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/volunteer/active' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.v.active',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::04D5YA6eB3iat53V',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/volunteer/dactive' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.v.dactive',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/volunteer/other' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.v.other',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/forms/archive' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.archive',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/forms/create-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.createcategory',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/forms/remove-folunteer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.removevolunteer',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/form/category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.formcategory.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'c.formcategory.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/form/category/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.formcategory.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/forms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/forms/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/prizes/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prize.search',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/prizes/create-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prize.createcategory',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/prizes/create-sponsor' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prize.createsponsor',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/prizes/orders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prize.orders',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/prizes/orders/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prize.order.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/prizes/category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prizecategory.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'c.prizecategory.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/prizes/category/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prizecategory.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/prizes/sponsor/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.sponsor.search',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/sponsor' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.sponsor.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'c.sponsor.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/sponsor/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.sponsor.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/prizes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prize.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'c.prize.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/prizes/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prize.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/posts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.post.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'c.post.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coordinator/posts/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.post.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sbtw9F6tRd8LcIHT',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/change-photo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.change.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/calendar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.calendar',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/load-events' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.loadevents',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.info',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/id' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.id',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/maps' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.maps',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.search',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.settings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/settings/agreement' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.settings.agreement',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/settings/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.settings.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/settings/password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.settings.password',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/settings/send-email-code' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.settings.sendemailcode',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/settings/email2fa' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.settings.email2fa',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/settings/email2fa-change' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.settings.email2fa_change',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/settings/google2fa' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.settings.google2fa',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/settings/google2fa-change' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.settings.google2fa_change',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/settings/notifications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.settings.save_notifications',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/settings/new-agreement' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.settings.newagreement',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/chat' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.chat',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/posts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.post.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/forms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.form.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/forms/archive' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.form.archive',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/forms/certificate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.form.certificate',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/prizes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.prize.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/prizes/orders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.prize.orders',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/_debugbar/c(?|lockwork/([^/]++)(*:39)|ache/([^/]++)(?:/([^/]++))?(*:73))|/language/([^/]++)(*:99)|/volunteer(?|\\-id/([^/]++)(*:132)|/(?|p(?|osts/([^/]++)(*:161)|rizes/(?|id/([^/]++)(*:189)|get\\-prize/([^/]++)(*:216)|order/(?|([^/]++)(*:241)|confirmation/([^/]++)(*:270))))|forms/(?|id/([^/]++)(?|(*:304))|delete/([^/]++)(*:328)|feedback/([^/]++)(*:353))))|/password/reset/([^/]++)(*:388)|/coordinator/(?|volunteer/(?|id/([^/]++)(?|(*:439)|/edit(?|(*:455)))|points/([^/]++)(*:480)|agreement/([^/]++)(*:506))|form(?|s/(?|list/([^/]++)(*:540)|generate\\-id/([^/]++)(*:569)|r(?|aport/([^/]++)(*:595)|eject/([^/]++)(*:617))|s(?|t(?|op\\-sign/([^/]++)(*:651)|art\\-sign/([^/]++)(*:677))|ign/([^/]++)(?|(*:701)))|p(?|ositions/([^/]++)(?|(*:735))|resence/([^/]++)(?|(*:763)))|view\\-presence/([^/]++)(*:796)|add\\-volunteer/([^/]++)(*:827)|([^/]++)(?|(*:846)|/edit(*:859)|(*:867)))|/category/([^/]++)(?|(*:898)|/edit(*:911)|(*:919)))|p(?|rizes/(?|update\\-quantity/([^/]++)(*:967)|orders/(?|id/([^/]++)(?|(*:999))|confirmation/([^/]++)(*:1029)|status/([^/]++)(*:1053))|category/([^/]++)(?|(*:1083)|/edit(*:1097)|(*:1106))|([^/]++)(?|(*:1127)|/edit(*:1141)|(*:1150)))|osts/([^/]++)(?|(*:1177)|/edit(*:1191)|(*:1200)))|sponsor/([^/]++)(?|(*:1230)|/edit(*:1244)|(*:1253))))/?$}sDu',
    ),
    3 => 
    array (
      39 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.clockwork',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      73 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.cache.delete',
            'tags' => NULL,
          ),
          1 => 
          array (
            0 => 'key',
            1 => 'tags',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      99 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'language',
          ),
          1 => 
          array (
            0 => 'locale',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      132 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'volunteer.id',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      161 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.post',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      189 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.prize',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      216 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.prize.get',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      241 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.prize.order',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      270 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.prize.order.confirmation',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      304 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.form.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VEqlWJ6WlOAdqicd',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      328 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.form.unsign',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      353 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'v.form.feedback',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      388 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      439 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.v.volunteer',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      455 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.v.volunteer.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VNyTA5k8BOcHSu2O',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      480 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.v.volunteer.points',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      506 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.v.agreement',
          ),
          1 => 
          array (
            0 => 'volunteer',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      540 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.volunteers',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      569 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.id',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      595 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.raport',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      617 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.reject',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      651 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.stopsign',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      677 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.startsign',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      701 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.sign',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::N7NfL8zM6vr7W8On',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      735 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.positions',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VI6z6318s3RPCrQ1',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      763 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.presence',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vmADdcceKmShrpfF',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      796 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.viewpresence',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      827 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.addvolunteer',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      846 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.show',
          ),
          1 => 
          array (
            0 => 'form',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      859 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.edit',
          ),
          1 => 
          array (
            0 => 'form',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      867 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.update',
          ),
          1 => 
          array (
            0 => 'form',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'c.form.destroy',
          ),
          1 => 
          array (
            0 => 'form',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      898 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.formcategory.show',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      911 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.formcategory.edit',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      919 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.formcategory.update',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'c.formcategory.destroy',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      967 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prize.updatequantity',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      999 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prize.order',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CSs0K1SHXqMbsJPi',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1029 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prize.order.confirmation',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1053 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prize.order.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1083 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prizecategory.show',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1097 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prizecategory.edit',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1106 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prizecategory.update',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'c.prizecategory.destroy',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1127 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prize.show',
          ),
          1 => 
          array (
            0 => 'prize',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1141 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prize.edit',
          ),
          1 => 
          array (
            0 => 'prize',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1150 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.prize.update',
          ),
          1 => 
          array (
            0 => 'prize',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'c.prize.destroy',
          ),
          1 => 
          array (
            0 => 'prize',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1177 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.post.show',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1191 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.post.edit',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1200 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.post.update',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'c.post.destroy',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1230 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.sponsor.show',
          ),
          1 => 
          array (
            0 => 'sponsor',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1244 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.sponsor.edit',
          ),
          1 => 
          array (
            0 => 'sponsor',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1253 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'c.sponsor.update',
          ),
          1 => 
          array (
            0 => 'sponsor',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'c.sponsor.destroy',
          ),
          1 => 
          array (
            0 => 'sponsor',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'debugbar.openhandler' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/open',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'as' => 'debugbar.openhandler',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.clockwork' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/clockwork/{id}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'as' => 'debugbar.clockwork',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.assets.css' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/stylesheets',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'as' => 'debugbar.assets.css',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.assets.js' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/javascript',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'as' => 'debugbar.assets.js',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.cache.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '_debugbar/cache/{key}/{tags?}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'as' => 'debugbar.cache.delete',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VJK6AGANp8XRzyCK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'biscolab-recaptcha/validate',
      'action' => 
      array (
        'uses' => 'Biscolab\\ReCaptcha\\Controllers\\ReCaptchaController@validateV3',
        'controller' => 'Biscolab\\ReCaptcha\\Controllers\\ReCaptchaController@validateV3',
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::VJK6AGANp8XRzyCK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3FcrG6iUYyLeh3bM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::3FcrG6iUYyLeh3bM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.updateConfig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/update-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController',
        'as' => 'ignition.updateConfig',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::I9hadZ6AhxSEEscM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000001027dd540000000031c4bd95";}";s:4:"hash";s:44:"L/ZYSJKL9YbfoynGIvvDb4O1exLdSZHGRuRHk8yVmtk=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::I9hadZ6AhxSEEscM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'language' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'language/{locale}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:405:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:186:"function($locale) { if (! \\in_array($locale, [\'pl\', \'en\', \'uk\'])) { \\abort(404); } \\Illuminate\\Support\\Facades\\App::setLocale($locale); \\session([\'locale\' => $locale]); return \\back(); }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000001027dd6e0000000031c4bd95";}";s:4:"hash";s:44:"w8J4HGpz+mgZ1wbYYqPOncybQbEjL69cQDc0z6KgE3U=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'language',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'language.pl' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pl',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:329:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:110:"function() { \\session([\'locale\' => \'pl\']); \\Illuminate\\Support\\Facades\\App::setLocale(\'pl\'); return \\back(); }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000001027dd6d0000000031c4bd95";}";s:4:"hash";s:44:"f4uuGzM3wa3bn52xnptMFDU7bdztkag0pbmH/T4+Vu4=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'language.pl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'language.en' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'en',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:329:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:110:"function() { \\session([\'locale\' => \'en\']); \\Illuminate\\Support\\Facades\\App::setLocale(\'en\'); return \\back(); }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000001027dd6b0000000031c4bd95";}";s:4:"hash";s:44:"Lm37bP6y6nb6UlntdVWzqYRmjBOKfz+W8bNyj9Duu84=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'language.en',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'language.uk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'uk',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:329:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:110:"function() { \\session([\'locale\' => \'uk\']); \\Illuminate\\Support\\Facades\\App::setLocale(\'uk\'); return \\back(); }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000001027dd690000000031c4bd95";}";s:4:"hash";s:44:"8vmWpc2KSzBPN8ft+fQBnG7qbi4bdQso8c0bAeEhVbs=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'language.uk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => '\\Illuminate\\Routing\\ViewController@__invoke',
        'controller' => '\\Illuminate\\Routing\\ViewController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'view' => 'home.home',
        'data' => 
        array (
        ),
        'status' => 200,
        'headers' => 
        array (
        ),
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'regulations' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'regulations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => '\\Illuminate\\Routing\\ViewController@__invoke',
        'controller' => '\\Illuminate\\Routing\\ViewController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'regulations',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'view' => 'home.regulations',
        'data' => 
        array (
        ),
        'status' => 200,
        'headers' => 
        array (
        ),
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'codex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'codex',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => '\\Illuminate\\Routing\\ViewController@__invoke',
        'controller' => '\\Illuminate\\Routing\\ViewController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'codex',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'view' => 'home.codex',
        'data' => 
        array (
        ),
        'status' => 200,
        'headers' => 
        array (
        ),
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'privacy_policy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'privacy-policy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => '\\Illuminate\\Routing\\ViewController@__invoke',
        'controller' => '\\Illuminate\\Routing\\ViewController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'privacy_policy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'view' => 'home.privacy_policy',
        'data' => 
        array (
        ),
        'status' => 200,
        'headers' => 
        array (
        ),
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'help_ukraine' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'help-ukraine',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => '\\Illuminate\\Routing\\ViewController@__invoke',
        'controller' => '\\Illuminate\\Routing\\ViewController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'help_ukraine',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'view' => 'home.ukraine',
        'data' => 
        array (
        ),
        'status' => 200,
        'headers' => 
        array (
        ),
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'volunteer.id' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer-id/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@volunteer',
        'controller' => 'App\\Http\\Controllers\\HomeController@volunteer',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'volunteer.id',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'loginauth' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login-auth',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@loginauth',
        'controller' => 'App\\Http\\Controllers\\HomeController@loginauth',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'loginauth',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'twofa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '2fa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@twofa',
        'controller' => 'App\\Http\\Controllers\\HomeController@twofa',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'twofa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'twofa_send' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '2fa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@twofa_send',
        'controller' => 'App\\Http\\Controllers\\HomeController@twofa_send',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'twofa_send',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'twofa_validate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '2fa_validate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@twofa_validate',
        'controller' => 'App\\Http\\Controllers\\HomeController@twofa_validate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'twofa_validate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'new.agreement' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'new-agreement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'agreementcheck',
        ),
        'uses' => '\\Illuminate\\Routing\\ViewController@__invoke',
        'controller' => '\\Illuminate\\Routing\\ViewController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'new.agreement',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'view' => 'auth.agreement',
        'data' => 
        array (
        ),
        'status' => 200,
        'headers' => 
        array (
        ),
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mI9w4v5gqNcXo452' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'new-agreement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'agreementcheck',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@update_agreement',
        'controller' => 'App\\Http\\Controllers\\HomeController@update_agreement',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::mI9w4v5gqNcXo452',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'google.redirect' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'google/redirect',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@googleredirect',
        'controller' => 'App\\Http\\Controllers\\HomeController@googleredirect',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'google.redirect',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::K3M9Srj7BkOto81n' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'google/callback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@googlecallback',
        'controller' => 'App\\Http\\Controllers\\HomeController@googlecallback',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::K3M9Srj7BkOto81n',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.google.disconect' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'google/disconect',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@googledisconect',
        'controller' => 'App\\Http\\Controllers\\HomeController@googledisconect',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'v.google.disconect',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'facebook.redirect' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'facebook/redirect',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@facebookredirect',
        'controller' => 'App\\Http\\Controllers\\HomeController@facebookredirect',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'facebook.redirect',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::d4LNLsZVJuFKomDt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'facebook/callback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@facebookcallback',
        'controller' => 'App\\Http\\Controllers\\HomeController@facebookcallback',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::d4LNLsZVJuFKomDt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.facebook.disconect' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'facebook/disconect',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@facebookdisconect',
        'controller' => 'App\\Http\\Controllers\\HomeController@facebookdisconect',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'v.facebook.disconect',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UJMRjniKK9UYFod4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::UJMRjniKK9UYFod4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0JGj0vX1FTuzRO5L' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::0JGj0vX1FTuzRO5L',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EHUiVm2M7GONPwvW' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::EHUiVm2M7GONPwvW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CHomeController@dashboard',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CHomeController@dashboard',
        'namespace' => NULL,
        'prefix' => '/coordinator',
        'where' => 
        array (
        ),
        'as' => 'c.dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.chart' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/chart',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CHomeController@chart',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CHomeController@chart',
        'namespace' => NULL,
        'prefix' => '/coordinator',
        'where' => 
        array (
        ),
        'as' => 'c.chart',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CHomeController@profile',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CHomeController@profile',
        'namespace' => NULL,
        'prefix' => '/coordinator',
        'where' => 
        array (
        ),
        'as' => 'c.profile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tJvHBlYDs71pSIpz' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CHomeController@update_profile',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CHomeController@update_profile',
        'namespace' => NULL,
        'prefix' => '/coordinator',
        'where' => 
        array (
        ),
        'as' => 'generated::tJvHBlYDs71pSIpz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.change.profile' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/change-photo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CHomeController@change_photo',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CHomeController@change_photo',
        'namespace' => NULL,
        'prefix' => '/coordinator',
        'where' => 
        array (
        ),
        'as' => 'c.change.profile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.calendar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/calendar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CHomeController@calendar',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CHomeController@calendar',
        'namespace' => NULL,
        'prefix' => '/coordinator',
        'where' => 
        array (
        ),
        'as' => 'c.calendar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.loadevents' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/load-events',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CHomeController@load_events',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CHomeController@load_events',
        'namespace' => NULL,
        'prefix' => '/coordinator',
        'where' => 
        array (
        ),
        'as' => 'c.loadevents',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.info' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => '\\Illuminate\\Routing\\ViewController@__invoke',
        'controller' => '\\Illuminate\\Routing\\ViewController',
        'namespace' => NULL,
        'prefix' => '/coordinator',
        'where' => 
        array (
        ),
        'as' => 'c.info',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'view' => 'coordinator.info',
        'data' => 
        array (
        ),
        'status' => 200,
        'headers' => 
        array (
        ),
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.maps' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/maps',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => '\\Illuminate\\Routing\\ViewController@__invoke',
        'controller' => '\\Illuminate\\Routing\\ViewController',
        'namespace' => NULL,
        'prefix' => '/coordinator',
        'where' => 
        array (
        ),
        'as' => 'c.maps',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'view' => 'coordinator.maps',
        'data' => 
        array (
        ),
        'status' => 200,
        'headers' => 
        array (
        ),
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.mail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/send-mail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CHomeController@sendmail',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CHomeController@sendmail',
        'namespace' => NULL,
        'prefix' => '/coordinator',
        'where' => 
        array (
        ),
        'as' => 'c.mail',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6GyBFO2TjKTsoeF1' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/send-mail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CHomeController@send_mail',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CHomeController@send_mail',
        'namespace' => NULL,
        'prefix' => '/coordinator',
        'where' => 
        array (
        ),
        'as' => 'generated::6GyBFO2TjKTsoeF1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.mail.preview' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/mail-preview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CHomeController@mail_preview',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CHomeController@mail_preview',
        'namespace' => NULL,
        'prefix' => '/coordinator',
        'where' => 
        array (
        ),
        'as' => 'c.mail.preview',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.update.v' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/update-volunteer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CHomeController@update_v',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CHomeController@update_v',
        'namespace' => NULL,
        'prefix' => '/coordinator',
        'where' => 
        array (
        ),
        'as' => 'c.update.v',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Rp0UhRre9GzxsQTd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/update-volunteer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CHomeController@update_volunteer',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CHomeController@update_volunteer',
        'namespace' => NULL,
        'prefix' => '/coordinator',
        'where' => 
        array (
        ),
        'as' => 'generated::Rp0UhRre9GzxsQTd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.settings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CSettingsController@index',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CSettingsController@index',
        'namespace' => NULL,
        'prefix' => 'coordinator/settings',
        'where' => 
        array (
        ),
        'as' => 'c.settings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.settings.profile' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/settings/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CSettingsController@profile',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CSettingsController@profile',
        'namespace' => NULL,
        'prefix' => 'coordinator/settings',
        'where' => 
        array (
        ),
        'as' => 'c.settings.profile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.settings.password' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/settings/password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CSettingsController@password',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CSettingsController@password',
        'namespace' => NULL,
        'prefix' => 'coordinator/settings',
        'where' => 
        array (
        ),
        'as' => 'c.settings.password',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.cloud.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/cloud',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => '\\Illuminate\\Routing\\ViewController@__invoke',
        'controller' => '\\Illuminate\\Routing\\ViewController',
        'namespace' => NULL,
        'prefix' => 'coordinator/cloud',
        'where' => 
        array (
        ),
        'as' => 'c.cloud.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'view' => 'coordinator.cloud.index',
        'data' => 
        array (
        ),
        'status' => 200,
        'headers' => 
        array (
        ),
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.cloud.create-folder' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/cloud/create-folder',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CCloudController@create_folder',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CCloudController@create_folder',
        'namespace' => NULL,
        'prefix' => 'coordinator/cloud',
        'where' => 
        array (
        ),
        'as' => 'c.cloud.create-folder',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.cloud.upload-file' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/cloud/upload-file',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CCloudController@upload_file',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CCloudController@upload_file',
        'namespace' => NULL,
        'prefix' => 'coordinator/cloud',
        'where' => 
        array (
        ),
        'as' => 'c.cloud.upload-file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.chat' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/chat',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CChatController@chat',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CChatController@chat',
        'namespace' => NULL,
        'prefix' => 'coordinator/chat',
        'where' => 
        array (
        ),
        'as' => 'c.chat',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Jmij3E6iSd79Owuu' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/chat/getallmessages',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CChatController@getallmessages',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CChatController@getallmessages',
        'namespace' => NULL,
        'prefix' => 'coordinator/chat',
        'where' => 
        array (
        ),
        'as' => 'generated::Jmij3E6iSd79Owuu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wmR4X5g41Mo9bLRY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/chat/getmessages',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CChatController@getmessages',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CChatController@getmessages',
        'namespace' => NULL,
        'prefix' => 'coordinator/chat',
        'where' => 
        array (
        ),
        'as' => 'generated::wmR4X5g41Mo9bLRY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::53BPxp3HuYFdnhNi' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/chat/getmessage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CChatController@getmessage',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CChatController@getmessage',
        'namespace' => NULL,
        'prefix' => 'coordinator/chat',
        'where' => 
        array (
        ),
        'as' => 'generated::53BPxp3HuYFdnhNi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XEqCZ34PBbN0aV7A' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/chat/sendmessage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CChatController@sendmessage',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CChatController@sendmessage',
        'namespace' => NULL,
        'prefix' => 'coordinator/chat',
        'where' => 
        array (
        ),
        'as' => 'generated::XEqCZ34PBbN0aV7A',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.v.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/volunteer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@index',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@index',
        'namespace' => NULL,
        'prefix' => 'coordinator/volunteer',
        'where' => 
        array (
        ),
        'as' => 'c.v.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.v.volunteer' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/volunteer/id/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@show',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@show',
        'namespace' => NULL,
        'prefix' => 'coordinator/volunteer',
        'where' => 
        array (
        ),
        'as' => 'c.v.volunteer',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.v.volunteer.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/volunteer/id/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@edit',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@edit',
        'namespace' => NULL,
        'prefix' => 'coordinator/volunteer',
        'where' => 
        array (
        ),
        'as' => 'c.v.volunteer.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VNyTA5k8BOcHSu2O' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/volunteer/id/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@update',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@update',
        'namespace' => NULL,
        'prefix' => 'coordinator/volunteer',
        'where' => 
        array (
        ),
        'as' => 'generated::VNyTA5k8BOcHSu2O',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.v.volunteer.points' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/volunteer/points/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@points',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@points',
        'namespace' => NULL,
        'prefix' => 'coordinator/volunteer',
        'where' => 
        array (
        ),
        'as' => 'c.v.volunteer.points',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.v.exportlist' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/volunteer/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@export',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@export',
        'namespace' => NULL,
        'prefix' => 'coordinator/volunteer',
        'where' => 
        array (
        ),
        'as' => 'c.v.exportlist',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.v.reset_points' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/volunteer/reset-points',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@reset_points',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@reset_points',
        'namespace' => NULL,
        'prefix' => 'coordinator/volunteer',
        'where' => 
        array (
        ),
        'as' => 'c.v.reset_points',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.v.volunteer.block' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/volunteer/block',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@block',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@block',
        'namespace' => NULL,
        'prefix' => 'coordinator/volunteer',
        'where' => 
        array (
        ),
        'as' => 'c.v.volunteer.block',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.v.volunteer.unblock' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/volunteer/unblock',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@unblock',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@unblock',
        'namespace' => NULL,
        'prefix' => 'coordinator/volunteer',
        'where' => 
        array (
        ),
        'as' => 'c.v.volunteer.unblock',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.v.search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/volunteer/search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@search',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@search',
        'namespace' => NULL,
        'prefix' => 'coordinator/volunteer',
        'where' => 
        array (
        ),
        'as' => 'c.v.search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.v.active' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/volunteer/active',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@active',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@active',
        'namespace' => NULL,
        'prefix' => 'coordinator/volunteer',
        'where' => 
        array (
        ),
        'as' => 'c.v.active',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::04D5YA6eB3iat53V' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/volunteer/active',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@activation',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@activation',
        'namespace' => NULL,
        'prefix' => 'coordinator/volunteer',
        'where' => 
        array (
        ),
        'as' => 'generated::04D5YA6eB3iat53V',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.v.dactive' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/volunteer/dactive',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@dactivation',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@dactivation',
        'namespace' => NULL,
        'prefix' => 'coordinator/volunteer',
        'where' => 
        array (
        ),
        'as' => 'c.v.dactive',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.v.agreement' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/volunteer/agreement/{volunteer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@agreement',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@agreement',
        'namespace' => NULL,
        'prefix' => 'coordinator/volunteer',
        'where' => 
        array (
        ),
        'as' => 'c.v.agreement',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.v.other' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/volunteer/other',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@other',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CVolunteersController@other',
        'namespace' => NULL,
        'prefix' => 'coordinator/volunteer',
        'where' => 
        array (
        ),
        'as' => 'c.v.other',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.archive' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/forms/archive',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@archive',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@archive',
        'namespace' => NULL,
        'prefix' => 'coordinator/forms',
        'where' => 
        array (
        ),
        'as' => 'c.form.archive',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.volunteers' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/forms/list/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@generate_list',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@generate_list',
        'namespace' => NULL,
        'prefix' => 'coordinator/forms',
        'where' => 
        array (
        ),
        'as' => 'c.form.volunteers',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.id' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/forms/generate-id/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@generate_id',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@generate_id',
        'namespace' => NULL,
        'prefix' => 'coordinator/forms',
        'where' => 
        array (
        ),
        'as' => 'c.form.id',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.raport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/forms/raport/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@generate_raport',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@generate_raport',
        'namespace' => NULL,
        'prefix' => 'coordinator/forms',
        'where' => 
        array (
        ),
        'as' => 'c.form.raport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.createcategory' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/forms/create-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@create_category',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@create_category',
        'namespace' => NULL,
        'prefix' => 'coordinator/forms',
        'where' => 
        array (
        ),
        'as' => 'c.form.createcategory',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.stopsign' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/forms/stop-sign/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@stop_sign',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@stop_sign',
        'namespace' => NULL,
        'prefix' => 'coordinator/forms',
        'where' => 
        array (
        ),
        'as' => 'c.form.stopsign',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.startsign' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/forms/start-sign/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@start_sign',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@start_sign',
        'namespace' => NULL,
        'prefix' => 'coordinator/forms',
        'where' => 
        array (
        ),
        'as' => 'c.form.startsign',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.positions' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/forms/positions/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@positions',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@positions',
        'namespace' => NULL,
        'prefix' => 'coordinator/forms',
        'where' => 
        array (
        ),
        'as' => 'c.form.positions',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VI6z6318s3RPCrQ1' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/forms/positions/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@set_positions',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@set_positions',
        'namespace' => NULL,
        'prefix' => 'coordinator/forms',
        'where' => 
        array (
        ),
        'as' => 'generated::VI6z6318s3RPCrQ1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.presence' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/forms/presence/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@presence',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@presence',
        'namespace' => NULL,
        'prefix' => 'coordinator/forms',
        'where' => 
        array (
        ),
        'as' => 'c.form.presence',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vmADdcceKmShrpfF' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/forms/presence/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@save_presence',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@save_presence',
        'namespace' => NULL,
        'prefix' => 'coordinator/forms',
        'where' => 
        array (
        ),
        'as' => 'generated::vmADdcceKmShrpfF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.sign' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/forms/sign/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@sign',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@sign',
        'namespace' => NULL,
        'prefix' => 'coordinator/forms',
        'where' => 
        array (
        ),
        'as' => 'c.form.sign',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::N7NfL8zM6vr7W8On' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/forms/sign/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@save_sign',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@save_sign',
        'namespace' => NULL,
        'prefix' => 'coordinator/forms',
        'where' => 
        array (
        ),
        'as' => 'generated::N7NfL8zM6vr7W8On',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.reject' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/forms/reject/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@reject_sign',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@reject_sign',
        'namespace' => NULL,
        'prefix' => 'coordinator/forms',
        'where' => 
        array (
        ),
        'as' => 'c.form.reject',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.viewpresence' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/forms/view-presence/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@view_presence',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@view_presence',
        'namespace' => NULL,
        'prefix' => 'coordinator/forms',
        'where' => 
        array (
        ),
        'as' => 'c.form.viewpresence',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.addvolunteer' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/forms/add-volunteer/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@add_volunteer',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@add_volunteer',
        'namespace' => NULL,
        'prefix' => 'coordinator/forms',
        'where' => 
        array (
        ),
        'as' => 'c.form.addvolunteer',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.removevolunteer' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/forms/remove-folunteer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@remove_volunteer',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@remove_volunteer',
        'namespace' => NULL,
        'prefix' => 'coordinator/forms',
        'where' => 
        array (
        ),
        'as' => 'c.form.removevolunteer',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.formcategory.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/form/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.formcategory.list',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormCategoryController@index',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormCategoryController@index',
        'namespace' => NULL,
        'prefix' => 'coordinator/form',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.formcategory.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/form/category/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.formcategory.create',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormCategoryController@create',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormCategoryController@create',
        'namespace' => NULL,
        'prefix' => 'coordinator/form',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.formcategory.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/form/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.formcategory.store',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormCategoryController@store',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormCategoryController@store',
        'namespace' => NULL,
        'prefix' => 'coordinator/form',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.formcategory.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/form/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.formcategory.show',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormCategoryController@show',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormCategoryController@show',
        'namespace' => NULL,
        'prefix' => 'coordinator/form',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.formcategory.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/form/category/{category}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.formcategory.edit',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormCategoryController@edit',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormCategoryController@edit',
        'namespace' => NULL,
        'prefix' => 'coordinator/form',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.formcategory.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'coordinator/form/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.formcategory.update',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormCategoryController@update',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormCategoryController@update',
        'namespace' => NULL,
        'prefix' => 'coordinator/form',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.formcategory.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'coordinator/form/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.formcategory.destroy',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormCategoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormCategoryController@destroy',
        'namespace' => NULL,
        'prefix' => 'coordinator/form',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/forms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.form.list',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@index',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@index',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/forms/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.form.create',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@create',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@create',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/forms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.form.store',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@store',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@store',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/forms/{form}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.form.show',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@show',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@show',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/forms/{form}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.form.edit',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@edit',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@edit',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'coordinator/forms/{form}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.form.update',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@update',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@update',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.form.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'coordinator/forms/{form}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.form.destroy',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CFormsController@destroy',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CFormsController@destroy',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prize.search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/prizes/search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@search',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@search',
        'namespace' => NULL,
        'prefix' => 'coordinator/prizes',
        'where' => 
        array (
        ),
        'as' => 'c.prize.search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prize.updatequantity' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/prizes/update-quantity/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@update_quantity',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@update_quantity',
        'namespace' => NULL,
        'prefix' => 'coordinator/prizes',
        'where' => 
        array (
        ),
        'as' => 'c.prize.updatequantity',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prize.createcategory' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/prizes/create-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@create_category',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@create_category',
        'namespace' => NULL,
        'prefix' => 'coordinator/prizes',
        'where' => 
        array (
        ),
        'as' => 'c.prize.createcategory',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prize.createsponsor' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/prizes/create-sponsor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@create_sponsor',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@create_sponsor',
        'namespace' => NULL,
        'prefix' => 'coordinator/prizes',
        'where' => 
        array (
        ),
        'as' => 'c.prize.createsponsor',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prize.orders' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/prizes/orders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizeOrderController@index',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizeOrderController@index',
        'namespace' => NULL,
        'prefix' => 'coordinator/prizes/orders',
        'where' => 
        array (
        ),
        'as' => 'c.prize.orders',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prize.order' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/prizes/orders/id/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizeOrderController@show',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizeOrderController@show',
        'namespace' => NULL,
        'prefix' => 'coordinator/prizes/orders',
        'where' => 
        array (
        ),
        'as' => 'c.prize.order',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prize.order.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/prizes/orders/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizeOrderController@create',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizeOrderController@create',
        'namespace' => NULL,
        'prefix' => 'coordinator/prizes/orders',
        'where' => 
        array (
        ),
        'as' => 'c.prize.order.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CSs0K1SHXqMbsJPi' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'coordinator/prizes/orders/id/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizeOrderController@destroy',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizeOrderController@destroy',
        'namespace' => NULL,
        'prefix' => 'coordinator/prizes/orders',
        'where' => 
        array (
        ),
        'as' => 'generated::CSs0K1SHXqMbsJPi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prize.order.confirmation' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/prizes/orders/confirmation/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizeOrderController@order_confirmation',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizeOrderController@order_confirmation',
        'namespace' => NULL,
        'prefix' => 'coordinator/prizes/orders',
        'where' => 
        array (
        ),
        'as' => 'c.prize.order.confirmation',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prize.order.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/prizes/orders/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizeOrderController@change_status',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizeOrderController@change_status',
        'namespace' => NULL,
        'prefix' => 'coordinator/prizes/orders',
        'where' => 
        array (
        ),
        'as' => 'c.prize.order.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prizecategory.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/prizes/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.prizecategory.list',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizeCategoryController@index',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizeCategoryController@index',
        'namespace' => NULL,
        'prefix' => 'coordinator/prizes',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prizecategory.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/prizes/category/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.prizecategory.create',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizeCategoryController@create',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizeCategoryController@create',
        'namespace' => NULL,
        'prefix' => 'coordinator/prizes',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prizecategory.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/prizes/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.prizecategory.store',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizeCategoryController@store',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizeCategoryController@store',
        'namespace' => NULL,
        'prefix' => 'coordinator/prizes',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prizecategory.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/prizes/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.prizecategory.show',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizeCategoryController@show',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizeCategoryController@show',
        'namespace' => NULL,
        'prefix' => 'coordinator/prizes',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prizecategory.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/prizes/category/{category}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.prizecategory.edit',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizeCategoryController@edit',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizeCategoryController@edit',
        'namespace' => NULL,
        'prefix' => 'coordinator/prizes',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prizecategory.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'coordinator/prizes/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.prizecategory.update',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizeCategoryController@update',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizeCategoryController@update',
        'namespace' => NULL,
        'prefix' => 'coordinator/prizes',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prizecategory.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'coordinator/prizes/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.prizecategory.destroy',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizeCategoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizeCategoryController@destroy',
        'namespace' => NULL,
        'prefix' => 'coordinator/prizes',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.sponsor.search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/prizes/sponsor/search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\coordinator\\CSponsorController@search',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CSponsorController@search',
        'namespace' => NULL,
        'prefix' => '/coordinator',
        'where' => 
        array (
        ),
        'as' => 'c.sponsor.search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.sponsor.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/sponsor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.sponsor.list',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CSponsorController@index',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CSponsorController@index',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.sponsor.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/sponsor/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.sponsor.create',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CSponsorController@create',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CSponsorController@create',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.sponsor.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/sponsor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.sponsor.store',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CSponsorController@store',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CSponsorController@store',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.sponsor.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/sponsor/{sponsor}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.sponsor.show',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CSponsorController@show',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CSponsorController@show',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.sponsor.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/sponsor/{sponsor}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.sponsor.edit',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CSponsorController@edit',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CSponsorController@edit',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.sponsor.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'coordinator/sponsor/{sponsor}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.sponsor.update',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CSponsorController@update',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CSponsorController@update',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.sponsor.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'coordinator/sponsor/{sponsor}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.sponsor.destroy',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CSponsorController@destroy',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CSponsorController@destroy',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prize.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/prizes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.prize.list',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@index',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@index',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prize.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/prizes/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.prize.create',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@create',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@create',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prize.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/prizes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.prize.store',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@store',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@store',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prize.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/prizes/{prize}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.prize.show',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@show',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@show',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prize.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/prizes/{prize}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.prize.edit',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@edit',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@edit',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prize.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'coordinator/prizes/{prize}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.prize.update',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@update',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@update',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.prize.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'coordinator/prizes/{prize}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.prize.destroy',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@destroy',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPrizesController@destroy',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.post.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/posts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.post.list',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPostsController@index',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPostsController@index',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.post.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/posts/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.post.create',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPostsController@create',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPostsController@create',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.post.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'coordinator/posts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.post.store',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPostsController@store',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPostsController@store',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.post.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/posts/{post}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.post.show',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPostsController@show',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPostsController@show',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.post.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coordinator/posts/{post}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.post.edit',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPostsController@edit',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPostsController@edit',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.post.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'coordinator/posts/{post}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.post.update',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPostsController@update',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPostsController@update',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'c.post.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'coordinator/posts/{post}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'coordinatorcheck',
          4 => 'verified',
        ),
        'as' => 'c.post.destroy',
        'uses' => 'App\\Http\\Controllers\\coordinator\\CPostsController@destroy',
        'controller' => 'App\\Http\\Controllers\\coordinator\\CPostsController@destroy',
        'namespace' => NULL,
        'prefix' => 'coordinator/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VHomeController@dashboard',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VHomeController@dashboard',
        'namespace' => NULL,
        'prefix' => '/volunteer',
        'where' => 
        array (
        ),
        'as' => 'v.dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VHomeController@profile',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VHomeController@profile',
        'namespace' => NULL,
        'prefix' => '/volunteer',
        'where' => 
        array (
        ),
        'as' => 'v.profile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sbtw9F6tRd8LcIHT' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VHomeController@save_profile',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VHomeController@save_profile',
        'namespace' => NULL,
        'prefix' => '/volunteer',
        'where' => 
        array (
        ),
        'as' => 'generated::sbtw9F6tRd8LcIHT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.change.profile' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer/change-photo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VHomeController@change_photo',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VHomeController@change_photo',
        'namespace' => NULL,
        'prefix' => '/volunteer',
        'where' => 
        array (
        ),
        'as' => 'v.change.profile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.calendar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/calendar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VHomeController@calendar',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VHomeController@calendar',
        'namespace' => NULL,
        'prefix' => '/volunteer',
        'where' => 
        array (
        ),
        'as' => 'v.calendar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.loadevents' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/load-events',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VHomeController@load_events',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VHomeController@load_events',
        'namespace' => NULL,
        'prefix' => '/volunteer',
        'where' => 
        array (
        ),
        'as' => 'v.loadevents',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.info' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => '\\Illuminate\\Routing\\ViewController@__invoke',
        'controller' => '\\Illuminate\\Routing\\ViewController',
        'namespace' => NULL,
        'prefix' => '/volunteer',
        'where' => 
        array (
        ),
        'as' => 'v.info',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'view' => 'volunteer.info',
        'data' => 
        array (
        ),
        'status' => 200,
        'headers' => 
        array (
        ),
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.id' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/id',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VHomeController@id',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VHomeController@id',
        'namespace' => NULL,
        'prefix' => '/volunteer',
        'where' => 
        array (
        ),
        'as' => 'v.id',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.maps' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/maps',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => '\\Illuminate\\Routing\\ViewController@__invoke',
        'controller' => '\\Illuminate\\Routing\\ViewController',
        'namespace' => NULL,
        'prefix' => '/volunteer',
        'where' => 
        array (
        ),
        'as' => 'v.maps',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'view' => 'volunteer.maps',
        'data' => 
        array (
        ),
        'status' => 200,
        'headers' => 
        array (
        ),
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VHomeController@search',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VHomeController@search',
        'namespace' => NULL,
        'prefix' => '/volunteer',
        'where' => 
        array (
        ),
        'as' => 'v.search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.settings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@index',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@index',
        'as' => 'v.settings',
        'namespace' => NULL,
        'prefix' => 'volunteer/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.settings.agreement' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/settings/agreement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@agreement',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@agreement',
        'as' => 'v.settings.agreement',
        'namespace' => NULL,
        'prefix' => 'volunteer/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.settings.profile' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer/settings/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@profile',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@profile',
        'as' => 'v.settings.profile',
        'namespace' => NULL,
        'prefix' => 'volunteer/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.settings.password' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer/settings/password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@password',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@password',
        'as' => 'v.settings.password',
        'namespace' => NULL,
        'prefix' => 'volunteer/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.settings.sendemailcode' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer/settings/send-email-code',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@send_email_code',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@send_email_code',
        'as' => 'v.settings.sendemailcode',
        'namespace' => NULL,
        'prefix' => 'volunteer/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.settings.email2fa' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer/settings/email2fa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@email2fa',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@email2fa',
        'as' => 'v.settings.email2fa',
        'namespace' => NULL,
        'prefix' => 'volunteer/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.settings.email2fa_change' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer/settings/email2fa-change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@email2fa_change',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@email2fa_change',
        'as' => 'v.settings.email2fa_change',
        'namespace' => NULL,
        'prefix' => 'volunteer/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.settings.google2fa' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer/settings/google2fa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@google2fa',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@google2fa',
        'as' => 'v.settings.google2fa',
        'namespace' => NULL,
        'prefix' => 'volunteer/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.settings.google2fa_change' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer/settings/google2fa-change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@google2fa_change',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@google2fa_change',
        'as' => 'v.settings.google2fa_change',
        'namespace' => NULL,
        'prefix' => 'volunteer/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.settings.save_notifications' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer/settings/notifications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@save_notifications',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@save_notifications',
        'as' => 'v.settings.save_notifications',
        'namespace' => NULL,
        'prefix' => 'volunteer/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.settings.newagreement' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer/settings/new-agreement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@new_agreement',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VSettingsController@new_agreement',
        'as' => 'v.settings.newagreement',
        'namespace' => NULL,
        'prefix' => 'volunteer/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.chat' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/chat',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => '\\Illuminate\\Routing\\ViewController@__invoke',
        'controller' => '\\Illuminate\\Routing\\ViewController',
        'namespace' => NULL,
        'prefix' => 'volunteer/chat',
        'where' => 
        array (
        ),
        'as' => 'v.chat',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'view' => 'volunteer.chat.chat',
        'data' => 
        array (
        ),
        'status' => 200,
        'headers' => 
        array (
        ),
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.post.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/posts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VPostsController@index',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VPostsController@index',
        'namespace' => NULL,
        'prefix' => 'volunteer/posts',
        'where' => 
        array (
        ),
        'as' => 'v.post.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.post' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/posts/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VPostsController@show',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VPostsController@show',
        'namespace' => NULL,
        'prefix' => 'volunteer/posts',
        'where' => 
        array (
        ),
        'as' => 'v.post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.form.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/forms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VFormsController@list',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VFormsController@list',
        'namespace' => NULL,
        'prefix' => 'volunteer/forms',
        'where' => 
        array (
        ),
        'as' => 'v.form.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.form.archive' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/forms/archive',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VFormsController@archive',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VFormsController@archive',
        'namespace' => NULL,
        'prefix' => 'volunteer/forms',
        'where' => 
        array (
        ),
        'as' => 'v.form.archive',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.form.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/forms/id/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VFormsController@form',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VFormsController@form',
        'namespace' => NULL,
        'prefix' => 'volunteer/forms',
        'where' => 
        array (
        ),
        'as' => 'v.form.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VEqlWJ6WlOAdqicd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer/forms/id/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VFormsController@signto',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VFormsController@signto',
        'namespace' => NULL,
        'prefix' => 'volunteer/forms',
        'where' => 
        array (
        ),
        'as' => 'generated::VEqlWJ6WlOAdqicd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.form.unsign' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer/forms/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VFormsController@unsign',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VFormsController@unsign',
        'namespace' => NULL,
        'prefix' => 'volunteer/forms',
        'where' => 
        array (
        ),
        'as' => 'v.form.unsign',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.form.certificate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer/forms/certificate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VFormsController@certificate',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VFormsController@certificate',
        'namespace' => NULL,
        'prefix' => 'volunteer/forms',
        'where' => 
        array (
        ),
        'as' => 'v.form.certificate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.form.feedback' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer/forms/feedback/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VFormsController@feedback',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VFormsController@feedback',
        'namespace' => NULL,
        'prefix' => 'volunteer/forms',
        'where' => 
        array (
        ),
        'as' => 'v.form.feedback',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.prize.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/prizes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VPrizesController@index',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VPrizesController@index',
        'namespace' => NULL,
        'prefix' => 'volunteer/prizes',
        'where' => 
        array (
        ),
        'as' => 'v.prize.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.prize' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/prizes/id/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VPrizesController@show',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VPrizesController@show',
        'namespace' => NULL,
        'prefix' => 'volunteer/prizes',
        'where' => 
        array (
        ),
        'as' => 'v.prize',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.prize.get' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer/prizes/get-prize/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VPrizesController@store',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VPrizesController@store',
        'namespace' => NULL,
        'prefix' => 'volunteer/prizes',
        'where' => 
        array (
        ),
        'as' => 'v.prize.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.prize.orders' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/prizes/orders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VPrizesController@orders',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VPrizesController@orders',
        'namespace' => NULL,
        'prefix' => 'volunteer/prizes',
        'where' => 
        array (
        ),
        'as' => 'v.prize.orders',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.prize.order' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/prizes/order/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VPrizesController@order',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VPrizesController@order',
        'namespace' => NULL,
        'prefix' => 'volunteer/prizes',
        'where' => 
        array (
        ),
        'as' => 'v.prize.order',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'v.prize.order.confirmation' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/prizes/order/confirmation/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'setlocale',
          2 => 'auth',
          3 => 'volunteercheck',
          4 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\volunteer\\VPrizesController@order_confirmation',
        'controller' => 'App\\Http\\Controllers\\volunteer\\VPrizesController@order_confirmation',
        'namespace' => NULL,
        'prefix' => 'volunteer/prizes',
        'where' => 
        array (
        ),
        'as' => 'v.prize.order.confirmation',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
