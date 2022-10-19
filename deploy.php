<?php
/**
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2022 Andrey Helldar
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

declare(strict_types=1);

namespace Deployer;

require 'contrib/npm.php';
require 'contrib/php-fpm.php';
require 'contrib/telegram.php';
require 'recipe/laravel.php';

// Config

set('application', 'The Dragon Code: Web Template');
set('repository', 'git@github.com:TheDragonCode/web-app.git');
set('php_fpm_version', '8.1');

// Notification

set('telegram_token', $_SERVER['TELEGRAM_DRAGON_BOT_TOKEN']);
set('telegram_chat_id', $_SERVER['TELEGRAM_DRAGON_BOT_CHAT_ID']);

set('telegram_text', 'Deploying `{{branch}}` to *{{target}}*' . PHP_EOL . PHP_EOL . '*Application*: {{application}}');
set('telegram_success_text', 'Deployed some fresh code to *{{target}}*' . PHP_EOL . PHP_EOL . '*Application*: {{application}}');
set('telegram_failure_text', 'Something went wrong during deployment to *{{target}}*' . PHP_EOL . PHP_EOL . '*Application*: {{application}}');

// Hosts

host('production')
    ->setHostname('example.com')
    ->setRemoteUser('forge')
    ->setDeployPath('~/{{hostname}}');

host('staging')
    ->setHostname('staging.example.com')
    ->setRemoteUser('forge')
    ->setDeployPath('~/{{hostname}}');

// Tasks

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:optimize:clear',
    'artisan:optimize',
    'artisan:view:cache',
    'artisan:event:cache',
    'artisan:migrate',
    'npm:install',
    'npm:run:prod',
    'deploy:publish',
    'php-fpm:reload',
    'artisan:queue:restart',
    'artisan:migrate:actions',
]);

task('artisan:migrate:actions', function () {
    cd('{{release_path}}');
    run('{{bin/php}} artisan migrate:actions --force');
});

task('npm:run:prod', function () {
    cd('{{release_path}}');
    run('npm run prod');
});

before('deploy', 'telegram:notify');

after('deploy:success', 'telegram:notify:success');

after('deploy:failed', 'deploy:unlock');
after('deploy:failed', 'telegram:notify:failure');
