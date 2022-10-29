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

namespace App\Http\Requests\Appeals;

use App\Objects\Appeals\Appeal;
use Carbon\Carbon;
use DragonCode\Contracts\DataTransferObject\DataTransferObject;
use Illuminate\Foundation\Http\FormRequest;

class PublishRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'address' => ['sometimes', 'nullable', 'string', 'max:255'],
            'comment' => ['sometimes', 'nullable', 'string', 'min:2', 'max:1000'],
            'date'    => ['sometimes', 'nullable', 'string', 'date'],
            'persons' => ['sometimes', 'nullable', 'int', 'min:0'],

            'channels'   => ['required', 'array', 'min:1'],
            'channels.*' => ['required', 'int', 'exists:channels,id'],

            'todo'   => ['sometimes', 'nullable', 'array'],
            'todo.*' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function dto(): DataTransferObject|Appeal
    {
        return Appeal::fromRequest($this);
    }

    protected function prepareForValidation(): void
    {
        if ($date = $this->get('date')) {
            $this->merge([
                'date' => $this->resolveDateTimezone($date),
            ]);
        }
    }

    protected function resolveDateTimezone(string $date): string
    {
        return Carbon::parse($date, $this->fromTimezone())->toIso8601String();
    }

    protected function fromTimezone(): string
    {
        return $this->route('appeal')->bot->timezone ?? $this->fallbackTimezone();
    }

    protected function fallbackTimezone(): string
    {
        return config('app.timezone');
    }
}
