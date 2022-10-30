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

namespace App\Jobs\Appeals;

use App\Enums\Queue;
use App\Models\Appeal;
use App\Models\Bot;
use App\Models\Channel;
use DragonCode\Support\Facades\Helpers\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use LaravelLang\Publisher\Facades\Helpers\Locales;

abstract class BaseJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected ?string $text = null;

    public function __construct(
        public Appeal $appeal
    ) {
        $this->queue = Queue::APPEALS();

        $this->afterCommit = true;

        app()->setLocale($this->locale());
    }

    abstract protected function view(): string;

    public function handle()
    {
        $this->chats()->each(
            fn (Channel $channel) => $this->publish($channel)
        );
    }

    protected function chats(): Collection
    {
        return $this->appeal->chats;
    }

    protected function bot(): Bot
    {
        return $this->appeal->bot;
    }

    protected function text(): string
    {
        if (! empty($this->text)) {
            return $this->text;
        }

        return $this->text = $this->resolveTextAlign($this->view());
    }

    protected function resolveTextAlign(string $text): string
    {
        return Str::of($text)
            ->explode("\n")
            ->map(fn (string $line) => trim($line))
            ->implode("\n")
            ->replace("\n\n\n", "\n\n")
            ->trim()
            ->toString();
    }

    protected function timezone(): string
    {
        return $this->bot()->timezone ?? config('app.timezone');
    }

    protected function locale(): string
    {
        return $this->bot()->locale ?? Locales::getDefault();
    }
}
