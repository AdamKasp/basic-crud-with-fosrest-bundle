<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity;

interface BookInterface
{
    public function getId(): ?int;

    public function getTitle(): ?string;

    public function setTitle(string $title): void;

    public function getType(): ?string;

    public function setType(string $type): void;

    public function getLength(): ?int;

    public function setLength(?int $length): void;

    public function getAuthor(): ?string;

    public function setAuthor(?string $author): void;
}
