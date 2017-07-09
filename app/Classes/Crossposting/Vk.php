<?php

namespace App\Classes\Crossposting;

class Vk
{
    const GROUPID = '140111463';
    // test group id
    // const GROUPID = '57040346';

    private $promoUrl = 'https://onsells.ru/promotions/';

    public function publish($message, $image, $id)
    {
        // Получение сервера vk для загрузки изображения.
        $res = json_decode(file_get_contents(
          'https://api.vk.com/method/photos.getWallUploadServer?group_id='
          . self::GROUPID . '&access_token=' . env('VK_TOKEN')
        ));

        if (!empty($res->response->upload_url)) {
            // Отправка изображения на сервер.
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $res->response->upload_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, array('photo' => new \CurlFile(public_path().$image)));
            $res = json_decode(curl_exec($ch));
            curl_close($ch);

            if (!empty($res->server)) {
                // Сохранение фото в группе.
                $res = json_decode(file_get_contents(
                    'https://api.vk.com/method/photos.saveWallPhoto?group_id=' . self::GROUPID
                    . '&server=' . $res->server . '&photo='
                    . stripslashes($res->photo) . '&hash='
                    . $res->hash . '&access_token=' . env('VK_TOKEN')
                ));

                if (!empty($res->response[0]->id)) {
                    // Отправляем сообщение.
                    $params = array(
                        'access_token' => env('VK_TOKEN'),
                        'owner_id'     => '-' . self::GROUPID,
                        'from_group'   => '1',
                        'message'      => $message,
                        'attachments'  => "{$res->response[0]->id},{$this->promoUrl}$id"
                    );

                    file_get_contents(
                        'https://api.vk.com/method/wall.post?' . http_build_query($params)
                    );
                }
            }
        }
    }
}
