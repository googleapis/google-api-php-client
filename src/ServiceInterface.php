<?php
declare(strict_types=1);

namespace Google;

interface ServiceInterface
{
    public function getClient();
    public function createBatch();
}
