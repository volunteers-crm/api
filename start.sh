#!/usr/bin/env bash

#
# This file is part of the "Volunteers CRM" project.
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.
#
# @author Andrey Helldar <helldar@dragon-code.pro>
#
# @copyright 2022 Andrey Helldar
#
# @license MIT
#
# @see https://github.com/volunteers-crm
#

ngrok http localhost:3000

php artisan serve --host=0.0.0.0 --port=8000
