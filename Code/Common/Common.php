<?php
/**
 * ���ߣ�����
 * ���˲��ͣ����䲩��
 * ����url��www.onmpw.com
 * ************
 * Common�� ����һЩ��������
 * ************
 */
class Common{
    static public function onmpw_json_encode($data){
        if(is_object($data)) return false;
        if(is_array($data)){
            $data = self::deal_array($data);
        }
        return urldecode(json_encode($data));
    }
    private function deal_array($data){
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                if (is_array($val)) {
                    $data[$key] = self::deal_array($val);
                } else {
                    $data[$key] = urlencode($val);
                }
            }
        } elseif (is_string($data)) {
            $data = urlencode($data);
        }
        return $data;
    }
}
