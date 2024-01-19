<?php
declare(strict_types=1);

namespace YireoTraining\ExampleLayoutChallenges\ViewModel;

class Pricing
{
    public function format(int $price): string
    {
        return '&euro; '.$price;
    }
}
