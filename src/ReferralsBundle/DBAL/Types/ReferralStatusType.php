<?php
namespace ReferralsBundle\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

final class ReferralStatusType extends AbstractEnumType
{
    const REFERRED = 'referred';
    const ACCEPTED = 'accepted';
    const REJECTED = 'rejected';

    protected static $choices = [
        self::REFERRED => self::REFERRED,
        self::ACCEPTED => self::ACCEPTED,
        self::REJECTED => self::REJECTED
    ];
}
