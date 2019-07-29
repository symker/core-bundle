<?php declare(strict_types = 1);

namespace Symker\CoreBundle\DependencyInjection;

use Exception;
use Throwable;

class SymkerCompilerException extends Exception
{
    public function __construct($message = "", $code = 0, ?Throwable $previous = null)
    {
        $message = "Constraint Violation: {$message}";

        parent::__construct($message, $code, $previous);
    }
}
