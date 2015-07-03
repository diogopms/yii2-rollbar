<?php

namespace diogopms\yii2_rollbar;

trait ErrorHandlerTrait
{
    /**
     * Handles & reports uncaught PHP exceptions.
     */
    public function handleException($exception)
    {
        if (!($exception instanceof \yii\web\HttpException and $exception->statusCode == 404)) {
            \Rollbar::report_exception($exception);
        }

        parent::handleException($exception);
    }

    /**
     * Handles & reports PHP execution errors such as warnings and notices.
     */
    public function handleError($code, $message, $file, $line)
    {
        \Rollbar::report_php_error($code, $message, $file, $line);

        parent::handleError($code, $message, $file, $line);
    }

    /**
     * Handles & reports fatal PHP errors that are causing the shutdown
     */
    public function handleFatalError() {
        \Rollbar::report_fatal_error();

        parent::handleFatalError();
    }
    
    /**
     * [handleInfo description]
     * @param  string $title   [description]
     * @param  string $message [description]
     * @param  [type] $data    [description]
     * @return [type]          [description]
     */
    public function handleInfo($title = '', $message = '', $data) {
        \Rollbar::report_message($title, $message, $data,$data);
    }

}
