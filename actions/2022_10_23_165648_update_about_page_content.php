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
            Locales::GERMAN->value  => 'Über uns',
        ];
    }

    protected function content(): array
    {
        return [
            Locales::ENGLISH->value => $this->translatedContent(Factory::create('en_US')),
            Locales::RUSSIAN->value => $this->translatedContent(Factory::create('ru_RU')),
            Locales::GERMAN->value  => $this->translatedContent(Factory::create('de_DE')),
        ];
    }

    protected function translatedContent(Generator $faker): array
    {
        return [
            $this->line(
                MessageType::Text,
                Text::from([
                    'text' => $faker->realText,
                ])
            ),

            $this->line(
                MessageType::Document,
                Document::from([
                    'src'     => $faker->imageUrl,
                    'preview' => $faker->imageUrl,
                ])
            ),

            $this->line(
                MessageType::Text,
                Text::from([
                    'text' => $faker->realText,
                ])
            ),

            $this->line(
                MessageType::Text,
                Text::from([
                    'text' => $faker->realText,
                ])
            ),
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
