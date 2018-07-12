<?php

namespace Fkomaralp\PleskAPI;

use App\HipChatLogger;

class PleskCallExtension extends BaseRequest
{
    public function call($data)
    {
        $data = [
            "extension" => ["call" => $data]
        ];

        $result = parent::request($data);

        if($result->extension->call->status == "error"){
            HipChatLogger::error($result->extension->call->errtext);
        }

        return $result->extension->call->result;
    }

}
