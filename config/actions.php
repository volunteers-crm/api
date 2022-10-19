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

return [
    /*
    |--------------------------------------------------------------------------
    | Actions Repository Connection
    |--------------------------------------------------------------------------
    |
    | This option controls the database connection used to store the table
    | of executed actions.
    |
    */

    'connection' => env('DB_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Actions Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the actions that have already run for
    | your application. Using this information, we can determine which of
    | the actions on disk haven't actually been run in the database.
    |
    */

    'table' => 'migration_actions',

    /*
    |--------------------------------------------------------------------------
    | Actions Path
    |--------------------------------------------------------------------------
    |
    | This option defines the path to the action directory.
    |
    */

    'path' => base_path('actions'),
];
