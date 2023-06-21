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

declare(strict_types=1);

namespace App\Http\Requests\Messages;

use App\Enums\MessageType;
use App\Models\Message;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class DownloadRequest extends FormRequest
{
    use HandlesAuthorization;

    protected array $types = [
        MessageType::Animation,
        MessageType::Audio,
        MessageType::Document,
        MessageType::Photo,
        MessageType::VideoNote,
        MessageType::Video,
        MessageType::Voice,
    ];

    public function authorize(): Response
    {
        return $this->allowType()
            ? $this->allow()
            : $this->denyWithStatus(406, __('http-statuses.406'));
    }

    public function rules(): array
    {
        return [];
    }

    protected function allowType(): bool
    {
        return in_array($this->message()?->type ?? null, $this->types);
    }

    protected function message(): Message|Route
    {
        return $this->route('message');
    }
}
