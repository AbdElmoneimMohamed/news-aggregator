<?php

declare(strict_types=1);

namespace App\DTO;

final class ArticleDTO
{
    public function __construct(
        public ?string $url,
        public ?string $title,
        public ?string $content = null,
        public ?string $description = null,
        public ?string $author = null,
        public ?string $source = null,
        public ?string $category = null,
        public ?string $publishedAt = null,
    ) {
    }

    /**
     * @return array<string, string|null>
     */
    public function toArray(): array
    {
        return [
            'url' => $this->url,
            'title' => $this->title,
            'description' => $this->description,
            'author' => $this->author,
            'source' => $this->source,
            'content' => $this->content,
            'category' => $this->category,
            'published_at' => $this->publishedAt,
        ];
    }
}
