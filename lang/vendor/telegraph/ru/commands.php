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

return [

    /*
    |--------------------------------------------------------------------------
    | Language lines used in console commands
    |--------------------------------------------------------------------------
    */

    "new_bot" => [
        'starting_message' => 'Вы собираетесь создать нового Телеграм-бота',
        'enter_bot_token' => 'Пожалуйста, введите токен бота',
        'enter_bot_name' => 'Введите имя бота (не обязательно)',
        'ask_to_add_a_chat' => 'Вы хотите добавить чат к этому боту?',
        'ask_to_setup_webhook' => 'Вы хотите настроить вебхук для этого бота?',
        'bot_created' => 'Бот :bot_name успешно создан',
    ],

    'new_chat' => [
        'starting_message' => 'Вы собираетесь создать новый чат для Телеграм-бота :bot_name',
        'enter_chat_id' => 'Введите идентификатор чата - нажмите [x] для отмены',
        'enter_chat_name' => 'Введите название чата (не обязательно)',
        'chat_created' => 'Чат :chat_name успешно создан и прикреплён к боту :bot_name',
    ],

    'set_webhook' => [
        'sending_setup_request' => 'Отправка запроса для настройки вебхука: :api_url',
        'webhook_updated' => 'Вебхук обновлён'
    ],

    'unset_webhook' => [
        'sending_unset_request' => 'Отправка запроса для отключения вебхука: :api_url',
        'webhook_deleted' => 'Вебхук удалён'
    ],
];
