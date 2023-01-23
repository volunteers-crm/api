<?php

/**
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2023 Andrey Helldar
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

use App\Enums\File as Disk;
use App\Http\Webhooks\TelegraphHandler;
use App\Models\Bot;
use App\Models\Channel;
use DefStudio\Telegraph\Storage\CacheStorageDriver;
use DefStudio\Telegraph\Storage\FileStorageDriver;
use DefStudio\Telegraph\Telegraph;

return [
    /*
     * Telegram api base url, it can be overridden
     * for self-hosted servers
     */

    'telegram_api_url' => 'https://api.telegram.org/',

    /*
     * Sets Telegraph messages default parse mode
     * allowed values: html|markdown
     */

    'default_parse_mode' => Telegraph::PARSE_MARKDOWN,

    /*
     * Sets the handler to be used when Telegraph
     * receives a new webhook call.
     *
     * For reference, see https://defstudio.github.io/telegraph/webhooks/overview
     */

    'webhook_handler' => TelegraphHandler::class,

    /*
     * Sets a custom domain when registering a webhook. This will allow a loca telegram bot api server
     * to reach the webhook. Disabled by default
     *
     * For reference, see https://core.telegram.org/bots/api#using-a-local-bot-api-server
     */
    // 'custom_webhook_domain' => 'http://my.custom.domain';

    /*
     * If enabled, Telegraph dumps received
     * webhook messages to logs
     */

    'debug_mode' => (bool) env('APP_DEBUG'),

    /*
     * If enabled, unknown webhook commands are
     * reported as exception in application logs
     */

    'report_unknown_webhook_commands' => true,

    'security' => [
        // if enabled, allows callback queries from unregistered chats

        'allow_callback_queries_from_unknown_chats' => true,

        // if enabled, allows messages and commands from unregistered chats

        'allow_messages_from_unknown_chats' => true,

        // if enabled, store unknown chats as new TelegraphChat models

        'store_unknown_chats_in_db' => true,

        'register_webhook_when_model_was_created' => (bool) env('TELEGRAM_REGISTER_WEBHOOK', false),
    ],

    /*
     * Set model class for both TelegraphBot and TelegraphChat,
     * to allow more customization.
     *
     * Bot model must be or extend `DefStudio\Telegraph\Models\TelegraphBot::class`
     * Chat model must be or extend `DefStudio\Telegraph\Models\TelegraphChat::class`
     */
    'models'   => [
        'bot'  => Bot::class,
        'chat' => Channel::class,
    ],

    'storage' => [
        // Default storage driver to be used for Telegraph data
        'default' => 'file',

        'stores' => [
            'file' => [
                /*
                 * Telegraph cache driver to be used, must implement
                 * DefStudio\Telegraph\Contracts\StorageDriver contract
                 */
                'driver' => FileStorageDriver::class,

                /*
                 * Laravel Storage disk to use. See /config/filesystems/disks for available disks
                 * If 'null', Laravel default store will be used,
                 */
                'disk'   => Disk::Local->value,

                // Folder inside filesystem to be used as root for Telegraph storage
                'root'   => 'telegraph',
            ],

            'cache' => [
                /*
                 * Telegraph cache driver to be used, must implement
                 * DefStudio\Telegraph\Contracts\StorageDriver contract
                 */
                'driver'     => CacheStorageDriver::class,

                /*
                 * Laravel Cache store to use. See /config/cache/stores for available stores
                 * If 'null', Laravel default store will be used,
                 */
                'store'      => null,

                // Prefix to be prepended to cache keys
                'key_prefix' => 'tgph',
            ],
        ],
    ],
];
