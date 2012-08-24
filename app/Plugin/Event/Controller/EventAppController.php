<?php

class EventAppController extends AppController {
	protected function _grabValues($res, $uid) {
        $items = array();
        foreach ($res[0] as $key => $item) {
            if (is_array($res[0][$key])) {
                foreach ($res[0][$key] as $keyI => $valueI) {
                    if (!empty($valueI)) {
                        $items[]['Tag'] = array('facebook_id' => $uid, 'key' => $key . "___" . $keyI, 'value' => $valueI);
                    }
                }
            } else {
                if (!empty($item)) {
                    $tmp[$key] = explode(',', $item);
                    foreach ($tmp[$key] as $keyJ => $valueJ) {
                        $items[]['Tag'] = array('facebook_id' => $uid, 'key' => $key, 'value' => $valueJ);
                    }
                }
            }
        }
        return $items;
    }

}

