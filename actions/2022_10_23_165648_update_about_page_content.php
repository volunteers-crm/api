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

use App\Enums\MessageType;
use App\Models\Page;
use App\Objects\Messages\Document;
use App\Objects\Messages\Text;
use DragonCode\LaravelActions\Action;
use Faker\Factory;
use Faker\Generator;
use LaravelLang\Publisher\Constants\Locales;

return new class () extends Action
{
    protected bool $once = false;

    protected string $slug = 'about-us';

    public function __invoke(): void
    {
        $this->store(
            $this->slug,
            $this->titles(),
            $this->content()
        );
    }

    protected function titles(): array
    {
        return [
            Locales::ENGLISH->value => 'About Us',
            Locales::RUSSIAN->value => 'О нас',
        ];
    }

    protected function content(): array
    {
        return [
            Locales::ENGLISH->value => $this->translatedContent(Factory::create(Locales::ENGLISH->value)),
            Locales::RUSSIAN->value => $this->translatedContent(Factory::create(Locales::RUSSIAN->value)),
        ];
    }

    protected function translatedContent(Generator $faker): array
    {
        return [
            $this->line(MessageType::TEXT,
                Text::make([
                    'text' => $faker->text,
                ])),

            $this->line(MessageType::DOCUMENT,
                Document::make([
                    'src'     => $faker->imageUrl,
                    'preview' => $faker->imageUrl,
                ])),

            $this->line(MessageType::TEXT,
                Text::make([
                    'text' => $faker->text,
                ])),

            $this->line(MessageType::TEXT,
                Text::make([
                    'text' => $faker->text,
                ])),
        ];
    }

    protected function line(MessageType $type, mixed $content): array
    {
        return compact('type', 'content');
    }

    protected function store(string $slug, array $title, mixed $content): void
    {
        Page::updateOrCreate(
            compact('slug'),
            compact('title', 'content')
        );
    }
};
