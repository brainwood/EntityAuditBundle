<?php

namespace SimpleThings\EntityAudit\Mapping\Annotation;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 * @Target("CLASS")
 */
final class Auditable extends Annotation
{
    /**
     * @var boolean
     */
    public $enabled = true;
}
