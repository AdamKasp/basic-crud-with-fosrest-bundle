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

namespace App\Repository;

use App\Entity\BookInterface;

interface BookRepositoryInterface
{
    public function findById(int $id): ?BookInterface;

    public function findAll(): array;

    public function save(BookInterface $book): void;

    public function delete(BookInterface $book): void;
}
