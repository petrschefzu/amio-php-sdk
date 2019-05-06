<?php

namespace MYPS\Amio\WebHooks;

interface WebHookHandlerInterface
{
    public function handleWebHook(array $data): void;

}//end class