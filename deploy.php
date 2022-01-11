<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'Embed Control');

// Project repository
set('repository', 'https://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@github.com/Guepardo/embed_control.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', [
    '.env',
]);

add('shared_dirs', [
    'storage',
]);

// Writable dirs by web server
add('writable_dirs', []);
set('allow_anonymous_stats', false);

// Hosts

host('production')
    ->hostname('netshowme@161.35.176.90')
    ->set('http_user', 'netshowme')
    ->set('deploy_path', '/var/www/embed_control')
    ->set('keep_releases', 1);

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
    run('cd {{release_path}} && php artisan config:clear');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
