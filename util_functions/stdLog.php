<?php declare(strict_types=1);
/**
 * Writes messages to stderr or stdout.
 *
 * @author Sébastien Monterisi
 * @throws FailureToWriteToFile
 */

function stdErr(string $message): void
{
    stdLog('php://stderr', $message);
}
function stdOut(string $message): void
{
    stdLog('php://stdout', $message);
}
function stdLog(string $stream_path, string $message): void
{
    if (!file_put_contents($stream_path, $message.PHP_EOL)) {
        throw new \FailureToWriteToFile($stream_path);
    }
}

class FailureToWriteToFile extends Exception
{
}
