<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Publication;
use App\Models\Redirection;

class RedirectionController extends Controller
{
    /**
     * Se actualiza la URL de la publicación y se crea una redirección
     *
     * @param string $original
     * @param string $new
     * @param object $model
     *
     * @return boolean
     */
    public static function redirection($original, $new, $model)
    {
        // Recoger dominio de la aplicación
        try {
            // Si el modelo es un Account, se recorren sus publicaciones
            if ($model instanceof Account) {

                $autorProfileUrlOriginal    = route('authors.show', $original);
                $autorProfileUrlNew         = route('authors.show', $new);
                $redirection                = new Redirection();
                $redirection->from          = $autorProfileUrlOriginal;
                $redirection->to            = $autorProfileUrlNew;
                $redirection->save();

                $autorProfileUrlOriginal    = route('profile.edit', $original);
                $autorProfileUrlNew         = route('profile.edit', $new);
                $redirection                = new Redirection();
                $redirection->from          = $autorProfileUrlOriginal;
                $redirection->to            = $autorProfileUrlNew;
                $redirection->save();

                foreach ($model->publications as $publication) {
                    $redirection        = new Redirection();
                    $oldUrl             = route('record', ['account' => $original, 'slug' => $publication->slug]);
                    $newUrl             = route('record', ['account' => $new, 'slug' => $publication->slug]);
                    $redirection->from  = $oldUrl;
                    $redirection->to    = $newUrl;
                    $redirection->save();
                }
            }

            // Si el modelo es una Publication, se actualiza su URL
            if ($model instanceof Publication) {
                $nickname           = $model->account->nickname;
                $redirection        = new Redirection();
                $oldUrl             = route('record', ['slug' => $original, 'account' => $nickname]);
                $newUrl             = route('record', ['slug' => $new, 'account' => $nickname]);
                $redirection->from  = $oldUrl;
                $redirection->to    = $newUrl;
                $redirection->save();
            }
            return true;

        } catch (\Throwable $th) {
            return false;
        }
    }
}
